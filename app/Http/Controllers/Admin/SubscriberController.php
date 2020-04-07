<?php

namespace App\Http\Controllers\Admin;

use App\Subscriber;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriberController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $subscribers = Subscriber::latest()
                        ->where('email','LIKE',"%$query%")
                        ->paginate(10);
        return view('admin.subscriber',compact('subscribers','query'));
        
    }

    public function destroy($subscriber)
    {
        $subscriber = Subscriber::findOrFail($subscriber);
        $subscriber->delete();
        Toastr::success('Successfully Deleted','Success');
        return redirect()->back();
    }
}
