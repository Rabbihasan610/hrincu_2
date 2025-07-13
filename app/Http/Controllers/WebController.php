<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\Job;
use App\Models\Blog;
use App\Models\Page;
use App\Models\Country;
use App\Models\Sectors;
use App\Models\District;
use App\Models\Frontend;
use App\Models\Language;
use App\Constants\Status;
use App\Models\Mail\User;
use App\Models\OurService;
use App\Models\Subscriber;
use App\Models\TrainigApply;
use App\Models\TrainingPath;
use Illuminate\Http\Request;
use App\Models\SectorRequest;
use App\Models\SupportTicket;
use App\Models\ServiceRequest;
use App\Models\SupportMessage;
use App\Models\AdminNotification;
use App\Models\OurServiceRequest;
use App\Models\Mail\ContactPerson;
use Illuminate\Support\Facades\DB;
use App\Models\SponsorshipTransfer;
use App\Models\CommunityPartnership;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class WebController extends Controller
{
    public function index()
    {
        $sections = Page::where('slug', '/')->first();
        return view('web.home', compact('sections'));
    }

    public function contact()
    {
        $user = auth()->user();
        return view('web.contact', compact('user'));
    }

    public function privacy()
    {
        $sections = Page::where('slug', '/privacy-policy')->first();
        return view('web.privacy', compact('sections'));
    }

    public function about()
    {
        return view('web.cons');
    }


    public function contactSubmit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'work_place' => 'required',
            'country' => 'required',
            'message' => 'required',
        ]);


        $contact = new ContactPerson();
        $contact->name = $request->name;
        $contact->mobile = $request->mobile;
        $contact->email = $request->email;
        $contact->work_place = $request->work_place;
        $contact->country = $request->country;
        $contact->message = $request->message;
        $contact->save();

        $adminNotification = new AdminNotification();
        $adminNotification->title = __('New Contact Message From:') . ' ' . $request->name;
        $adminNotification->click_url = route('admin.contact.details', $contact->id);

        $adminNotification->save();

        $notify[] = ['success', __('Your message has been sent successfully!')];
        return back()->withNotify($notify);
    }

    public function contactQuery(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'work_place' => 'required',
            'country' => 'required',
            'job_title' => 'required',
            'write_problem' => 'required',
        ]);


        $contact = new ContactPerson();
        $contact->name = $request->name;
        $contact->mobile = $request->mobile;
        $contact->email = $request->email;
        $contact->work_place = $request->work_place;
        $contact->country = $request->country;
        $contact->job_title = $request->job_title;
        $contact->write_problem = $request->write_problem;
        $contact->type = 'query';
        $contact->save();

        $adminNotification = new AdminNotification();
        $adminNotification->title = __('New Query Message From:') . ' ' . $request->name;
        $adminNotification->click_url = route('admin.contact.details', $contact->id);

        $adminNotification->save();

        $notify[] = ['success', __('Your Query has been sent successfully!')];
        return back()->withNotify($notify);
    }

    public function blogs()
    {
        $blogs = Blog::active()->paginate(getPaginate());
        $sections = Page::where('slug', 'blogs')->first();

        return view('web.blogs', compact('blogs', 'sections'));
    }

    public function blogDetails($slug)
    {
        $blog = Blog::active()->where('slug', $slug)->first();

        $blog->view = $blog->view + 1;
        $blog->save();

        $recentPosts = Blog::active()->where('id', '!=', $blog->id)->orderBy('id', 'desc')->limit(5)->get();
        $popularPosts = Blog::active()->where('id', '!=', $blog->id)->orderBy('view', 'desc')->limit(5)->get();

        return view('web.blog_details', compact('blog', 'recentPosts', 'popularPosts'));
    }



    public function changeLanguage($lang = null)
    {
        $language = Language::where('code', $lang)->first();
        if (!$language) {
            $lang = 'en';
        }

        session()->put('lang', $lang);

        return back();
    }

    public function cookieAccept()
    {
        Cookie::queue('gdpr_cookie', gs('site_name'), 43200);
    }

    public function cookiePolicy()
    {
        $cookie = Frontend::where('data_keys', 'cookie.data')->first();
        return view('cookie', compact('cookie'));
    }

    // public function placeholderImage($size = null)
    // {
    //     $imgWidth = explode('x', $size)[0];
    //     $imgHeight = explode('x', $size)[1];
    //     $text = $imgWidth . '×' . $imgHeight;
    //     $fontFile = realpath('assets/font/RobotoMono-Regular.ttf');
    //     $fontSize = round(($imgWidth - 50) / 8);
    //     if ($fontSize <= 9) {
    //         $fontSize = 9;
    //     }
    //     if ($imgHeight < 100 && $fontSize > 30) {
    //         $fontSize = 30;
    //     }

    //     $image = imagecreatetruecolor($imgWidth, $imgHeight);
    //     $colorFill = imagecolorallocate($image, 100, 100, 100);
    //     $bgFill = imagecolorallocate($image, 175, 175, 175);
    //     imagefill($image, 0, 0, $bgFill);
    //     $textBox = imagettfbbox($fontSize, 0, $fontFile, $text);
    //     $textWidth = abs($textBox[4] - $textBox[0]);
    //     $textHeight = abs($textBox[5] - $textBox[1]);
    //     $textX = ($imgWidth - $textWidth) / 2;
    //     $textY = ($imgHeight + $textHeight) / 2;
    //     header('Content-Type: image/jpeg');
    //     imagettftext($image, $fontSize, 0, $textX, $textY, $colorFill, $fontFile, $text);
    //     imagejpeg($image);
    //     imagedestroy($image);
    // }

    public function pages($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();

        $title = $page->name;
        $sections = $page->secs;

        return view('pages', compact('title', 'sections'));
    }

    public function policyPages($slug, $id)
    {
        $policy = Frontend::where('id', $id)->where('data_keys', 'policy_pages.element')->firstOrFail();
        $title = $policy->data_values->title;
        return view('policy', compact('policy', 'title'));
    }

    public function maintenance()
    {
        if (gs('maintenance_mode') == Status::DISABLE) {
            return to_route('home');
        }
        $maintenance = Frontend::where('data_keys', 'maintenance.data')->first();
        return view('maintenance', compact('maintenance'));
    }

    public function subscribe(Request $request)
    {
        $rules = [
            'email' => 'required|email|unique:subscribers,email',
        ];
        $message = [
            "email.unique" => 'You have already subscribed',
        ];
        $validator = validator()->make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return back()->withErrors($validator);
           // return response()->json(['error' => $validator->errors()->getMessages()]);
        }

        $subscribe = new Subscriber();
        $subscribe->email = $request->email;
        $subscribe->save();

        $notify[] = ['success', 'Thanks for subscribe'];

        return back()->withNotify($notify);

        //return response()->json(['success' => true, 'message' => 'Thanks for subscribe']);
    }

    public function service()
    {
        $sections = Page::where('slug', 'service')->first();
        return view('web.service', compact('sections'));
    }

    public function jobincuService()
    {
        $sections = Page::where('slug', 'jobincu-service')->first();
        return view('web.jobincu_service', compact('sections'));
    }

    public function sectors()
    {
        $sections = Page::where('slug', 'sectors')->first();
        $datas = Sectors::active()->paginate(getPaginate());
        return view('web.sectors', compact('sections', 'datas'));
    }

    public function communityPartnership()
    {
        $sections = Page::where('slug', 'community-partnership')->first();
        $datas = CommunityPartnership::active()->paginate(getPaginate());
        return view('web.community_partnership', compact('sections', 'datas'));
    }

    public function qualificationAndEmpowerment()
    {
        $sections = Page::where('slug', 'qualification-and-empowerment')->first();
        $training_paths = TrainingPath::active()->get();
        return view('web.qualification_and_empowerment', compact('sections', 'training_paths'));
    }

    public function search(Request $request)
    {
        $sections = Page::where('slug', 'search')->first();
        $categories = DB::table('job_categories')->get();
        $countries = Country::orderByRaw('ISNULL(sort_order), sort_order')->with('city')->get();


        $query = Job::query()->with('category', 'country');


        if ($request->filled('country_id') && $request->country_id !== '0') {
            $query->where('country_id', $request->country_id);
        }

        if ($request->filled('category_id') && $request->category_id !== '0') {
            $query->where('job_category_id', $request->category_id);
        }

        if ($request->filled('keyword')) {
            $query->where('title', 'like', '%' . $request->keyword . '%');
        }

        if ($request->filled('qualification') && $request->qualification !== '0') {
            $query->where('qualification', $request->qualification);
        }

        if ($request->filled('job_type') && $request->job_type !== '0') {
            $query->where('jobtype', $request->job_type);
        }

        if ($request->filled('salarytype') && $request->salarytype !== '0') {
            $query->where('salarytype', $request->salarytype);
        }

        if ($request->filled('salaryrange') && $request->salaryrange !== '0') {
            $query->where('salaryrange', $request->salaryrange);
        }

        if ($request->filled('deadline')) {
            $deadline = $request->deadline;
            $start_date = null;
            $end_date = null;

            if ($deadline === 'week') {
                $start_date = now()->startOfWeek();
                $end_date = now()->endOfWeek();
            } elseif ($deadline === 'month') {
                $start_date = now()->startOfMonth();
                $end_date = now()->endOfMonth();
            } elseif ($deadline === 'next_week') {
                $start_date = now()->addWeek()->startOfWeek();
                $end_date = now()->addWeek()->endOfWeek();
            } elseif ($deadline === 'next_month') {
                $start_date = now()->addMonth()->startOfMonth();
                $end_date = now()->addMonth()->endOfMonth();
            } elseif ($deadline === 'custom_date' && $request->filled('date')) {
                $start_date = $request->date;
                $end_date = $request->date;
            }

            if ($start_date && $end_date) {
                $query->whereBetween('deadline', [$start_date, $end_date]);
            }
        }


        if($request->filled('sort')){
            $sort = $request->sort;
            if($sort == 'latest'){
                $query->latest();
            }elseif($sort == 'oldest'){
                $query->oldest();
            }
        }

        if ($request->filled('date') && $request->date !== '' && $request->date != null) {
            $date = $request->date;
            $query->where('deadline', $date);
        }


        $jobs = $query->paginate(10)->appends($request->query());


        $job_counts = $jobs->total();

        return view('web.search', compact('sections', 'categories', 'countries', 'jobs', 'job_counts'));
    }

    public function jobDetails($id)
    {
        $job = Job::where('id', $id)->first();

        $related_jobs = Job::where('job_category_id', $job->job_category_id)->where('id', '!=', $job->id)->get();
        return view('web.job_details', compact('job', 'related_jobs'));
    }

    public function relatedJob(Request $request, $category_id = null)
    {
        $sections = Page::where('slug', 'search')->first();
        $categories = DB::table('job_categories')->get();
        $countries = Country::orderByRaw('ISNULL(sort_order), sort_order')->with('city')->get();

        $query = Job::query()->with('category', 'country');

        if ($request->filled('country_id') && $request->country_id !== '0') {
            $query->where('country_id', $request->country_id);
        }

        if ($request->filled('category_id') && $request->category_id !== '0') {
            $query->where('job_category_id', $request->category_id);
        }

        if ($request->filled('keyword')) {
            $query->where('title', 'like', '%' . $request->keyword . '%');
        }

        if ($request->filled('qualification') && $request->qualification !== '0') {
            $query->where('qualification', $request->qualification);
        }

        if ($request->filled('job_type') && $request->job_type !== '0') {
            $query->where('jobtype', $request->job_type);
        }

        if ($request->filled('salarytype') && $request->salarytype !== '0') {
            $query->where('salarytype', $request->salarytype);
        }

        if ($request->filled('salaryrange') && $request->salaryrange !== '0') {
            $query->where('salaryrange', $request->salaryrange);
        }

        if ($request->filled('deadline')) {
            $deadline = $request->deadline;
            $start_date = null;
            $end_date = null;

            if ($deadline === 'week') {
                $start_date = now()->startOfWeek();
                $end_date = now()->endOfWeek();
            } elseif ($deadline === 'month') {
                $start_date = now()->startOfMonth();
                $end_date = now()->endOfMonth();
            } elseif ($deadline === 'next_week') {
                $start_date = now()->addWeek()->startOfWeek();
                $end_date = now()->addWeek()->endOfWeek();
            } elseif ($deadline === 'next_month') {
                $start_date = now()->addMonth()->startOfMonth();
                $end_date = now()->addMonth()->endOfMonth();
            } elseif ($deadline === 'custom_date' && $request->filled('date')) {
                $start_date = $request->date;
                $end_date = $request->date;
            }

            if ($start_date && $end_date) {
                $query->whereBetween('deadline', [$start_date, $end_date]);
            }
        }

        if ($request->filled('date') && $request->date !== '' && $request->date != null) {
            $date = $request->date;
            $query->where('deadline', $date);
        }

        if ($category_id) {
            $query->where('job_category_id', $category_id);
        }

        $jobs = $query->paginate(10)->appends($request->query());

        $job_counts = $jobs->total();

        return view('web.search',  compact('sections', 'categories', 'countries', 'jobs', 'job_counts'));
    }

    public function application($job_id)
    {
        $job = Job::where('id', $job_id)->first();
        return view('web.application', compact('job'));
    }

    public function districts(Request $request){
        $country_id = $request->country_id;
        $districts = District::where('country_id', $country_id)->get();

        if(app()->getLocale() == "ar"){

            $districtHtmlOption = "<option value=''>حدد المنطقة</option>";

            foreach ($districts as $district) {

                $districtHtmlOption .= "<option value='$district->id'>$district->name_ar</option>";

            }

            return ($districtHtmlOption);

        }

        $districtHtmlOption = "<option value=''>Select District</option>";

        foreach ($districts as $district) {

            $districtHtmlOption .= "<option value='$district->id'>$district->name</option>";

        }

        return ($districtHtmlOption);

    }

    public function employers(Request $request){
        $sections = Page::where('slug', 'employers')->first();

        $query = User::query();

        if ($request->filled('keyword')) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }

        $providers = $query->where('user_type', 'job_provider')->paginate(getPaginate(24))->appends($request->query());


        return view('web.employers', compact('sections', 'providers'));
    }

    // seekers
    public function seekers(Request $request){
        $sections = Page::where('slug', 'seekers')->first();

        $query = User::query();

        if ($request->filled('keyword')) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }

        $seekers = $query->where('user_type', 'job_seeker')->paginate(getPaginate(24))->appends($request->query());

        return view('web.seekers', compact('sections', 'seekers'));
    }

    public function sponsorshipTransfer(){
        $sections = Page::where('slug', 'sponsorship-transfer')->first();
        return view('web.sponsorship_transfer', compact('sections'));
    }

    public function sponsorshipTransferStore(Request $request){
        $request->validate([
            'full_name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'current_position' => 'required',
            'company_name' => 'required',
            'age' => 'required',
            'nationality' => 'required',
            'message' => 'required',
        ]);

        $sponsorshipTransfer = new SponsorshipTransfer();
        $sponsorshipTransfer->full_name = $request->full_name;
        $sponsorshipTransfer->mobile = $request->mobile;
        $sponsorshipTransfer->email = $request->email;
        $sponsorshipTransfer->current_position = $request->current_position;
        $sponsorshipTransfer->company_name = $request->company_name;
        $sponsorshipTransfer->age = $request->age;
        $sponsorshipTransfer->nationality = $request->nationality;
        $sponsorshipTransfer->message = $request->message;
        $sponsorshipTransfer->save();

        $notify[] = ['success', __('Thanks for sponsorship transfer')];

        return redirect()->back()->withNotify($notify);
    }

    public function sectorRequest(Request $request, $slug){
        $sections = Page::where('slug', 'sector-request')->first();

        if(!$slug){
            $notify[] = ['error', 'Invalid Request'];
            return redirect()->back()->withNotify($notify);
        }

        $sector = Sectors::where('id', $slug)->firstOrFail();

        return view('web.sector_request', compact('sections', 'sector'));
    }

    public function sectorRequestStore(Request $request){
        $request->validate([
            'sector_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'job_title' => 'required',
            'company_name' => 'required',
            'address' => 'required',
            'zip_code' => 'nullable',
        ]);

        $sectorRequest = new SectorRequest();
        $sectorRequest->sector_id = $request->sector_id;
        $sectorRequest->name = $request->name;
        $sectorRequest->email = $request->email;
        $sectorRequest->phone = $request->phone;
        $sectorRequest->job_title = $request->job_title;
        $sectorRequest->company_name = $request->company_name;
        $sectorRequest->address = $request->address;
        $sectorRequest->zip_code = $request->zip_code;
        $sectorRequest->save();

        $notify[] = ['success', __('Thanks for sector request')];

        return redirect()->back()->withNotify($notify);
    }

    public function trainingRequest($slug){
        $sections = Page::where('slug', 'training-request')->first();

        if(!$slug){
            $notify[] = ['error', 'Invalid Request'];
            return redirect()->back()->withNotify($notify);
        }

        $training = TrainingPath::where('id', $slug)->firstOrFail();
        return view('web.training_request', compact('sections', 'training'));
    }

    public function trainingRequestStore(Request $request){
        $request->validate([
            'training_path_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $trainingRequest = new TrainigApply();
        $trainingRequest->training_path_id = $request->training_path_id;
        $trainingRequest->name = $request->name;
        $trainingRequest->email = $request->email;
        $trainingRequest->phone = $request->phone;
        $trainingRequest->address = $request->address;
        $trainingRequest->save();

        $notify[] = ['success', __('Thanks for training request')];

        return redirect()->back()->withNotify($notify);
    }

    public function ourServiceRequest($slug)
    {
        $ourService = OurService::where('slug', $slug)->first();
        return view('web.requests.ourservice_request_form', compact('ourService'));
    }


    public function submitForm(Request $request, $slug)
    {
        $request->validate([
            'organization_name' => 'required|string|max:255',
            'additional_notes' => 'nullable|string',
            'form_extra_fields' => 'nullable|array',
        ]);

        $ourService = OurService::where('slug', $slug)->first();

        OurServiceRequest::create([
            'our_service_id' => $ourService->id,
            'organization_name' => $request->organization_name,
            'additional_notes' => $request->additional_notes,
            'form_data' => $request->form_extra_fields,
        ]);

        $notify[] = ['success', __('Your request has been submitted successfully!')];

        return redirect()->back()->withNotify($notify);
    }
}


