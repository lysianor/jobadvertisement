<?php

namespace App\Http\Controllers\Employer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $users = Auth::user();
        $posts = $users->posts;
        $popular_posts = $users->posts()
            ->orderBy('view_count','desc')
            ->where('is_approved',true)
            ->get();
        $total_pending_posts = $posts->where('is_approved',false)->count();
        $all_views = $posts->sum('view_count');
        return view('employer.dashboard',compact('posts','popular_posts','total_pending_posts','all_views','users'));
    }
}
