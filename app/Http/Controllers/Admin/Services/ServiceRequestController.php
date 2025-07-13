<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;

class ServiceRequestController extends Controller
{
    public function index()
    {
        $services = ServiceRequest::searchable(['name', 'email', 'phone'])->latest()->paginate(10);

        return view('admin.services.service-request.index', compact('services'));
    }

    public function show($id)
    {
        $service = ServiceRequest::findOrFail($id);

        return view('admin.services.service-request.show', compact('service'));
    }

    public function status(Request $request, $id)
    {
        $service = ServiceRequest::findOrFail($id);

        if ($service->status == 1) {
            $service->status = 0;
        } else {
            $service->status = 1;
        }

        $service->save();

        $notify[] = ['success', 'Service status updated successfully'];
        return back()->withNotify($notify);
    }

    public function destroy(Request $request, $id)
    {
        $service = ServiceRequest::findOrFail($id);
        $service->delete();
        $notify[] = ['success', 'Service delete successfully'];
        return back()->withNotify($notify);
    }
}
