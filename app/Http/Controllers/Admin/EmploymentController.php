<?php

namespace App\Http\Controllers\Admin;

use App\Employment;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmploymentRequest;
use App\Http\Requests\UpdateEmploymentRequest;

class EmploymentController extends Controller
{
    public function index(Request $request) {
        $query = $request->input('query');
        $employments = Employment::latest()
                        ->where('name','LIKE',"%$query%")
                        ->paginate(10);
        return view('admin.employment.index',compact('employments','query'));
    }

    public function create() {
        return view('admin.employment.create');
    }

    public function store(StoreEmploymentRequest $request) {
        // $this->validate($request,[
        //     'name' => 'required|unique:employments',
        // ]);
        $employment = new Employment();
        $employment->name = $request->name;
        $employment->slug = str_slug($request->name);
        $employment->save();
        Toastr::success('Successfully Saved ' ,'Success');
        return redirect()->route('admin.employment.index');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $employment = Employment::find($id);
        return view('admin.employment.edit',compact('employment'));
    }

    public function update(UpdateEmploymentRequest $request, $id) {
        // $this->validate($request,[
        //     'name' => 'required',
        // ]);
        $employment = Employment::find($id);
        $slug = str_slug($request->name);
        $employment->name = $request->name;
        $employment->slug = $slug;
        $employment->save();
        Toastr::success('Successfully Updated' ,'Success');
        return redirect()->route('admin.employment.index');
    }

    public function destroy(Employment $employment) {
        if ($employment->posts()->count()){
            Toastr::error('Cant be Deleted','Error');
            return redirect()->back();
        }
        $employment->delete();
        Toastr::success('Successfully Deleted','Success');
        return redirect()->back();
    }
}
