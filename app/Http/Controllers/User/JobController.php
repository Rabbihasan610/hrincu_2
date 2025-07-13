<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Job;
use App\Models\User;
use App\Models\Country;
use App\Models\SaveJob;
use App\Models\District;
use App\Models\JobSkill;
use App\Models\JobApplier;
use App\Models\JobCategory;
use App\Models\SavedResume;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{

    public function formatJobs($data, $user)
    {

        $jobs = array();

        foreach ($data as $job) {

            $applied = false;
            $saved = false;

            if ($user != null) {
                $applied = JobApplier::where('user_id', $user->id)->where('job_id', $job->id)->first() == null ? false : true;
                $saved = SaveJob::where('user_id', $user->id)->where('job_id', $job->id)->first() == null ? false : true;
            }

            array_push($jobs, [
                'id' => $job->id,
                'user_id' => $job->user_id,
                'title' => $job->title,
                'country_id' => $job->country_id,
                'country' => $job->country->name,
                'country_ar' => $job->country->name_ar,
                'jobtype' => $job->jobtype,
                'posted' => $job->created_at->diffForHumans(),
                'salaryrange' => $job->salaryrange,
                'category_id' => $job->job_category_id,
                'category' => $job->category->name,
                'category_ar' => $job->category->name_ar,
                'vacancy' => $job->vacancies,
                'deadline' => $job->deadline,
                'description' => $job->description,
                'experience' => $job->experience,
                'qualification' => $job->qualification,
                'joblevel' => $job->level,
                'salarycurrency' => $job->salarycurrency,
                'salarytype' => $job->salarytype,
                'location' => $job->location,
                'applied' => $applied,
                'saved' => $saved
            ]);
        }

        return $jobs;
    }

    public function createJob()
    {
        $data['categories'] = JobCategory::latest()->get();
        $data['countries'] = Country::orderByRaw('ISNULL(sort_order), sort_order')->get();
        $data['skills'] = JobSkill::all();

        return view('user.jobs.add-job', $data);
    }

    public function editJob($id)
    {

        $data['categories'] = JobCategory::latest()->get();
        $data['countries'] = Country::orderByRaw('ISNULL(sort_order), sort_order')->get();
        $data['districts'] = District::latest()->get();
        $data["job"] = Job::find($id);
        $data['skills'] = JobSkill::all();

        return view('user.jobs.edit-job', $data);
    }


    public function storeJob(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'title_ar' => 'required',
            'category' => 'required',
            'description' => 'required',
            'description_ar' => 'required',
            'deadline' => 'required',
            'qualification' => 'required',
            'jobtype' => 'required',
            'experience' => 'required',
            'vacancies' => 'required',
            'vacancies' => 'required',
            'country' => 'required',
            'salarytype' => 'required',
            'salarycurrency' => 'required',
            'salaryrange' => 'required',
            'level' => 'required',
            'statelocation' => 'required'
        ]);

        if ($request->expectsJson()) {
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()]);
            }
        }


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = new Job();
        $data->user_id          = Auth::user()->id;

        $data->title            = $request->title;
        $data->title_ar         = $request->title_ar;
        $data->description_ar   = $request->description_ar;
        $data->description      = $request->description;
        $data->job_category_id  = $request->category;
        $data->deadline         = $request->deadline;
        $data->qualification    = $request->qualification;
        $data->jobtype          = $request->jobtype;
        $data->salarytype       = $request->salarytype;
        $data->salarycurrency   = $request->salarycurrency;
        $data->salaryrange      = $request->salaryrange;
        $data->experience       = $request->experience;

        // $data->shift            = $request->shift;

        $data->level            = $request->level;
        $data->vacancies        = $request->vacancies;

        // if($request->skills)
        //     $data->skill = implode(",",$request->skills);

        $data->country_id       = $request->country;
        $data->district_id      = $request->district;
        $data->location         = $request->statelocation;

        $data->save();

        if ($request->expectsJson()) {
            return response()->json(['success' => "Job Posted Successfully."]);
        }

        $notify[] = ['success', 'Job posted successfully'];
        return redirect()->back()->withNotify($notify);
    }



    public function viewJob($id)
    {
        $data['job'] = Job::where('user_id', Auth::user()->id)->where('id', $id)->first();

        return view('user.dashboard.view-job', $data);
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required',
            'title_ar' => 'required',
            'category' => 'required',
            'description' => 'required',
            'description_ar' => 'required',
            'deadline' => 'required',
            'qualification' => 'required',
            'jobtype' => 'required',
            'experience' => 'required',
            'vacancies' => 'required',
            'country' => 'required',
            'salarytype' => 'required',
            'salarycurrency' => 'required',
            'salaryrange' => 'required',
            'level' => 'required',
            'statelocation' => 'required'
        ]);

        $data = Job::find($id);

        $data->user_id          = Auth::user()->id;
        $data->title            = $request->title;
        $data->title_ar         = $request->title_ar;
        $data->description      = $request->description;
        $data->description_ar   = $request->description_ar;
        $data->job_category_id  = $request->category;
        $data->deadline         = $request->deadline;
        $data->qualification    = $request->qualification;
        $data->jobtype          = $request->jobtype;
        $data->salarytype       = $request->salarytype;
        $data->salarycurrency   = $request->salarycurrency;
        $data->salaryrange      = $request->salaryrange;
        $data->experience       = $request->experience;

        $data->level            = $request->level;
        $data->vacancies        = $request->vacancies;
        // if($request->skills)
        //     $data->skill            = implode(",",$request->skills);
        $data->country_id       = $request->country;
        $data->district_id      = $request->district;
        $data->location    = $request->statelocation;

        $data->save();

        $notify[] = ['success', 'Job updated successfully'];

        return redirect()->back()->withNotify($notify);
    }




    public function saveJob(Request $request,  $id)
    {

        $job = SaveJob::where('job_id', $id)->where('user_id', Auth::user()->id)->get()->count();

        if ($job > 0){
            // remove saved job

            SaveJob::where('job_id', $id)->where('user_id', Auth::user()->id)->delete();

            $notify[] = ['error', 'Job removed from saved list'];
            return redirect()->back()->withNotify($notify);
        }


        $savedjob = new SaveJob();
        $savedjob->user_id = Auth::user()->id;
        $savedjob->job_id = $id;
        $savedjob->save();

        if ($request->expectsJson()) {
            return response()->json(['success' => "Job Saved Successfully"]);
        }

        $notify[] = ['success', 'Job saved successfully'];
        return redirect()->back()->withNotify($notify);
    }


    public function applyJob(Request $request)
    {

        if ($request->expectsJson()) {
            $applied = JobApplier::where('job_id', $request->job_id)->where('user_id', Auth::user()->id)->get()->count();
            if ($applied > 0)
                return response()->json(["error" => "Already Applied"]);
        }

        if (Auth::user()->user_type == 'job_provider') {

            $notify[] = ['error', 'You are not allowed to apply for job'];
            return redirect()->back()->withNotify($notify);
        }

        if (empty($request->resume) || empty($request->expectedsalary)) {
            $notify[] = ['error', 'Please select resume and expected salary'];
            return redirect()->back()->withNotify($notify);
        }


        $stored = saveResume(request()->file('resume'));

        $data = new JobApplier();
        $data->job_id = $request->job_id;
        $data->user_id = Auth::user()->id;
        $data->resume_id = $stored->id;
        $data->expectedsalary = $request->expectedsalary;
        $data->level = 1;

        $ok = $data->save();

        if ($ok) {

            if ($request->expectsJson()) {
                return response()->json(["success" => "Job Applied Successfully"]);
            }

            $notify[] = ['success', 'Job applied successfully'];
            return redirect()->back()->withNotify($notify);
        } else {

            $notify[] = ['error', 'Failed to Apply!'];
            return redirect()->back()->withNotify($notify);
        }
    }

    public function getAppliedJob(Request $request)
    {

        $data["applieds"] = JobApplier::where("user_id", Auth::user()->id)->get();

        if ($request->expectsJson()) {
            $arr = array();
            foreach ($data['applieds'] as $job) {
                array_push($arr, [
                    "id" => $job->id,
                    "resume" => $job->resume->resume,
                    "expected_salary" => $job->expectedsalary,
                    'applied_at' => $job->created_at->diffForHumans(),
                    "job" => $this->formatJob($job->job),
                ]);
            }

            return response()->json(["success" => $arr]);
        }

        return view("user.dashboard.applied-job", $data);
    }

    public function formatJob($job)
    {

        $saved = SaveJob::where('job_id', $job->id)->where('user_id', Auth::user()->id)->get()->count() > 0 ? true : false;

        return [
            'id' => $job->id,
            'user_id' => $job->user_id,
            'title' => $job->title,
            'country_id' => $job->country_id,
            'country' => $job->country->name,
            'country_ar' => $job->country->name_ar,
            'jobtype' => $job->jobtype,
            'posted' => $job->created_at->diffForHumans(),
            'salarytype' => $job->salarytype,
            'salaryrange' => $job->salaryrange,
            'salarycurrency' => $job->salarycurrency,
            'category_id' => $job->job_category_id,
            'category' => $job->category->name,
            'category_ar' => $job->category->name_ar,
            'vacancy' => $job->vacancies,
            'deadline' => $job->deadline,
            'description' => $job->description,
            'experience' => $job->experience,
            'qualification' => $job->qualification,
            'joblevel' => $job->level,
            'location' => $job->location,
            'district_id' => $job->district_id,
            'applied' => true,
            'saved' => $saved
        ];
    }




    public function getApplierList(Request $request, $id)
    {

        if ($request->expectsJson()) {
            $appliers = JobApplier::where('job_id', $id)->get();
            $all = array();
            foreach ($appliers as $applier) {
                array_push($all, [
                    "id" => $applier->id,
                    "applier_id" => $applier->user->id,
                    "applier_name" => $applier->user->name,
                    "applier_email" => $applier->user->email,
                    "resume_id" => $applier->resume->id,
                    "resume" => $applier->resume->resume,
                    "status" => $applier->level
                ]);
            }

            return response()->json(["success" => $all]);
        }


        $data['appliers'] = JobApplier::where('job_id', $id)->get();

        return view('user.dashboard.applier-list', $data);
    }

    public function getMyJobs()
    {
        $data['jobs'] = Job::where("user_id", Auth::user()->id)->get();
        return view("user.dashboard.myjobs", $data);
    }


    public function savedJobsPage(Request $request)
    {

        $data['savedjobs'] = SaveJob::where('user_id', Auth::user()->id)->get();

        if ($request->expectsJson()) {
            $arr = array();
            foreach ($data['savedjobs'] as $saved) {
                array_push($arr, [
                    "id" => $saved->id,
                    "saved_at" => $saved->created_at->diffForHumans(),
                    "job" => $this->formatJob($saved->job),
                ]);
            }

            $data = $arr;

            return  response()->json(["success" => $data]);
        }

        return view("user.dashboard.saved-jobs", $data);
    }


    public function deleteSavedJob(Request $request, $id)
    {

        $job = SaveJob::find($id);
        $job->delete();

        if ($request->expectsJson()) {
            return response()->json(["success" => "Deleted Successfully"]);
        }

        $notify[] = ['success', 'Job deleted successfully'];
        return redirect()->back()->withNotify($notify);
    }

    public function getPendingJobs(Request $request)
    {
        $data['jobs'] = Job::where('user_id', Auth::user()->id)->where("status", 0)->get();

        if ($request->expectsJson()) {
            return response()->json(['success' => $this->formatJobs($data['jobs'], null)]);
        }

        return view('user.jobs.pendingjobs', $data);
    }

    public function getActiveJobs(Request $request)
    {
        $data['jobs'] = Job::where('user_id', Auth::user()->id)->where("status", 1)->get();

        if ($request->expectsJson()) {
            return response()->json(['success' => $this->formatJobs($data['jobs'], null)]);
        }

        return view('user.jobs.activejobs', $data);
    }

    public function getInActiveJobs(Request $request)
    {

        $data['jobs'] = Job::where('user_id', Auth::user()->id)->whereDate('deadline', '<', Carbon::now())->get();

        if ($request->expectsJson()) {
            return response()->json(['success' => $this->formatJobs($data['jobs'], null)]);
        }

        return view('user.jobs.inactivejobs', $data);
    }

    public function getRejectedJobs(Request $request)
    {

        $data['jobs'] = Job::where('user_id', Auth::user()->id)->where("status", 2)->get();

        if ($request->expectsJson()) {
            return response()->json(['success' => $this->formatJobs($data['jobs'], null)]);
        }

        return view('user.jobs.rejectedjobs', $data);
    }


    public function changeLevel(Request $request)
    {

        $JobApplier = JobApplier::find($request->applyid);

        $JobApplier->level = $request->level;

        $JobApplier->save();

        if ($request->expectsJson()) {
            return response()->json(["success" => "Level Changed"]);
        }

        $notify[] = ['success', 'Level Changed'];
        return redirect()->back()->withNotify($notify);
    }


    public function deleteSavedResume($id)
    {

        $savedresume = SavedResume::find($id);
        $savedresume->delete();

        $notify[] = ['success', 'Resume Deleted'];
        return redirect()->back()->withNotify($notify);
    }



    public function deleteJob(Request $request, $id)
    {

        $job = Job::find($id);


        $JobApplier = JobApplier::where('job_id', $id)->get();

        foreach ($JobApplier as $apljob) {
            $apljob->delete();
        }

        $job->delete();

        if ($request->expectsJson()) {
            return response()->json(["success" => "Job Deleted"]);
        }

        $notify[] = ['success', 'Job Deleted'];
        return redirect()->back()->withNotify($notify);
    }

    public function hireMe($id)
    {
        $user = User::find($id);
        
        return view('user.jobs.hireme', compact('user'));
    }
}
