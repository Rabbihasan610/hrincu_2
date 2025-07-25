<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageBuilderController extends Controller
{
    public function managePages()
    {
        $pdata = Page::get();
        return view('admin.frontend.builder.pages', compact('pdata'));
    }

    public function manageSection($id)
    {
        $pdata = Page::findOrFail($id);
        $sections =  getPageSections(true);
        return view('admin.frontend.builder.index', compact('pdata','sections'));
    }

    public function manageSectionUpdate($id, Request $request)
    {
        $request->validate([
            'secs' => 'nullable|array',
        ]);

        $page = Page::findOrFail($id);
        if (!$request->secs) {
            $page->secs = null;
        }else{
            $page->secs = json_encode($request->secs);
        }
        $page->save();
        $notify[] = ['success', 'Page sections updated successfully'];
        return back()->withNotify($notify);
    }

    public function managePagesSave(Request $request){

        $request->validate([
            'name' => 'required|min:3|string|max:40',
            'slug' => 'required|min:3|string|max:40',
        ]);

        $exist = Page::where('slug', slug($request->slug))->exists();
        if($exist){
            $notify[] = ['error', 'This page already exists on your current template. Please change the slug.'];
            return back()->withNotify($notify);
        }
        $page = new Page();
        $page->name = $request->name;
        $page->slug = slug($request->slug);
        $page->save();
        $notify[] = ['success', 'New page added successfully'];
        return back()->withNotify($notify);

    }

    public function managePagesUpdate(Request $request){

        $page = Page::where('id',$request->id)->firstOrFail();
        $request->validate([
            'name' => 'required|min:3|string|max:40',
            'slug' => 'required|min:3|string|max:40'
        ]);

        $slug = slug($request->slug);

        $exist = Page::where('slug',$slug)->first();
        if(($exist) && $exist->slug != $page->slug){
            $notify[] = ['error', 'This page already exist on your current template. please change the slug.'];
            return back()->withNotify($notify);
        }

        $page->name = $request->name;
        $page->slug = slug($request->slug);
        $page->save();

        $notify[] = ['success', 'Page updated successfully'];
        return back()->withNotify($notify);

    }

    public function managePagesDelete($id){
        $page = Page::where('id',$id)->firstOrFail();
        $page->delete();
        $notify[] = ['success', 'Page deleted successfully'];
        return back()->withNotify($notify);
    }
}
