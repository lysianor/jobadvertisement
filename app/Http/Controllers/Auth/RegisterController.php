<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Verification;
use App\Mail\VerificationMail;
use Mail;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;
use App\Rules\Captcha;
use App\Http\Requests\RegisterRequest;


class RegisterController extends Controller
{

    use RegistersUsers;

    protected $redirectTo;

    public function __construct() {
        // if (Auth::check() && Auth::user()->role->id == 1) {
        //     $this->redirectTo = route('admin.dashboard');
        // } else {
        //     $this->redirectTo = route('employer.dashboard');
        // }
        $this->middleware('guest');
    }


    protected function validator(array $data) {
        return Validator::make($data, [
            'company' => 'required|string|max:255',
            'industry' => 'required|string|max:255',
            'size' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'g-recaptcha-response' => new Captcha(),
        ]);
    }

    protected function create(array $data) {
        $user = User::create([
            'role_id' => 2,
            'company' => $data['company'],
            'industry' => $data['industry'],
            'size' => $data['size'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $verify = Verification::create([
            'token' => Str::random(40),
            'user_id' => $user->id
        ]);

        Mail::to($user->email)->send(new VerificationMail($user));
        return $user;
    }

    public function verification($token) {
        $verify = Verification::where('token', $token)->first();
        if(isset($verify)){
            $user = $verify->user;
            if(!$user->verified) {
                $verify->user->verified = 1;
                $verify->user->save();
                $status = Toastr::success('Your email is successfully verified, You can login right now.' ,'Success');
            } else{
                $status = Toastr::success('Your email is already verified. You can login right now.' ,'Success'); 
            }
        } else {
            return redirect('/login')->with('warning', 'Sorry your email cannot identified.');
        }
        return redirect('/login')->with('success',$status);
    }
    
    protected function registered(Request $request, $user) {
        $this->guard()->logout();
        Toastr::success('Your account is successfully created. Please check your email for activation link. Thank you!.' ,'Success');
        return redirect('/login');
    }
}
