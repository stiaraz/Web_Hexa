<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {   
        // dd(Auth::guard('api')->check());
        $this->validateLogin($request);
        $email= User::where('email',$request->email)->first();
        if ($this->attemptLogin($request)) {
            $user = $this->guard()->user();
            // $user->generateToken();

            return response()->json(["status" => "Logged On",
                'data' => $user->toArray(),
            ]);
        
        }
        elseif(!User::where('email',$request->email)->exists()){
            return response()->json("please check your email");
           }
           
        elseif(!Hash::check($request->password,$email)){
                return response()->json("invalid password");
            }
        
            return $this->sendFailedLoginResponse($request);
        }

    public function logout(Request $request)
    {
        $user = Auth::guard('api')->user();

        if ($user) {
            $user->api_token = null;
            $user->save();
        }

        return response()->json(['data' => 'User logged out.'], 200);
    }
}
