<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\Auth\StoreUserRequest;
use Auth;
use App\Models\Login;
use Illuminate\Support\Facades\Lang;
use Session;
use Illuminate\Http\Request;

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

    public function login(Request $request)
    {
        // $user = $request->validated();
        $user = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (!$token = Auth::attempt($user)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        } else {
            return $this->respondWithToken($token);
        }
    }
}
