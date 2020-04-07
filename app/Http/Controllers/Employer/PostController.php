<?php

namespace App\Http\Controllers\Employer;

use App\Category;
use App\Notifications\NewAuthorPost;
use App\Tag;
use App\Post;
use App\User;
use App\Employment;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{

    public function index() {
        $posts = Auth::user()->posts()->latest()->get();
        return view('employer.post.index',compact('posts'));
    }

    public function create() {
        $categories = Category::all();
        $tags = Tag::all();
        $employments = Employment::all();
        return view('employer.post.create',compact('categories','tags','employments'));
    }


    public function store(Request $request) {
        // $this->validate($request,[
        //     'title' => 'required',
        //     'categories' => 'required',
        //     'employments' => 'required',
        //     'body' => 'required',
        //     'salary' => 'required',
        //     'per' => 'required',
        //     'experience' => 'required',
        //     'degree' => 'required',
        //     'address' => 'required',
        // ]);

        $slug = str_slug($request->title);
        $post = new Post();
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->slug = $slug;
        $post->body = $request->body;
        $post->salary = $request->salary;
        $post->per = $request->per;
        $post->degree = $request->degree;
        $post->address = $request->address;
        $post->latitude = $request->latitude;
        $post->longitude = $request->longitude;
        $post->is_approved = false;
        $post->save();

        $post->categories()->attach($request->categories);
        $post->employments()->attach($request->employments);
        // $post->tags()->attach($request->tags);

        $users = User::where('role_id','1')->get();
        Notification::send($users, new NewAuthorPost($post));
        Toastr::success('Successfully Saved','Success');
        return redirect()->route('employer.post.index');
    }

    public function show(Post $post) {
        if ($post->user_id != Auth::id()) {
            Toastr::error('You are not authorized to access this post','Error');
            return redirect()->back();
        }
        return view('employer.post.show',compact('post'));
    }

    public function edit(Post $post) {
        if ($post->user_id != Auth::id()) {
            Toastr::error('You are not authorized to access this post','Error');
            return redirect()->back();
        }
        $categories = Category::all();
        $tags = Tag::all();
        $employments = Employment::all();
        return view('employer.post.edit',compact('post','categories','tags','employments'));
    }

    public function update(Request $request, Post $post) {
        if ($post->user_id != Auth::id()) {
            Toastr::error('You are not authorized to access this post','Error');
            return redirect()->back();
        }
        // $this->validate($request,[
        //     'title' => 'required',
        //     'categories' => 'required',
        //     'employments' => 'required',
        //     'body' => 'required',
        //     'salary' => 'required',
        //     'per' => 'required',
        //     'experience' => 'required',
        //     'degree' => 'required',
        //     'address' => 'required',
        // ]);
        $slug = str_slug($request->title);
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->slug = $slug;
        $post->body = $request->body;
        $post->salary = $request->salary;
        $post->per = $request->per;
        $post->degree = $request->degree;
        $post->address = $request->address;
        $post->latitude = $request->latitude;
        $post->longitude = $request->longitude;
        $post->is_approved = false;
        $post->save();

        $post->categories()->sync($request->categories);
        $post->employments()->sync($request->employments);
        // $post->tags()->sync($request->tags);

        Toastr::success('Successfully Updated','Success');
        return redirect()->route('employer.post.index');
    }

    public function destroy(Post $post) {
        if ($post->user_id != Auth::id()) {
            Toastr::error('You are not authorized to access this post','Error');
            return redirect()->back();
        }
        if (Storage::disk('public')->exists('post/'.$post->image))
        {
            Storage::disk('public')->delete('post/'.$post->image);
        }
        $post->categories()->detach();
        $post->tags()->detach();
        $post->delete();
        Toastr::success('Successfully Deleted','Success');
        return redirect()->back();
    }
}
