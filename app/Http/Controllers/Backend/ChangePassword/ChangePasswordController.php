<?php

namespace App\Http\Controllers\Backend\ChangePassword;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Lang;
use App\Http\Requests\Changepassword\StoreChangepasswordRequest;
use App\Http\Requests\Auth\StoreUserRequest;
use Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function index()
    {

        return view('auth.changepassword');
    }

    public function update(StoreChangepasswordRequest $request)
    {
        $user = Auth::user();
        if (!\Hash::check($request['old_password'], $user->password)) {

            return back()->with('error', 'You have entered wrong password');
        } else {
            $user->password = Hash::make($request['news_password']);
            $user->save();
            return redirect()->route('login.index');
        }
    }
}
