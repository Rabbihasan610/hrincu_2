<?php

namespace App\Http\Controllers\Web;

use Carbon\Carbon;
use App\Models\Blog;
use App\Models\Page;
use App\Models\Frontend;
use App\Models\Language;
use App\Constants\Status;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Models\SupportTicket;
use App\Models\SupportMessage;
use App\Models\AdminNotification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

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

    public function contactSubmit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required|string|max:255',
            'message' => 'required',
        ]);

        if (!verifyCaptcha()) {
            $notify[] = ['error', 'Invalid captcha provided'];
            return back()->withNotify($notify);
        }

        $request->session()->regenerateToken();

        $random = getNumber();

        $ticket = new SupportTicket();
        $ticket->user_id = auth()->id() ?? 0;
        $ticket->name = $request->name;
        $ticket->email = $request->email;

        $ticket->ticket = $random;
        $ticket->subject = $request->subject;
        $ticket->last_reply = Carbon::now();
        $ticket->status = Status::TICKET_OPEN;
        $ticket->save();

        $adminNotification = new AdminNotification();
        $adminNotification->user_id = auth()->user() ? auth()->user()->id : 0;
        $adminNotification->title = 'A new contact message has been submitted';
        $adminNotification->click_url = urlPath('admin.support.view', $ticket->id);
        $adminNotification->save();

        $message = new SupportMessage();
        $message->support_ticket_id = $ticket->id;
        $message->message = $request->message;
        $message->save();

        $notify[] = ['success', 'Ticket created successfully!'];

        return to_route('support.view', [$ticket->ticket])->withNotify($notify);
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
            return response()->json(['error' => $validator->errors()->getMessages()]);
        }

        $subscribe = new Subscriber();
        $subscribe->email = $request->email;
        $subscribe->save();

        return response()->json(['success' => true, 'message' => 'Thanks for subscribe']);
    }
}


