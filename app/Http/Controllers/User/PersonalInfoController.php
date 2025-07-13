<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Degree;
use App\Models\Result;
use App\Models\Country;
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
use App\Models\PreferredJobFunctional;
use App\Models\PreferredJobInformation;
use App\Models\PreferredJobSpecialSkill;
use App\Models\ProfessionalCertification;
use App\Models\SpecializationInformation;

class PersonalInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['personal_info'] = PersonalInformation::findOrFail($id);
        return view('user.resume.edit-personal-info',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required',
            'marital_status' => 'required',
            'nationality' => 'required',
        ]);

        $data =  PersonalInformation::findOrFail($id);
        $input = $request->except('_token');
        $data->fill($input)->save();

        $notify[] = ['success', 'Personal Information Update successfully'];
        return redirect()->route('user.resume')->withNotify($notify);
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

    public function addressDetails($id){
        $data['personal_info'] = PersonalInformation::findOrFail($id);
        $data['countries'] = Country::get();
        return view('user.resume.edit-address',$data);
    }


    public function addressDetailsPost(Request $request, $id){

        $request->validate([
            'present_address_country' => 'required',
            'present_address_district' => 'required',
        ]);

        $data =  PersonalInformation::findOrFail($id);
        $input = $request->except('_token');
        $data->fill($input)->save();


        $notify[] = ['success', 'Address Details Update successfully!'];
        return redirect()->route('user.resume')->withNotify($notify);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function carrerInfo($id){
        $data['application_info'] = ApplicationInformation::findOrFail($id);
        return view('user.resume.edit-carrer-info',$data);
    }

    public function carrerInfoPost(Request $request, $id){

        $data =  ApplicationInformation::findOrFail($id);
        $input = $request->except('_token');
        $data->fill($input)->save();

        $notify[] = ['success', 'Carrer Information Update successfully!'];
        return redirect()->route('user.resume')->withNotify($notify);
    }

    public function otherInfo($id){
        $data['other_info'] = ApplicationInformation::findOrFail($id);
        return view('user.resume.edit-other-info',$data);
    }


    public function preferredJobInfo($id){
        $data['prefer_job_info'] = PreferredJobInformation::findOrFail($id);
        $data['prefer_skills'] = PreferredJobSpecialSkill::where('status',1)->get();
        $data['prefer_functions'] = PreferredJobFunctional::where('status',1)->get();
        return view('user.resume.edit-prefer-job-info',$data);
    }
    public function preferredJobInfoPost(Request $request, $id){
        $data = PreferredJobInformation::findOrFail($id);
        $data->preferred_job_functional =  json_encode($request->preferred_job_functional);
        // $data->preferred_job_special_skill = $request->preferred_job_special_skill;
        // $data->job_location = $request->job_location;
        // $data->organization_type = $request->organization_type;
        $data->save();

        $notify[] = ['success', 'Preferred Job Information Update successfully!'];

        return redirect()->route('user.resume')->withNotify($notify);
    }

    public function otherInfoPost(Request $request, $id){

        $data =  ApplicationInformation::findOrFail($id);
        $input = $request->except('_token');
        $data->fill($input)->save();

        $notify[] = ['success', 'Other Relevant Information Update successfully!'];
        return redirect()->route('user.resume')->withNotify($notify);
    }
    public function disabilityInfo($id){
        $data['disability_info'] = ApplicationInformation::findOrFail($id);
        return view('user.resume.edit-disability-info',$data);
    }

    public function disabilityInfoPost(Request $request, $id){

        $data =  ApplicationInformation::findOrFail($id);
        $input = $request->except('_token');
        $data->fill($input)->save();

        $notify[] = ['success', 'Disability Information Update successfully!'];
        return redirect()->route('user.resume')->withNotify($notify);
    }

    public function academicInfoPost(Request $request){

        $data = new AcademicSummery();
        $input = $request->except('_token');
        $input['user_id'] = Auth::user()->id;
        $data->fill($input)->save();
        $notification[] = ['success', 'Academic Information Add successfully!'];
        return redirect()->back()->withNotify($notification);

    }

    public function academicInfoEdit($id){
        $data['academic_info'] = AcademicSummery::findOrFail($id);
        $data['education_lavel'] = EducationLavel::where('status',1)->get();
        $data['degree'] = Degree::where('status',1)->get();
        $data['result'] = Result::where('status',1)->get();
        return view('user.resume.edit-academic-info',$data);
    }

    public function academicInfoUpdate(Request $request, $id){
        $data =  AcademicSummery::findOrFail($id);
        $input = $request->except('_token');
        $data->fill($input)->save();

        $notify[] = ['success', 'Academic Information Update successfully!'];
        return redirect()->route('user.resume.traning')->withNotify($notify);
    }
    public function academicInfoDelete($id){
        AcademicSummery::findOrFail($id)->delete();
        $notify[] = ['success', 'Academic Information Delete successfully!'];
        return redirect()->back()->withNotify($notify);
    }
    public function traningInfoPost(Request $request){
        $data = new TraningInfo();
        $input = $request->except('_token');
        $input['user_id'] = Auth::user()->id;
        $data->fill($input)->save();
        $notification[] = ['success', 'Traning Information Add successfully!'];
        return redirect()->back()->withNotify($notification);
    }

    public function traningInfoEdit($id){
        $data['traning_info'] = TraningInfo::findOrFail($id);
        return view('user.resume.edit-traning-info',$data);
    }
    public function traningInfoUpdate(Request $request, $id){
        $data =  TraningInfo::findOrFail($id);
        $input = $request->except('_token');
        $data->fill($input)->save();

        $notify[] = ['success', 'Traning Information Update successfully!'];
        return redirect()->route('user.resume.traning')->withNotify($notify);
    }

    public function traningInfoDelete($id){
        TraningInfo::findOrFail($id)->delete();
        $notify[] = ['success', 'Traning Information Delete successfully!'];
        return redirect()->back()->withNotify($notify);
    }


    public function certificateInfoPost(Request $request){
        $data = new ProfessionalCertification();
        $input = $request->except('_token');
        $input['user_id'] = Auth::user()->id;
        $data->fill($input)->save();
        $notification[] = ['success', 'Certificate Information Create successfully!'];
        return redirect()->back()->withNotify($notification);
    }

    public function certificateInfoEdit($id){
        $data['certificate_info'] = ProfessionalCertification::findOrFail($id);
        return view('user.resume.edit-certificate-info',$data);
    }
    public function certificateInfoUpdate(Request $request, $id){
        $data =  ProfessionalCertification::findOrFail($id);
        $input = $request->except('_token');
        $data->fill($input)->save();
        $notification[] = ['success', 'Certificate Information Update successfully!'];
        return redirect()->route('user.resume.traning')->withNotify($notification);
    }

    public function certificateInfoDelete($id){
        ProfessionalCertification::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Certificate Information Delete successfully!',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function employmentInfoPost(Request $request){
        $data = new EmploymentInformation();
        $input = $request->except('_token');
        $input['user_id'] = Auth::user()->id;
        $data->fill($input)->save();
        $notification = array(
            'message' => 'Employment Information Create successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function employmentInfoEdit($id){
        $data['employment_info'] = EmploymentInformation::findOrFail($id);
        return view('user.resume.edit-employment-info',$data);
    }
    public function employmentInfoUpdate(Request $request, $id){
        $data =  EmploymentInformation::findOrFail($id);
        $input = $request->except('_token');
        $data->fill($input)->save();
        $notification = array(
            'message' => 'Employment Information Update successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('user.resume.employment')->withNotify($notification);
    }

    public function employmentInfoDelete($id){
        EmploymentInformation::findOrFail($id)->delete();
        $notification[] = ['success', 'Employment Information Delete successfully!'];
        return redirect()->back()->withNotify($notification);

    }

    public function specializationInfoPost(Request $request){
        $data = new SpecializationInformation();
        $input = $request->except('_token');
        $input['user_id'] = Auth::user()->id;
        $data->fill($input)->save();
        $notification = array(
            'message' => 'Specialization Information Delete successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function specializationInfoEdit($id){
        $data['specialization_info'] = SpecializationInformation::findOrFail($id);
        return view('user.resume.edit-specialization-info',$data);
    }
    public function specializationInfoUpdate(Request $request, $id){
        $data =  SpecializationInformation::findOrFail($id);
        $input = $request->except('_token');
        $data->fill($input)->save();
        $notification = array(
            'message' => 'Specialization Information Update successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('user.resume.other')->with($notification);
    }

    public function specializationInfoDelete($id){
        SpecializationInformation::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function languageInfoPost(Request $request){
        $data = new LanguageInformation();
        $input = $request->except('_token');
        $input['user_id'] = Auth::user()->id;
        $data->fill($input)->save();
        $notification[] = ['success', 'Language Information Create successfully!'];
        return redirect()->back()->withNotify($notification);
    }

    public function languageInfoEdit($id){
        $data['language_info'] = LanguageInformation::findOrFail($id);
        return view('user.resume.edit-language-info',$data);
    }
    public function languageInfoUpdate(Request $request, $id){
        $data =  LanguageInformation::findOrFail($id);
        $input = $request->except('_token');
        $data->fill($input)->save();
        $notification[] = ['success', 'Language Information Update successfully!'];
        return redirect()->route('user.resume.other')->withNotify($notification);
    }

    /**
     * Delete a Reference Information
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function regerenceInfoDelete($id){
        LanguageInformation::findOrFail($id)->delete();
        $notification[] = ['success', 'Language Information Delete successfully!'];
        return redirect()->back()->withNotify($notification);
    }

    public function referenceInfoPost(Request $request){
        $data = new ReferenceInformation();
        $input = $request->except('_token');
        $input['user_id'] = Auth::user()->id;
        $data->fill($input)->save();
        $notification[] = ['success', 'Reference Information Create successfully!'];
        return redirect()->back()->withNotify($notification);
    }

    public function referenceInfoEdit($id){
        $data['reference_info'] = ReferenceInformation::findOrFail($id);
        return view('user.resume.edit-reference-info',$data);
    }
    public function referenceInfoUpdate(Request $request, $id){
        $data =  ReferenceInformation::findOrFail($id);
        $input = $request->except('_token');
        $data->fill($input)->save();
        $notification[] = ['success', 'Reference Information Update successfully!'];
        return redirect()->route('user.resume.other')->withNotify($notification);
    }


    public function photoInfoEdit($id){
        $data['user'] = User::findOrFail($id);
        return view('user.resume.edit-photo-info',$data);
    }
     public function photoInfoPost(Request $request, $id){

        $request->validate([
            'image'        =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);


        $data = User::findOrFail($id);


        if ($request->hasFile('image')) {
            try {
                $old = $data->image;
                $data->image = fileUploader($request->image, getFilePath('userProfile'), getFileSize('userProfile'), $old);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your image'];
                return back()->withNotify($notify);
            }
        }

        $data->save();

        $notification[] = ['success', 'Photo Upload successfully!'];
        return redirect()->route('user.resume.photograph')->withNotify($notification);

    }
}
