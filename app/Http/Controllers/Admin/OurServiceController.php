<?php

namespace App\Http\Controllers\Admin;

use App\Models\OurService;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OurServiceController extends Controller
{

    public function index(Request $request)
    {
       $services = OurService::searchable(['title', 'title_ar'])->paginate(getPaginate(15));
       return view('admin.ourservice.index', compact("services"));
    }

    public function create()
    {
        return view('admin.ourservice.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
            'icon' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:1000',
            'form_extra_fields' => 'nullable|array',
            'form_extra_fields.*.label' => 'required_with:form_extra_fields|string|max:255',
            'form_extra_fields.*.type' => 'required_with:form_extra_fields|string|in:text,number,email,date,checkbox,radio,select',
            'form_extra_fields.*.required' => 'nullable|boolean',
            'form_extra_fields.*.options' => 'required_if:form_extra_fields.*.type,select,radio,checkbox|nullable|string',
            'items' => 'nullable|array',
            'items.*.title' => 'required_with:items|string|max:255',
            'items.*.title_ar' => 'nullable|string|max:255',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        if (isset($validated['form_extra_fields'])) {
            foreach ($validated['form_extra_fields'] as &$field) {
                if (in_array($field['type'], ['select', 'radio', 'checkbox'])) {
                    $field['options'] = isset($field['options'])
                        ? array_map('trim', explode(',', $field['options']))
                        : [];
                } else {
                    unset($field['options']);
                }
            }
            $validated['form_extra_fields'] = json_encode($validated['form_extra_fields']);
        } else {
            $validated['form_extra_fields'] = json_encode([]);
        }

        $validated['items'] = isset($validated['items'])
            ? json_encode($validated['items'])
            : json_encode([]);

        $ourService = OurService::create($validated);


        if ($request->hasFile('icon')) {
            try {
                $old = null;
                $ourService->icon = fileUploader($request->image, getFilePath('service'), getFileSize('service'), $old);
                $ourService->save();
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your icon'];
                return back()->withNotify($notify);
            }
        }

        $notify[] = ['success', __('Our Service Created Successfully!')];
        return redirect()->route('admin.our-services.index')->withNotify($notify);
    }


    public function edit($id)
    {
        $ourService = OurService::findOrFail($id);
        return view('admin.ourservice.edit', compact('ourService'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'form_extra_fields' => 'nullable|array',
            'form_extra_fields.*.label' => 'required_with:form_extra_fields|string',
            'form_extra_fields.*.type' => 'required_with:form_extra_fields|string|in:text,number,email,date,checkbox,radio,select',
            'form_extra_fields.*.required' => 'nullable|boolean',
            'form_extra_fields.*.options' => 'required_if:form_extra_fields.*.type,select,radio,checkbox|nullable|string',
            'items' => 'nullable|array',
            'items.*.title' => 'required_with:items|string',
            'items.*.title_ar' => 'nullable|string',
        ]);



        if (isset($validated['form_extra_fields'])) {
            foreach ($validated['form_extra_fields'] as &$field) {

                if (!in_array($field['type'], ['select', 'radio', 'checkbox'])) {
                    unset($field['options']);
                }

                if (isset($field['options'])) {
                    $field['options'] = array_map('trim', explode(',', $field['options']));
                }
            }
            $validated['form_extra_fields'] = json_encode($validated['form_extra_fields']);
        } else {
            $validated['form_extra_fields'] = json_encode([]);
        }

        $validated['items'] = isset($validated['items']) ? json_encode($validated['items']) : json_encode([]);

        $validated['slug'] = Str::slug($validated['title']);

        $ourService = OurService::findOrFail($id);

        $ourService->update(Arr::except($validated, ['icon']));



        if ($request->hasFile('icon')) {
            $ourService = OurService::findOrFail($id);

            if ($request->hasFile('icon')) {
                try {
                    $old = $ourService->icon;
                    $ourService->icon = fileUploader($request->icon, getFilePath('service'), getFileSize('service'), $old);
                    $ourService->save();
                } catch (\Exception $exp) {
                    $notify[] = ['error', 'Couldn\'t upload your icon'];
                    return back()->withNotify($notify);
                }
            }
        }

        $notify[] = ['success', __('Our Service Updated Successfully!')];
        return redirect()->route('admin.our-services.index')->withNotify($notify);
    }

    public function destroy($id)
    {
        try {
            $service = OurService::findOrFail($id);

            if (method_exists($service, 'formSubmissions')) {
                $service->formSubmissions()->delete();
            }

            if (isset($service->items)) {
                $service->items = null;
                $service->save();
            }

            $service->delete();

            $notify[] = ['success', 'Service deleted successfully'];
            return redirect()->route('admin.our-services.index')->withNotify($notify);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            $notify[] = ['error', 'Service not found'];
            return redirect()->route('admin.our-services.index')->withNotify($notify);

        } catch (\Exception $e) {
            $notify[] = ['error', 'Error deleting service: ' . $e->getMessage()];
            return redirect()->route('admin.our-services.index')->withNotify($notify);
        }
    }
}
