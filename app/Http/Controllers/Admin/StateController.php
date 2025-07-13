<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Rules\FileTypeValidate;
use App\Http\Controllers\Controller;

class StateController extends Controller
{
    public function index()
    {
        $states = State::searchable(['name','name_ar'])->paginate(getPaginate());
        return view('admin.state.index', compact('states'));
    }

    public function create()
    {
        $title = 'Create State';
        $cities = City::get();
        $countries = Country::orderByRaw('ISNULL(sort_order), sort_order')->get();
        return view('admin.state.create', compact('title', 'cities', 'countries'));
    }

    public function store(Request $request, $id = null)
    {
        $validation = 'required';

        if ($id) {
            $validation = 'nullable';
        }

        $request->validate([
            'country_id' => 'required|exists:countries,id',
            'city_id' => 'required|exists:cities,id',
            'name' => 'required|string',
            'name_ar' => 'required|string',
            'lat' => 'required|string',
            'lng' => 'required|string',
            'image' => [$validation, 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
        ]);

        if ($id) {
            $state = State::findOrFail($id);
            $message = 'State update successfully';
        } else {
            $state = new State();
            $message = 'State create successfully';
        }

        $state->country_id = $request->country_id;
        $state->city_id = $request->city_id;
        $state->name = $request->name;
        $state->name_ar = $request->name_ar;
        $state->lat = $request->lat;
        $state->lng = $request->lng;

        if ($request->hasFile('image')) {
            try {
                $old = $state->image;
                $state->image = fileUploader($request->image, getFilePath('state'), getFileSize('state'), $old);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your image'];
                return back()->withNotify($notify);
            }
        }

        $state->save();

        $notify[] = ['success', $message];
        return to_route('admin.state.index')->withNotify($notify);

    }

    public function edit($id)
    {
        $title = 'Edit State';
        $state = State::findOrFail($id);
        $cities = City::get();
        $countries = Country::orderByRaw('ISNULL(sort_order), sort_order')->get();
        return view('admin.state.create', compact('state', 'title', 'cities', 'countries'));
    }
}
