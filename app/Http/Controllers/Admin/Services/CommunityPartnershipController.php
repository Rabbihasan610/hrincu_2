<?php

namespace App\Http\Controllers\Admin\Services;

use Illuminate\Http\Request;
use App\Rules\FileTypeValidate;
use App\Http\Controllers\Controller;
use App\Models\CommunityPartnership;
use Illuminate\Support\Facades\Auth;

class CommunityPartnershipController extends Controller
{
    public function index()
    {
        $services = CommunityPartnership::searchable(['title', 'title_ar','description'])->paginate(10);
        return view('admin.services.community-partnership.index', compact('services'));
    }

    public function create()
    {
        $title = 'Create Community Partnership';
        return view('admin.services.community-partnership.create', compact('title'));
    }

    public function store(Request $request, $id = null)
    {
        $validation = 'required';

        if ($id) {
            $validation = 'nullable';
        }

        $request->validate([
            'title' => 'required|string',
            'title_ar' => 'required|string',
            'description' => 'required|string',
            'description_ar' => 'required|string',
            'image' => [$validation, 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
        ]);

        if ($id) {
            $service = CommunityPartnership::findOrFail($id);
            $message = 'Community Partnership update successfully';
        } else {
            $service = new CommunityPartnership();
            $message = 'Community Partnership create successfully';
        }

        $service->title = $request->title;
        $service->title_ar = $request->title_ar;
        $service->description = $request->description;
        $service->description_ar = $request->description_ar;
        $service->status = $request->status ?? 1;
        $service->created_by = Auth::guard('admin')->user()->id;

        $service->save();

        if ($request->hasFile('image')) {
            try {
                $old = $service->image;
                $service->image = fileUploader($request->image, getFilePath('service'), getFileSize('service'), $old);
                $service->save();
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your image'];
                return back()->withNotify($notify);
            }
        }

        $notify[] = ['success', $message];
        return to_route('admin.community.partnership.index')->withNotify($notify);
    }

    public function edit($id)
    {
        $title = 'Edit Community Partnership';
        $service = CommunityPartnership::findOrFail($id);
        return view('admin.services.community-partnership.create', compact('title', 'service'));
    }

    public function destroy(Request $request, $id)
    {
        $service = CommunityPartnership::findOrFail($id);

        if ($service->image) {
            $path = getFilePath('service');
            fileManager()->removeFile($path.'/'.$service->image);
        }

        $service->delete();
        $notify[] = ['success', 'Community Partnership delete successfully'];
        return back()->withNotify($notify);
    }

    public function status(Request $request, $id)
    {
        $service = CommunityPartnership::findOrFail($id);

        if ($service->status == 1) {
            $service->status = 0;
        } else {
            $service->status = 1;
        }

        $service->save();

        $notify[] = ['success', 'Community Partnership status updated successfully'];
        return back()->withNotify($notify);
    }

    public function duplicate(Request $request, $id)
    {
        $service = CommunityPartnership::findOrFail($id);

        $newService = new CommunityPartnership();
        $newService->title = $service->title;
        $newService->title_ar = $service->title_ar;
        $newService->description = $service->description;
        $newService->description_ar = $service->description_ar;
        $newService->status = $service->status;
        $newService->created_by = Auth::guard('admin')->user()->id;

        if ($service->image) {
            $newService->image = $service->image;
        }

        $newService->save();

        $notify[] = ['success', 'Community Partnership duplicate successfully'];
        return back()->withNotify($notify);
    }

}
