<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validated_data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'avatar' => 'nullable|file'
        ]);

        if($request->hasFile('avatar')){
            $validated_data['avatar'] = Storage::disk('public')->put('avatars', $request->avatar);
        }

        $user = User::create($validated_data);

        Auth::login($user);

        return redirect()->intended('dashboard')->with('message','Welcome to our Application!');

    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($data)){
            
            $request->session()->regenerate();
            return redirect()->intended('home');
        }

        return back()->withErrors([
            'email' =>'The provided credentials does not match our records'
        ])->onlyInput('email');

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

}
