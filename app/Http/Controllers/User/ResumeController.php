<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Degree;
use App\Models\Result;
use App\Models\Resume;
use App\Models\TraningInfo;
use Illuminate\Http\Request;
use App\Models\EducationLavel;
use App\Models\AcademicSummery;
use App\Models\LanguageInformation;
use App\Models\PersonalInformation;
use App\Http\Controllers\Controller;
use App\Models\ReferenceInformation;
use Illuminate\Support\Facades\Auth;
use App\Models\EmploymentInformation;
use App\Models\ApplicationInformation;
use App\Models\PreferredJobInformation;
use Illuminate\Support\Facades\Storage;
use App\Models\ProfessionalCertification;
use App\Models\SpecializationInformation;

class ResumeController extends Controller
{
    public function resume(Request $request, $id = null)
    {
        $user_id = $id ? $id : Auth::user()->id;
        $data['user'] = User::where('id', $user_id)->where('user_type', 'job_seeker')->first();

        $data['personal_info'] = PersonalInformation::where('status',1)->where('user_id',$user_id)->first() ?? new PersonalInformation();
        $data['application_info'] = ApplicationInformation::where('status',1)->where('user_id',$user_id)->first() ?? new ApplicationInformation();
        $data['employment_info'] = EmploymentInformation::where('status',1)->where('user_id',$user_id)->get() ?? [];
        $data['academic_info'] = AcademicSummery::where('status',1)->where('user_id',$user_id)->get() ?? [];
        $data['skill_info'] = SpecializationInformation::where('status',1)->where('user_id',$user_id)->get() ?? [];
        $data['language_info'] = LanguageInformation::where('status',1)->where('user_id',$user_id)->get() ?? [];
        $data['reference_info'] = ReferenceInformation::where('status',1)->where('user_id',$user_id)->get() ?? [];
        $data['traning_info'] = TraningInfo::where('status',1)->where('user_id',$user_id)->get() ?? [];
        $data['pro_certificate_info'] = ProfessionalCertification::where('status',1)->where('user_id',$user_id)->get() ?? [];
        return view('user.resume', $data);
    }

    public function resumeShort(Request $request, $id = null)
    {
        $user_id = $id ? $id : Auth::user()->id;

        $data['user'] = User::where('id', $user_id)->where('user_type', 'job_seeker')->first();

        $data['personal_info'] = PersonalInformation::where('status',1)->where('user_id',$user_id)->first() ?? new PersonalInformation();
        $data['application_info'] = ApplicationInformation::where('status',1)->where('user_id',$user_id)->first() ?? new ApplicationInformation();
        $data['employment_info'] = EmploymentInformation::where('status',1)->where('user_id',$user_id)->get() ?? [];
        $data['academic_info'] = AcademicSummery::where('status',1)->where('user_id',$user_id)->get() ?? [];
        $data['skill_info'] = SpecializationInformation::where('status',1)->where('user_id',$user_id)->get() ?? [];
        $data['language_info'] = LanguageInformation::where('status',1)->where('user_id',$user_id)->get() ?? [];
        $data['reference_info'] = ReferenceInformation::where('status',1)->where('user_id',$user_id)->get() ?? [];
        $data['traning_info'] = TraningInfo::where('status',1)->where('user_id',$user_id)->get() ?? [];
        $data['pro_certificate_info'] = ProfessionalCertification::where('status',1)->where('user_id',$user_id)->get() ?? [];

        return view('user.short-resume', $data);
    }

    public function resumeEdit(Request $request, $id = null)
    {
        $user_id = $id ? $id : Auth::user()->id;
        $data['user'] = User::where('id', $user_id)->where('user_type', 'job_seeker')->first();

        $data['personal_info'] = PersonalInformation::where('user_id',$user_id)->first() ?? new PersonalInformation();
        $data['application_info'] = ApplicationInformation::where('user_id',$user_id)->first() ?? new ApplicationInformation();
        $data['prefer_job_info'] = PreferredJobInformation::with('functionl_info')->where('user_id',$user_id)->first() ?? new PreferredJobInformation();

        return view('user.resume-edit', $data);
    }

    public function accoundResumeTraning($id = null){
        $user_id = $id ? $id : Auth::user()->id;
        $data['academic_info'] = AcademicSummery::where('user_id', $user_id)->get();
        $data['traning_info'] = TraningInfo::where('user_id', $user_id)->get();
        $data['certificate_info'] = ProfessionalCertification::where('user_id', $user_id)->get();
        $data['education_lavel'] = EducationLavel::where('status',1)->get();
        $data['degree'] = Degree::where('status',1)->get();
        $data['result'] = Result::where('status',1)->get();
        $data['user'] = User::findOrFail($user_id);

          return view('user.resumes-traning',$data);
    }
    public function accoundResumeEmployment($id = null){
        $user_id = $id ? $id : Auth::user()->id;
        $data['employment_info'] = EmploymentInformation::where('user_id', $user_id)->get();
        $data['user'] = User::findOrFail($user_id);
        return view('user.resumes-employment',$data);
    }


    public function accoundResumeOther($id = null){
        $user_id = $id ? $id : Auth::user()->id;
        $data['academic_info'] = AcademicSummery::where('user_id', $user_id)->get();
        $data['specialization_info'] = SpecializationInformation::where('user_id', $user_id)->get();
        $data['language_info'] = LanguageInformation::where('user_id', $user_id)->get();
        $data['reference_info'] = ReferenceInformation::where('user_id', $user_id)->get();
        $data['user'] = User::findOrFail($user_id);
        return view('user.resumes-specialization',$data);
    }
    public function accoundResumePhotograph($id = null){

        $user_id = $id ? $id : Auth::user()->id;
        $data['user'] = User::findOrFail($user_id);
        return view('user.resumes-photograph',$data);
    }

    public function uploadResume($id = null){
        $user_id = $id ? $id : Auth::user()->id;
        $data['user'] = User::findOrFail($user_id);
        return view('user.upload-resume',$data);
    }

    public function resumeUpload(Request $request){
        $request->validate([
            'resume' => 'required|mimes:pdf|max:2048',
            'video_link' => 'nullable|url'
        ]);

        if ($request->hasFile('resume')) {
            $ok = saveResume($request->file('resume'), $request->video_link);

            if ($ok) {
                $notify[] = ['success', 'Resume Upload Successfully'];
                return redirect()->route('user.external.resume', $ok->id)->withNotify($notify);
            } else {
                $notify[] = ['error', 'Resume Upload Failed'];
                return redirect()->back()->withNotify($notify);
            }
        }

        $notify[] = ['error', 'Resume Upload Failed'];
        return redirect()->back()->withNotify($notify);
    }

    public function externalResume(){
        $data['resumes'] = Resume::where('user_id', Auth::user()->id)->latest()->paginate(10);
        return view('user.external-resume-view', $data);
    }

    public function externalResumeEdit($id){
        $data['resume'] = Resume::findOrFail($id);
        return view('user.external-resume-edit', $data);

    }

    public function externalResumeView($id)
    {
        $res = Resume::findOrFail($id);

        $pdfPath = "resumes/" . $res->resume;


        // create url to pdf file
        $url = asset($pdfPath);

        return response()->json(['url' => $url]);

    }

    public function externalResumeDownload($id){
        $resume = Resume::findOrFail($id);
        return $resume->resume;
    }

    public function externalResumeDelete($id){
        $resume = Resume::findOrFail($id);
        $resume->delete();

        if (file_exists('resumes/' . $resume->resume)) {
            unlink('resumes/' . $resume->resume);
        }

        $notify[] = ['success', __('Resume Deleted Successfully')];

        return redirect()->route('user.external.resume')->withNotify($notify);
    }

    public function resumeUploadUpdate(Request $request, $id){

        $resume = Resume::findOrFail($id);

        if ($request->hasFile('resume')) {
            if (file_exists('resumes/' . $resume->resume)) {
                unlink('resumes/' . $resume->resume);
            }

            $ok = saveResume($request->file('resume'), $request->video_link, $resume->id);

            if ($ok) {
                $notify[] = ['success', 'Resume Updated Successfully'];
                return redirect()->route('user.external.resume')->withNotify($notify);
            } else {
                $notify[] = ['error', 'Resume Update Failed'];
                return redirect()->back()->withNotify($notify);
            }
        }

        $notify[] = ['error', 'Resume Update Failed'];
        return redirect()->back()->withNotify($notify);
    }
}
