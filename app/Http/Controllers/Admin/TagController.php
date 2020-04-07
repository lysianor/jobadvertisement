<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function index(Request $request) {
        $query = $request->input('query');
        $tags = Tag::latest()
                        ->where('name','LIKE',"%$query%")
                        ->paginate(10);
        return view('admin.tag.index',compact('tags','query'));
    }


    public function create() {
        return view('admin.tag.create');
    }


    public function store(Request $request) {
        $this->validate($request,[
            'name' => 'required'
        ]);
        $tag = new Tag();
        $tag->name = $request->name;
        $tag->slug = str_slug($request->name);
        $tag->save();
        Toastr::success('Successfully Saved' ,'Success');
        return redirect()->route('admin.tag.index');
    }


    public function show($id) {
        //
    }

    public function edit($id) {
        $tag = Tag::find($id);
        return view('admin.tag.edit',compact('tag'));
    }

    public function update(Request $request, $id) {
        $tag = Tag::find($id);
        $tag->name = $request->name;
        $tag->slug = str_slug($request->name);
        $tag->save();
        Toastr::success('Successfully Updated','Success');
        return redirect()->route('admin.tag.index');
    }


    public function destroy(Tag $tag) {
        if ($tag->posts()->count()){
            Toastr::error('Cant be Deleted','Error');
            return redirect()->back();
        }
        Tag::find($id)->delete();
        Toastr::success('Tag Successfully Deleted','Success');
        return redirect()->back();
    }
}
