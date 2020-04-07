<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{

    public function index() {
        $categories = Category::latest()->get();
        return view('admin.category.index',compact('categories'));
    }

    public function create() {
        return view('admin.category.create');
    }

    public function store(StoreCategoryRequest $request) {
        // $this->validate($request,[
        //     'name' => 'required|unique:categories',
        // ]);
        $slug = str_slug($request->name);
        $category = new Category();
        $category->name = $request->name;
        $category->slug = $slug;
        $category->save();
        Toastr::success('Successfully Save' ,'Success');
        return redirect()->route('admin.category.index');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    public function update(UpdateCategoryRequest $request, $id) {
        // $this->validate($request,[
        //     'name' => 'required',
        // ]);
        $category = Category::find($id);
        $slug = str_slug($request->name);
        $category->name = $request->name;
        $category->slug = $slug;
        $category->save();
        Toastr::success('Successfully Updated' ,'Success');
        return redirect()->route('admin.category.index');
    }

    public function destroy(Category $category) {
        if ($category->posts()->count()) {
            Toastr::error('Cant be Deleted','Error');
            return redirect()->back();
        }
        $category->delete();
        Toastr::success('Successfully Deleted','Success');
        return redirect()->back();
    }
}
