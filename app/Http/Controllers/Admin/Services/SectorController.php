<?php

namespace App\Http\Controllers\Admin\Services;

use App\Models\Sectors;
use Illuminate\Http\Request;
use App\Rules\FileTypeValidate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SectorController extends Controller
{
    public function index(Request $request)
    {
        $services = Sectors::searchable(['title', 'title_ar','description'], $request->search)->orderBy('id', 'desc')->paginate(10);
        return view('admin.services.sectors.index', compact('services'));
    }

    public function create()
    {
        $title = 'Create Targeted Sector';
        return view('admin.services.sectors.create', compact('title'));
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
            'description' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'image' => [$validation, 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
        ]);

        if ($id) {
            $service = Sectors::findOrFail($id);
            $message = 'Sectors update successfully';
        } else {
            $service = new Sectors();
            $message = 'Sectors create successfully';
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
                $service->image = fileUploader($request->image, getFilePath('sector'), getFileSize('sector'), $old);
                $service->save();
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your image'];
                return back()->withNotify($notify);
            }
        }

        $notify[] = ['success', $message];
        return to_route('admin.sectors.index')->withNotify($notify);
    }

    public function edit($id)
    {
        $title = 'Edit Targeted Sector';
        $service = Sectors::findOrFail($id);
        return view('admin.services.sectors.create', compact('title', 'service'));
    }

    public function destroy(Request $request, $id)
    {
        $service = Sectors::findOrFail($id);

        if ($service->image) {
            $path = getFilePath('service');
            fileManager()->removeFile($path.'/'.$service->image);
        }

        $service->delete();
        $notify[] = ['success', 'Sectors delete successfully'];
        return back()->withNotify($notify);
    }

    public function status(Request $request, $id)
    {
        $service = Sectors::findOrFail($id);

        if ($service->status == 1) {
            $service->status = 0;
        } else {
            $service->status = 1;
        }

        $service->save();

        $notify[] = ['success', 'Sectors status updated successfully'];
        return back()->withNotify($notify);
    }

    public function duplicate(Request $request, $id)
    {
        $service = Sectors::findOrFail($id);

        $newService = new Sectors();
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

        $notify[] = ['success', 'Sectors duplicate successfully'];
        return back()->withNotify($notify);
    }
}
