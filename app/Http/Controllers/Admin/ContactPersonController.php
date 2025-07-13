<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Mail\ContactPerson;
use App\Http\Controllers\Controller;

class ContactPersonController extends Controller
{
    public function index(Request $request)
    {
        $query = ContactPerson::query();

        if($request->type == 'query'){
            $notifications = $query->where('type', 'query')->latest()->paginate(getPaginate());
        } else {
            $notifications = $query->where('type', 'basic')->latest()->paginate(getPaginate());
        }


        return view('admin.contact.index', compact('notifications'));
    }

    public function details ($id){
        $service = ContactPerson::findOrFail($id);

        $service->is_read = 1;
        $service->save();

        return view('admin.contact.details', compact('service'));
    }
}
