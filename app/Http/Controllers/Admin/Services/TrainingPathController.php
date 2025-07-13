<?php

namespace App\Http\Controllers\Admin\Services;

use App\Models\TrainingPath;
use Illuminate\Http\Request;
use App\Rules\FileTypeValidate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TrainingPathController extends Controller
{
    public function index(Request $request)
    {
        $services = TrainingPath::searchable(['title', 'title_ar','description'], $request->search)->paginate(10);
        return view('admin.services.training_paths.index', compact('services'));
    }

    public function create()
    {
        $title = 'Create Training Path';
        return view('admin.services.training_paths.create', compact('title'));
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
            $service = TrainingPath::findOrFail($id);
            $message = 'Training Path update successfully';
        } else {
            $service = new TrainingPath();
            $message = 'Training Path create successfully';
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
                $service->image = fileUploader($request->image, getFilePath('trainingpath'), getFileSize('trainingpath'), $old);
                $service->save();
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your image'];
                return back()->withNotify($notify);
            }
        }

        $notify[] = ['success', $message];
        return to_route('admin.trainingpath.index')->withNotify($notify);
    }

    public function edit($id)
    {
        $title = 'Edit Training Path';
        $service = TrainingPath::findOrFail($id);
        return view('admin.services.training_paths.create', compact('title', 'service'));
    }

    public function destroy(Request $request, $id)
    {
        $service = TrainingPath::findOrFail($id);

        if ($service->image) {
            $path = getFilePath('service');
            fileManager()->removeFile($path.'/'.$service->image);
        }

        $service->delete();
        $notify[] = ['success', 'Training Path delete successfully'];
        return back()->withNotify($notify);
    }

    public function status(Request $request, $id)
    {
        $service = TrainingPath::findOrFail($id);

        if ($service->status == 1) {
            $service->status = 0;
        } else {
            $service->status = 1;
        }

        $service->save();

        $notify[] = ['success', 'Training Path status updated successfully'];
        return back()->withNotify($notify);
    }

    public function duplicate(Request $request, $id)
    {
        $service = TrainingPath::findOrFail($id);

        $newService = new TrainingPath();
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

        $notify[] = ['success', 'Training Path duplicate successfully'];
        return back()->withNotify($notify);
    }
}
