<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\SponsorshipTransfer;
use App\Http\Controllers\Controller;

class SponsorshipTransferController extends Controller
{
    // response for sponsorship transfer

    public function index(Request $request)
    {
        $services = SponsorshipTransfer::searchable(['full_name', 'email', 'mobile', 'company_name'])->filter(['status'])->latest()->paginate(10);
        return view('admin.services.sponsorship-transfer.index', compact('services'));
    }

    public function show($id)
    {
        $service = SponsorshipTransfer::findOrFail($id);
        return view('admin.services.sponsorship-transfer.show', compact('service'));
    }

    public function destroy(Request $request, $id)
    {
        $service = SponsorshipTransfer::findOrFail($id);
        $service->delete();
        $notify[] = ['success', 'Service delete successfully'];
        return back()->withNotify($notify);
    }

    public function status(Request $request, $id)
    {
        $service = SponsorshipTransfer::findOrFail($id);

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
