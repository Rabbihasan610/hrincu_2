<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CandidateCategory;

class CandidateCategoryController extends Controller
{
    public function index()
    {
        $datas = CandidateCategory::searchable(['name', 'status'])->latest()->paginate(getPaginate());
        return view('admin.candidate-category.index', compact('datas'));
    }

    public function create()
    {
        $title = 'Create Category';
        return view('admin.candidate-category.create', compact('title'));
    }

    public function store(Request $request, $id = null)
    {
        $request->validate([
            'name' => 'required|string',
            'name_ar' => 'required|string',
        ]);

        if ($id) {
            $category = CandidateCategory::findOrFail($id);
            $category->name = $request->name;
            $category->name_ar = $request->name_ar;
            $category->save();

            $notify[] = ['success', 'Category updated successfully'];

            return to_route('admin.candidate-category.index')->withNotify($notify);
        } else {
            $category = new CandidateCategory();
            $category->name = $request->name;
            $category->name_ar = $request->name_ar;
            $category->save();

            $notify[] = ['success', 'Category created successfully'];

            return to_route('admin.candidate-category.index')->withNotify($notify);
        }
    }

    public function edit($id)
    {
        $data = CandidateCategory::findOrFail($id);
        $title = 'Edit Category';
        return view('admin.candidate-category.create', compact('data', 'title'));
    }

    public function destroy($id)
    {
        $category = CandidateCategory::findOrFail($id);
        $category->delete();
        $notify[] = ['success', 'Category deleted successfully'];
        return to_route('admin.candidate-category.index')->withNotify($notify);
    }
}
