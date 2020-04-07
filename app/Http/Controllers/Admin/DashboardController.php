<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Post;
use App\Tag;
use App\User;
use App\Subscriber;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        $users = Auth::user();
        $posts = Post::where('is_approved',true);
        $popular_posts = Post::where('is_approved',false)
                            ->orderBy('view_count','desc')
                            ->take(5)
                            ->get();
        $total_pending_posts = Post::where('is_approved',false)->count();
        $all_views = Post::sum('view_count');
        $author_count = User::where('role_id',2)->count();
        $subscriber_count = Subscriber::count();

        $new_authors_today = User::where('role_id',2)
                                ->whereDate('created_at',Carbon::today())
                                ->count();
        $active_authors = User::where('role_id',2)
                                ->withCount('posts')
                                ->orderBy('posts_count','desc')
                                ->take(5)->get();
       $category_count = Category::all()->count();
       $tag_count = Tag::all()->count();

        return view('admin.dashboard',compact('posts','popular_posts','total_pending_posts','all_views','author_count','new_authors_today','active_authors','category_count','tag_count','subscriber_count','users'));
    }
}