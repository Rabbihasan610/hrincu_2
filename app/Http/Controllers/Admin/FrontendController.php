<?php

namespace App\Http\Controllers\Admin;

use App\Models\Frontend;
use Illuminate\Http\Request;
use App\Rules\FileTypeValidate;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{


    public function seoEdit()
    {
        $seo = Frontend::where('data_keys', 'seo.data')->first();
        if (!$seo) {
            $data_values = '{"keywords":[],"description":"","social_title":"","social_description":"","image":null}';
            $data_values = json_decode($data_values, true);
            $frontend = new Frontend();
            $frontend->data_keys = 'seo.data';
            $frontend->data_values = $data_values;
            $frontend->save();
        }
        return view('admin.frontend.seo', compact('seo'));
    }

    public function frontendContent(Request $request, $key)
    {
        $purifier = new \HTMLPurifier();
        $valInputs = $request->except('_token', 'image_input', 'key', 'status', 'type', 'id');
        foreach ($valInputs as $keyName => $input) {
            if (gettype($input) == 'array') {
                $inputContentValue[$keyName] = $input;
                continue;
            }
            $inputContentValue[$keyName] = htmlspecialchars_decode($purifier->purify($input));
        }

        $type = $request->type;
        if (!$type) {
            abort(404);
        }
        $imgJson = @getPageSections()->$key->$type->images;
        $validationRule = [];
        $validationMessage = [];
        foreach ($request->except('_token', 'video') as $inputField => $val) {
            if ($inputField == 'has_image' && $imgJson) {
                foreach ($imgJson as $imgValKey => $imgJsonVal) {
                    $validationRule['image_input.' . $imgValKey] = ['nullable', 'image', new FileTypeValidate(['jpg', 'jpeg', 'png', 'svg'])];
                    $validationMessage['image_input.' . $imgValKey . '.image'] = keyToTitle($imgValKey) . ' must be an image';
                    $validationMessage['image_input.' . $imgValKey . '.mimes'] = keyToTitle($imgValKey) . ' file type not supported';
                }
                continue;
            } elseif ($inputField == 'seo_image') {
                $validationRule['image_input'] = ['nullable', 'image', new FileTypeValidate(['jpeg', 'jpg', 'png', 'svg'])];
                continue;
            }


        // $validationRule[$inputField] = $key == 'promotion' ? 'nullable' : 'required';

        }
        $request->validate($validationRule, $validationMessage, ['image_input' => 'image']);
        if ($request->id) {
            $content = Frontend::findOrFail($request->id);
        } else {
            $content = Frontend::where('data_keys', $key . '.' . $request->type)->first();
            if (!$content || $request->type == 'element') {
                $content = new Frontend();
                $content->data_keys = $key . '.' . $request->type;
                $content->save();
            }
        }
        if ($type == 'data') {
            $inputContentValue['image'] = @$content->data_values->image;
            if ($request->hasFile('image_input')) {
                try {
                    $inputContentValue['image'] = fileUploader($request->image_input, getFilePath('seo'), getFileSize('seo'), @$content->data_values->image);
                } catch (\Exception $exp) {
                    $notify[] = ['error', 'Couldn\'t upload the image'];
                    return back()->withNotify($notify);
                }
            }
        } else {

            if ($imgJson) {
                foreach ($imgJson as $imgKey => $imgValue) {
                    $imgData = @$request->image_input[$imgKey];
                    if (is_file($imgData)) {
                        try {
                            $inputContentValue[$imgKey] = $this->storeImage($imgJson, $type, $key, $imgData, $imgKey, @$content->data_values->$imgKey);
                        } catch (\Exception $exp) {
                            $notify[] = ['error', 'Couldn\'t upload the image'];
                            return back()->withNotify($notify);
                        }
                    } else if (isset($content->data_values->$imgKey)) {
                        $inputContentValue[$imgKey] = $content->data_values->$imgKey;
                    }
                }
            }
        }
        $content->data_values = $inputContentValue;

        $content->save();
        $notify[] = ['success', 'Content updated successfully'];
        return back()->withNotify($notify);
    }

    public function frontendSections($key)
    {

        $section = @getPageSections()->$key;
        abort_if(!$section || !$section->builder,404);
        $content = Frontend::where('data_keys', $key . '.content')->orderBy('id','desc')->first();
        $elements = Frontend::where('data_keys', $key . '.element')->orderBy('id')->orderBy('id','desc')->get();
        return view('admin.frontend.index', compact('section', 'content', 'elements', 'key'));
    }


    protected function storeImage($imgJson,$type,$key,$image,$imgKey,$old_image = null)
    {
        $path = 'assets/images/frontend/' . $key;
        if ($type == 'element' || $type == 'content') {
            $size = @$imgJson->$imgKey->size;
            $thumb = @$imgJson->$imgKey->thumb;
        }else{
            $path = getFilePath($key);
            $size = getFileSize($key);
            $thumb = @fileManager()->$key()->thumb;
        }
        return fileUploader($image, $path, $size, $old_image, $thumb);
    }

    public function frontendElement($key, $id = null)
    {
        $section = @getPageSections()->$key;
        if (!$section) {
            return abort(404);
        }

        unset($section->element->modal);
        $title = $section->name . ' Items';
        if ($id) {
            $data = Frontend::findOrFail($id);
            return view('admin.frontend.element', compact('section', 'key', 'title', 'data'));
        }
        return view('admin.frontend.element', compact('section', 'key', 'title'));
    }

    public function remove($id)
    {
        $frontend = Frontend::findOrFail($id);
        $key = explode('.', @$frontend->data_keys)[0];
        $type = explode('.', @$frontend->data_keys)[1];
        if (@$type == 'element' || @$type == 'content') {
            $path = 'assets/images/frontend/' . $key;
            $imgJson = @getPageSections()->$key->$type->images;
            if ($imgJson) {
                foreach ($imgJson as $imgKey => $imgValue) {
                    fileManager()->removeFile($path . '/' . @$frontend->data_values->$imgKey);
                    fileManager()->removeFile($path . '/thumb_' . @$frontend->data_values->$imgKey);
                }
            }
        }
        $frontend->delete();
        $notify[] = ['success', 'Content removed successfully'];
        return back()->withNotify($notify);
    }


}
