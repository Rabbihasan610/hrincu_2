<?php

namespace App\Http\Controllers\Admin;

use App\Models\Job;
use App\Models\Country;
use App\Models\District;
use App\Models\JobSkills;
use App\Models\JobApplier;
use App\Models\JobCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['jobs'] = Job::latest()->paginate(10);
        return view('admin.jobs.view-job',$data);
    }

    public function jobSkills()
    {
        $data['skills'] = JobSkills::latest()->get();
        return view('admin.jobs.skills',$data);
    }

    public function addSkill(Request $request){
        $validator = Validator::make($request->all(), [
            'skill' => 'required'
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Skill Field must not be Empty.',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }

        $skill = new JobSkills();

        $skill->skill = $request->skill;
        $skill->save();


        $notification = array(
            'message' => 'Skill Added Successfully.',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function updateSkill(Request $request, $locale, $id){

        $validator = Validator::make($request->all(), [
            'skill' => 'required'
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Skill Field must not be Empty.',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }

        $skill = JobSkills::find($id);

        $skill->skill = $request->skill;
        $skill->save();


        $notification = array(
            'message' => 'Skill Updated Successfully.',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function deleteSkill($locale, $id){

        $skill = JobSkills::find($id);

        $skill->delete();

        $notification = array(
            'message' => 'Skill is Deleted!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }


    public function applier_list($locale, $id){

        $data['receiveapply'] = JobApplier::where('job_id', $id)->where('level', 1)->get();

        $data['viewapply'] = JobApplier::where('job_id', $id)->where('level', 2)->get();

        $data['shortapply'] = JobApplier::where('job_id', $id)->where('level', 3)->get();

        $data['interviewapply'] = JobApplier::where('job_id', $id)->where('level', 4)->get();

        $data['rejectapply'] = JobApplier::where('job_id', $id)->where('level', 5)->get();

        $data['selectapply'] = JobApplier::where('job_id', $id)->where('level', 6)->get();

        return view('admin.jobs.job-applier-list',$data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['data'] = Job::find($id);
        return view('admin.jobs.show-job',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($locale, $id)
    {
        $data['categories'] = JobCategory::latest()->get();
        $data['countries'] = Country::latest()->get();
        $data['districts'] = District::where('id', $id)->get();
        $data['editjob'] = Job::find($id);
        return view('admin.jobs.edit',$data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $locale, $id)
    {

        $this->validate($request,[
            'title' => 'required',
            'category' => 'required',
            'description' => 'required'
        ]);

        $data = Job::find($id);

        $data->title            = $request->title;
        $data->description      = $request->description;
        $data->job_category_id   = $request->category;
        $data->deadline         = $request->deadline;
        $data->qualification    = $request->qualification;
        $data->jobtype          = $request->jobtype;
        $data->salarytype       = $request->salarytype;
        $data->salarycurrency   = $request->salarycurrency;
        $data->salaryrange      = $request->salaryrange;
        $data->experience       = $request->experience;

        $data->level            = $request->level;
        $data->vacancies        = $request->vacancies;
        $data->skill            = $request->skill;
        $data->country_id       = $request->country;
        $data->district_id      = $request->district;
        $data->location    = $request->statelocation;

        $data->save();

        $notification = array(
            'message' => 'Job Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function acceptJob($id){

        $job = Job::find($id);

        $job->status = 1;

        $job->save();

        $notify[] = ['success', 'Job Accepted!'];

        return redirect()->back()->withNotify($notify);
    }

    public function rejectJob($id){
        $job = Job::find($id);

        $job->status = 2;

        $job->save();

        $notify[] = ['success', 'Job Rejected!'];

        return redirect()->back()->withNotify($notify);
    }

    public function makePending($id){

        $job = Job::find($id);

        $job->status = 0;

        $job->save();

        $notify[] = ['success', 'Job is Pending!'];

        return redirect()->back()->withNotify($notify);

    }

    public function deleteJob($id){

        $job = Job::find($id);

        $JobApplier = JobApplier::where('job_id', $id)->get();

        foreach($JobApplier as $apljob){
            $apljob->delete();
        }

        $job->delete();

        $notify[] = ['success', 'Job Deleted!'];

        return redirect()->back()->withNotify($notify);

    }


    public function getPendingPage(){

        // Status 0 refers to pending

        $data['pendingjobs'] = Job::where("status", 0)->get();
        return view('admin.jobs.pending-jobs', $data);


    }

    public function getAcceptedPage(){

        // Status 1 refers to Accepted
        $data['acceptedjobs'] = Job::where("status", 1)->get();
        return view('admin.jobs.accepted-jobs', $data);

    }

    public function getRejectedJob(){

        // Status 1 refers to Accepted
        $data['rejectedjobs'] = Job::where("status", 2)->get();
        return view('admin.jobs.rejected-jobs', $data);

    }

    public function getAppliers(){

        $data['appliers'] = JobApplier::all();
        return view('admin.users.appliers', $data);

    }
}
