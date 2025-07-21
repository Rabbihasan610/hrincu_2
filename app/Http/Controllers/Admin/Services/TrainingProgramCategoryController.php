<?php

namespace App\Http\Controllers\Admin\Services;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TrainingProgramCategory;

class TrainingProgramCategoryController extends Controller
{
    public function index()
    {
        $categories = TrainingProgramCategory::active()->paginate(getPaginate());
        return view('admin.services.training_program_categories.index', compact('categories'));
    }

    public function create()
    {   $title = 'Create Training Program Category';
        return view('admin.services.training_program_categories.create', compact('title'));
    }   

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'title_ar' => 'required|string'
        ]);

        $category = new TrainingProgramCategory();
        $category->title = $request->title;
        $category->title_ar = $request->title_ar;
        $category->status = $request->status ?? 1;
        $category->save();

        $notify[] = ['success', 'Training Program Category create successfully'];
        return back()->withNotify($notify);
    }

    public function edit($id)
    {
        $category = TrainingProgramCategory::findOrFail($id);
        $title = 'Edit Training Program Category';
        return view('admin.services.training_program_categories.edit', compact('title', 'category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'title_ar' => 'required|string'
        ]);

        $category = TrainingProgramCategory::findOrFail($id);
        $category->title = $request->title;
        $category->title_ar = $request->title_ar;
        $category->status = $request->status ?? 1;
        $category->save();

        $notify[] = ['success', 'Training Program Category update successfully'];
        return back()->withNotify($notify);
    }

    public function destroy($id)
    {
        $category = TrainingProgramCategory::findOrFail($id);
        $category->delete();

        $notify[] = ['success', 'Training Program Category delete successfully'];
        return back()->withNotify($notify);
    }
}
