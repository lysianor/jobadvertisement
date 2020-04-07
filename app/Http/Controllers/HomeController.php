<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\User;
use App\Employment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class HomeController extends Controller
{
    public function index()
    {
        $popular_posts = Post::orderBy('view_count','desc')
                        ->take(8)
                        ->get();
        // $categories = Category::take(6)
        //                 ->get();
        $posts = Post::orderBy('view_count','desc')
                        ->approved()
                        ->take(6)
                        ->get();
        $posts_count = Post::all()->count();
        $categories_count = Category::all()->count();
        $employers_count = User::all()->count();
        $employments = Employment::pluck('name', 'id');
        $categories = Category::pluck('name', 'id');
        return view('welcome',compact('categories','posts','employments','posts_count','employers_count','categories_count','popular_posts'));
    }

    public function jobsearch(Request $request) {
        $posts = Post::latest()
                    ->approved()
                    ->searchResults()
                    ->paginate(10);
        $categories = Category::pluck('name', 'id');
        $employments = Employment::pluck('name', 'id');
        $randomposts = User::take(6)->where('verified',true)
                    ->where('role_id', '!=', 1)
                    ->inRandomOrder()
                    ->get();
        $mapShops = $posts->makeHidden([ 'created_at', 'updated_at', 'deleted_at', 'created_by_id', 'image']);
        $latitude = $posts->count() && (request()->filled('category') || request()->filled('search')) ? $posts->average('latitude') : 14.6581639;
        $longitude = $posts->count() && (request()->filled('category') || request()->filled('search')) ? $posts->average('longitude') : 121.1063681;
        return view ('public.job-search',compact('categories','posts','employments','latitude','longitude','mapShops','randomposts'));
    }

    public function companysearch(Request $request) {
        $query = $request->input('query');
        $categories = Category::pluck('name', 'id');
        $posts = Post::latest()->approved();
        $employments = Employment::pluck('name', 'id');
        $employers = User::latest()
                    ->where('verified',true)
                    ->where('role_id', '!=', 1)
                    ->searchCompanies()
                    ->withCount('posts')
                    ->paginate(10);
        $randomposts = Post::take(6)->approved()->inRandomOrder()->get();
        $mapShops = $employers->makeHidden([ 'created_at', 'updated_at', 'deleted_at', 'created_by_id', 'image']);
        $latitude = $employers->count() && (request()->filled('category') || request()->filled('search')) ? $employers->average('latitude') : 14.6581639;
        $longitude = $employers->count() && (request()->filled('category') || request()->filled('search')) ? $employers->average('longitude') : 121.1063681;
        return view ('public.company-search',compact('categories','posts','employments','employers','query','latitude','longitude','mapShops','randomposts'));
    }
}
