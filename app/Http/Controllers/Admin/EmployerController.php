<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployerController extends Controller
{
    public function index(Request $request) {
      $query = $request->input('query');
      // $employers = User::employers()
      //      ->withCount('posts')
      //      ->get();
      $employers = User::employers()
                  ->where('name','LIKE',"%$query%")
                  ->withCount('posts')
                  ->paginate(10);
      return view('admin.employers',compact('employers','query'));
    }

    public function destroy($id) {
        $employer = User::findOrFail($id)->delete();
        Toastr::success('Successfully Deleted','Success');
        return redirect()->back();
    }
}
