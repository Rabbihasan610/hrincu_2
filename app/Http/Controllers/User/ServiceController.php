<?php

namespace App\Http\Controllers\User;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\ServiceRequest;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function serviceRequest(Request $request){
        $selectedService = Service::findOrFail($request->service_id);
        $services = Service::where('status', '=', 1)->get();
        $countries = Country::all();
        $cities = City::all();
        $states = State::all();

        return view('user.service-request', compact('selectedService', 'services', 'countries', 'cities', 'states'));
    }

    public function serviceRequestSubmit(Request $request){
        $request->validate([
            'service_id' => 'required',
            'name' => 'nullable',
            'email' => 'nullable',
            'phone' => 'nullable',
            'country_id' => 'nullable',
            'state_id' => 'nullable',
            'city_id' => 'nullable',
            'address' => 'nullable',
            'zip_code' => 'nullable',
            'company_name' => 'nullable',
            'job_title' => 'nullable',
            'is_saved' => 'nullable',
        ]);

        $serviceRequest = new ServiceRequest();
        $serviceRequest->service_id = $request->service_id;
        $serviceRequest->user_id = auth()->id();
        $serviceRequest->name = $request->name;
        $serviceRequest->email = $request->email;
        $serviceRequest->phone = $request->phone;
        $serviceRequest->country_id = $request->country_id;
        $serviceRequest->state_id = $request->state_id;
        $serviceRequest->city_id = $request->city_id;
        $serviceRequest->address = $request->address;
        $serviceRequest->zip_code = $request->zip_code;
        $serviceRequest->company_name = $request->company_name;
        $serviceRequest->job_title = $request->job_title;
        $serviceRequest->is_saved = $request->is_saved ? 1 : 0;
        $serviceRequest->save();

        $notify[] = ['success', 'Service Request Submitted Successfully'];

        return redirect()->back()->withNotify($notify);
    }
}
