<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use App\Employment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{

    public function index() {
        $posts = Post::latest()->paginate(10);
        return view('posts',compact('posts'));
    }

    public function details($id) {
        $post = Post::where('id',$id)
                    ->firstOrFail();

        $blogKey = 'blog_' . $post->id;

        if (!Session::has($blogKey)) {
            $post->increment('view_count');
            Session::put($blogKey,1);
        }
        $categories = Category::pluck('name', 'id');
        $employments = Employment::pluck('name', 'id'); 
        $randomposts = Post::take(4)->approved()->inRandomOrder()->get();
        
        return view('post',compact('post','randomposts','categories','employments'));

    }

    public function postByCategory($slug) {
        $categories = Category::pluck('name', 'id');
        $employments = Employment::pluck('name', 'id');
        $category = Category::where('slug',$slug)->firstOrFail();
        $posts = $category->posts()->approved()->paginate(10);
        return view('category',compact('category','posts','categories','employments'));
    }

    public function postByTag($slug) {
        $tag = Tag::where('slug',$slug)->firstOrFail();
        $posts = $tag->posts()->approved()->paginate(10);
        return view('tag',compact('tag','posts'));
    }

    public function postByEmployment($slug) {
        $categories = Category::pluck('name', 'id');
        $employments = Employment::pluck('name', 'id');
        $employment = Employment::where('slug',$slug)->firstOrFail();
        $posts = $employment->posts()->approved()->paginate(10);
        return view('employment',compact('employment','posts','categories','employments'));
    }
}
