<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TargetedSectorRequest;

class TargetedSectorRequestController extends Controller
{
    public function index()
    {
        $requests = TargetedSectorRequest::paginate(10);

        return view('admin.targeted_sector_request.index', compact('requests'));
    }


    public function show($id)
    {
        $request = TargetedSectorRequest::findOrFail($id);

        return view('admin.targeted_sector_request.show', compact('request'));
    }

    public function destroy($id)
    {
        $request = TargetedSectorRequest::findOrFail($id);
        $request->delete();

        $notify[]  = ['success', 'Request deleted successfully!'];

        return redirect()->route('admin.targeted_sector_request.index')->withNotify($notify);
    }


    public function update(Request $request, $id)
    {
        $request = TargetedSectorRequest::findOrFail($id);
        $request->update([
            'status' => $request->status,
        ]);

        $notify[]  = ['success', 'Request updated successfully!'];

        return redirect()->route('admin.targeted_sector_request.index')->withNotify($notify);
    }

}
