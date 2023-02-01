<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use App\Models\UserListing;

class UserController extends Controller
{
    public static function test($user) {
        return $user;
    }

    public static function index() {
        return view('components.users', ['users' => UserListing::index()]);
    }

    public function add(Request $request)
        {$formFields = $request->validate([
            'name' => 'required|min:3|regex:/^(\w+ ?)+$/u',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'pin' => 'required|confirmed|min:6',
            'pin_confirmation' => 'required|min:6',
            'job' => 'required']);
        // $formFields['password'] = bcrypt($formFields['password']);
        $user = User::create($formFields);
        return redirect('/users')->with(['message', 'User created']);}

    public function logout(Request $request)
        {auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->flush();
        return redirect('/')->with('message', 'You have been logged out!');}

    public function authenticate(Request $request)
        {$formFields = $request->validate([
            'pin' => 'required']);
        $user = User::where('pin', $request->pin)
                    ->first();
        if($user)
            {$request->session()->regenerate();
            $request->session()->flush();
            Auth::login($user);
            return redirect('/content')->with('message', 'You are now logged in!');}
        return redirect('/')->withErrors(['pin' => 'Invalid PIN']);
    }

}
