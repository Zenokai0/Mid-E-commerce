<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('name', $request->name)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect('/')->with('success', 'Logged in successfully');
        }

        return back()->withErrors(['name' => 'Invalid credentials'])->withInput();
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:users,name',
            'password' => 'required|string|confirmed', // uses password_confirmation field
        ]);

        $user = User::create([
            'name' => $request->name,
            'password' => bcrypt($request->password),
        ]);

        Auth::login($user); // auto login after register

        return redirect('/')->with('success', 'Account created and logged in!');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');  // Redirect to home page after logout
    }
}
