<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function credentials(Request $request) {
        return array_merge($request->only($this->username(), 'password'));
      }

      protected function sendFailedLoginResponse(Request $request)
      {
          $errors = [$this->username() => trans('auth.failed')];

          // Load user from database
          $user = User::where($this->username(), $request->{$this->username()})->first();

          // Check if user was successfully loaded, that the password matches
          // and active is not 1. If so, override the default error message.
          if ($user && Hash::check($request->password, $user->password)) {
              $errors = [$this->username() => trans('auth.notactivated')];
          }

          if ($request->expectsJson()) {
              return response()->json($errors, 422);
          }
          return redirect()->back()
              ->withInput($request->only($this->username(), 'remember'))
              ->withErrors($errors);
      }
    // public function login(Request $request)
    // {
    //     //Error messages
    //     $messages = [
    //         "email.required" => "Email is required",
    //         "email.email" => "Email is not valid",
    //         "email.exists" => "Email doesn't exists",
    //         "password.required" => "Password is required",
    //         "password.min" => "Password must be at least 6 characters"
    //     ];

    //     // validate the form data
    //     $validator = Validator::make($request->all(), [
    //             'email' => 'required',
    //             'password' => 'required|min:8'
    //         ], $messages);

    //     if ($validator->fails()) {
    //         return back()->with(['error' => 'Password tidak cocok']);
    //     } else {
    //         // attempt to log
    //         if (Auth::attempt(['password' => $request->password ], $request->remember)) {
    //             // if successful -> redirect forward
    //             return redirect()->intended(route('home'));
    //         }

    //         // if unsuccessful -> redirect back

    //         return back()->with(['error' => 'Password tidak cocok']);
    //         // return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
    //         //     'approve' => 'Wrong password or this account not approved yet.',
    //         // ]);
    //     }
    // }
}
