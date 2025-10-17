<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class AuthController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth',only: ['getLogout']),
            // You can also limit middleware to certain methods:
            // new Middleware('auth', only: ['create', 'store', 'edit', 'update', 'destroy']),
            new Middleware('guest', only: ['getLogin','postLogin','getRegister','getpostRegister']),
        ];
    }

    public function getLogin(){


        return view('auth.login');
    }

    public function getRegister(){

        return view('auth.register');
    }

    public function getpostRegister(Request $request){
         $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        //  $posts = Post::latest()->get();

        return redirect('/');
    }

    public function postLogin(Request $request){
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)){
            //regenerate session to prevent fixation attacks
            // dd('Login worked! User:', Auth::user());
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        //login failed
        return back()->withErrors([
            'email' => 'Provided credentials do not match our records.',
        ]);

    }

    public function getLogout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
