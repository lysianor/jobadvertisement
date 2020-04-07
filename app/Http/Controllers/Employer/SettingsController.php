<?php

namespace App\Http\Controllers\Employer;

use App\User;
use App\Employer;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UpdateCompanyInfoRequest;

class SettingsController extends Controller
{
    public function index() {
        return view('employer.settings');
    }

    public function profile() {
        $users = User::findOrFail(Auth::id());
        $posts = $users->posts;
        $all_views = $posts->sum('view_count');
        return view('employer.profile',compact('users','posts','all_views'));
    }

    public function updateProfile(Request $request) {
        $this->validate($request,[
            'name' => 'required',
            'company' => 'required',
            'phone' => 'required|numeric',
            'website' => 'required',
            'image' => 'required|image',
            'address' => 'required',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->company);
        $user = User::findOrFail(Auth::id());
        // Handle the user upload of avatar
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Delete current image before uploading new image
            if ($user->image !== 'default.png') {
                // $file = public_path('uploads/avatars/' . $user->avatar);
                $file = 'profile/' . $user->image;
                //$destinationPath = 'uploads/' . $id . '/';

                if (File::exists($file)) {
                    unlink($file);
                }
            }
            // Image::make($avatar)>resize(300, 300)>save(public_path('uploads/avatars/' . $filename));
            Image::make($image)->resize(122, 120)->save('profile/' . $imageName);
        $user->company = $request->company;
        $user->name = $request->name;
        $user->image = $imageName;
        $user->phone = $request->phone;
        $user->website = $request->website;
        $user->phone = $request->phone;
        $user->size = $request->size;
        $user->industry = $request->industry;
        $user->about = $request->about;
        $user->address = $request->address;
        $user->latitude = $request->latitude;
        $user->longitude = $request->longitude;
        $user->save();
        Toastr::success('Successfully Updated','Success');
        return redirect()->back();
    }
}

    public function updatePassword(Request $request) {
        // $this->validate($request,[
        //     'old_password' => 'required',
        //     'password' => 'required|confirmed',
        // ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->old_password,$hashedPassword)) {
            if (!Hash::check($request->password,$hashedPassword)) {
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Toastr::success('Password Successfully Changed','Success');
                // Auth::logout();
                return redirect()->back();
            } else {
                Toastr::error('New Password cannot be the same as old password.','Error');
                return redirect()->back();
            }
        } else {
            Toastr::error('Current password not match.','Error');
            return redirect()->back();
        }
    }
}
