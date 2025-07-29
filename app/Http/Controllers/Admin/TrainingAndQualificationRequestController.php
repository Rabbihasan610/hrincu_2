<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TrainingAndQualificationRequest;
use App\Models\City;
use App\Constants\Status;
use Illuminate\Http\Request;

class TrainingAndQualificationRequestController extends Controller
{
    public function index()
    {
        $pageTitle = 'Training and Qualification Requests';
        $requests = TrainingAndQualificationRequest::with('city')->latest()->paginate(getPaginate());
        return view('admin.training_and_qualification_request.index', compact('pageTitle', 'requests'));
    }

    public function show($id)
    {
        $pageTitle = 'Training and Qualification Request Details';
        $request = TrainingAndQualificationRequest::with('city')->findOrFail($id);
        return view('admin.training_and_qualification_request.show', compact('pageTitle', 'request'));
    }

    public function update(Request $request, $id)
    {
        $trainingRequest = TrainingAndQualificationRequest::findOrFail($id);
        
        $request->validate([
            'status' => 'required|in:' . Status::PENDING . ',' . Status::APPROVED . ',' . Status::REJECT
        ]);

        $trainingRequest->status = $request->status;
        $trainingRequest->save();

        $notify[] = ['success', 'Status updated successfully'];
        return back()->withNotify($notify);
    }

    public function destroy($id)
    {
        $trainingRequest = TrainingAndQualificationRequest::findOrFail($id);
        $trainingRequest->delete();

        $notify[] = ['success', 'Training and qualification request deleted successfully'];
        return back()->withNotify($notify);
    }
}
