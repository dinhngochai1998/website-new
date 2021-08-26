<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\Auth\StoreUserRequest;
use Auth;
use App\Models\Login;
use Illuminate\Support\Facades\Lang;

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

    public function index()
    {

        return view('auth.login');
    }
    public function login(StoreUserRequest $request)
    {
        
        $user = $request->validated();
        
        if (Auth::attempt($user)) {
          
            return redirect()->route('dashboard.show')->with('status', lang::get('messages.succssefull'));
        } else {
            return redirect()->route('login.index')->with('status', lang::get('messages.error_password'));
        }
    }
}
