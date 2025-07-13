<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use App\Models\TrainigApply;
use Illuminate\Http\Request;

class TrainingPathRequestController extends Controller
{
    // response for sponsorship transfer

    public function index(Request $request)
    {
        $services = TrainigApply::searchable(['name', 'email', 'mobile'])->filter(['status'])->latest()->paginate(10);
        return view('admin.services.trainingpathrequest.index', compact('services'));
    }

    public function show($id)
    {
        $service = TrainigApply::findOrFail($id);
        return view('admin.services.trainingpathrequest.show', compact('service'));
    }

    public function destroy(Request $request, $id)
    {
        $service = TrainigApply::findOrFail($id);
        $service->delete();
        $notify[] = ['success', 'Service delete successfully'];
        return back()->withNotify($notify);
    }

    public function status(Request $request, $id)
    {
        $service = TrainigApply::findOrFail($id);

        if ($service->status == 1) {
            $service->status = 0;
        } else {
            $service->status = 1;
        }

        $service->save();

        $notify[] = ['success', 'Service status updated successfully'];
        return back()->withNotify($notify);
    }
}
