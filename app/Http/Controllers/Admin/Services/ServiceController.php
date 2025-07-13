<?php

namespace App\Http\Controllers\Admin\Services;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Rules\FileTypeValidate;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $services = Service::searchable(['title', 'title_ar','description'], $request->search)->paginate(10);
        return view('admin.services.service.index', compact('services'));
    }

    public function create()
    {
        $title = 'Create Service';
        return view('admin.services.service.create', compact('title'));
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
            $service = Service::findOrFail($id);
            $message = 'Service update successfully';
        } else {
            $service = new Service();
            $message = 'Service create successfully';
        }

        $service->title = $request->title;
        $service->title_ar = $request->title_ar;
        $service->description = $request->description;
        $service->description_ar = $request->description_ar;
        $service->status = $request->status ?? 1;

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
        return to_route('admin.service.index')->withNotify($notify);
    }

    public function edit($id)
    {
        $title = 'Edit Service';
        $service = Service::findOrFail($id);
        return view('admin.services.service.create', compact('title', 'service'));
    }

    public function destroy(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        if ($service->image) {
            $path = getFilePath('service');
            fileManager()->removeFile($path.'/'.$service->image);
        }

        $service->delete();
        $notify[] = ['success', 'Service delete successfully'];
        return back()->withNotify($notify);
    }

    public function status(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        if ($service->status == 1) {
            $service->status = 0;
        } else {
            $service->status = 1;
        }

        $service->save();

        $notify[] = ['success', 'Service status updated successfully'];
        return back()->withNotify($notify);
    }

    public function duplicate(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $newService = new Service();
        $newService->title = $service->title;
        $newService->title_ar = $service->title_ar;
        $newService->description = $service->description;
        $newService->description_ar = $service->description_ar;
        $newService->status = $service->status;

        if ($service->image) {
            $newService->image = $service->image;
        }

        $newService->save();

        $notify[] = ['success', 'Service duplicate successfully'];
        return back()->withNotify($notify);
    }
}
