<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurServiceRequest;
use Illuminate\Http\Request;

class OurServiceRequestController extends Controller
{

    public function index(Request $request)
    {
        $query = OurServiceRequest::with('ourService')
            ->latest();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('organization_name', 'like', "%$search%")
                ->orWhereHas('ourService', function($q) use ($search) {
                    $q->where('title', 'like', "%$search%");
                });
            });
        }

        $serviceRequests = $query->paginate(15);

        return view('admin.services.our-service-rquests.index', compact('serviceRequests'));
    }

    public function show($id)
    {
        $serviceRequest = OurServiceRequest::find($id);
        return view('admin.services.our-service-rquests.show', compact('serviceRequest'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $serviceRequest = OurServiceRequest::find($id);

        $serviceRequest->update([
            "status" => $request->status
        ]);

        $notify[] = ['success', __('Service request status updated successfully')];

        return redirect()->route('admin.our-services-request.show', $serviceRequest)
            ->withNotify($notify);

    }

    public function destroy($id)
    {
        $serviceRequest = OurServiceRequest::find($id);

        $serviceRequest->delete();

        $notify[] = ['success', __('Service request deleted successfully')];

        return redirect()->route('admin.our-services-request.index')
            ->withNotify($notify);
    }
}
