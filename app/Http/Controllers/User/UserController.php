<?php

namespace App\Http\Controllers\User;

use App\Models\Form;
use App\Models\Country;
use App\Models\Property;
use App\Constants\Status;
use App\Lib\FormProcessor;
use Illuminate\Http\Request;
use App\Models\SupportTicket;
use App\Models\FinanceRequest;
use App\Models\ServiceRequest;
use App\Models\PropertyRequest;
use App\Models\MarketingRequest;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function home(){
        $supportCount = SupportTicket::where('user_id',auth()->user()->id)->count();

        

        return view('user.dashboard',compact('supportCount'));
    }

    public function userData()
    {
        $user = auth()->user();
        if ($user->profile_complete == 1) {
            return to_route('user.home');
        }

        $countries = Country::orderByRaw('ISNULL(sort_order), sort_order')->get();
        return view('user.user_data', compact('user','countries'));
    }

    public function userDataSubmit(Request $request)
    {
        $user = auth()->user();

        if ($user->profile_complete == Status::YES) {
            return to_route('user.home');
        }

        $request->validate([
            'name'=>'required',
        ]);

        $user->name = $request->name;
        $user->country_id = $request->country_id;
        $user->location = $request->location;
        $user->about = $request->about;
        $user->website = $request->website;
        $user->profile_complete = Status::YES;
        $user->save();

        $notify[] = ['success','Registration process completed successfully'];
        return to_route('user.home')->withNotify($notify);

    }
}
