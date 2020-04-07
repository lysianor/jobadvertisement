<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo;

    public function __construct() {
        if (Auth::check() && Auth::user()->role_id == 1) {
            $this->redirectTo = route('admin.dashboard');
        } else {
            $this->redirectTo = route('employer.dashboard');
        }
        $this->middleware('guest')->except('logout');
    }

     public function authenticated(Request $request, $user) {
        if (!$user->verified) {
            auth()->logout();
            Toastr::warning('We have sent you an activation code, please check your email.' ,'Warning');
            return back();
        }
            return redirect()->intended($this->redirectPath());
    }
}
