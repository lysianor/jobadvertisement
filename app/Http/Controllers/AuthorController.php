<?php

namespace App\Http\Controllers;

use App\User;
use App\Employment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AuthorController extends Controller
{

    public function profile($id)
    {

        $user = Auth::user();
        // $posts = $user->posts;
        $employments = Employment::pluck('name', 'id');
        $employer = User::where('id',$id)
        				->where('role_id', '!=', 1)
        				->firstOrFail();
        $posts = $employer->posts()->approved()->paginate(6);
        $all_views = $posts->sum('view_count');
        return view('profile',compact('employer','posts','all_views','employments'));
    }
}
