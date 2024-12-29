<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
    Auth,
    Redirect,
    Validator,
    Hash,
    Log
};
use App\Models\User;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('UserPanel.register');
    }

    public function refRegistrationForm($refId)
    {
        $rfId = $refId;
        return view('UserPanel.reffredregister', compact('rfId'));
    }


    public function register(Request $request)
    {
        // Validate the request data
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:15|unique:users,phone',
            'referral_id' => 'nullable|string|max:10|exists:users,id',
            'password' => 'required|string|min:8|confirmed',
        ]);

        try {
            // Create the user in the database
            $user = User::create([
                'name' => $request->input('full_name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'referral_id' => $request->input('referral_id'),
                'password' => Hash::make($request->input('password')),
            ]);

            // Optional: Automatically log in the user
            Auth::login($user);

            // Redirect with success message
            return redirect()->route('dashboard')->with('success', 'Account created successfully!');
        } catch (\Exception $e) {
            // Log the error
            Log::error('Registration error: ' . $e->getMessage());

            // Redirect back with error message
            return back()->with('error', 'An error occurred during registration. Please try again.');
        }
    }


    public function showLoginForm()
    {
        return view('UserPanel.login');
    }

    public function login(Request $request)
    {
        // Validate the incoming request
        $credentials = $request->only('email', 'password');
        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        // Attempt to log the user in
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard'); // Redirect to the intended page
        }

        // If login fails, redirect back with error
        return redirect()->back()->withErrors('Invalid login credentials.');
    }
    public function logout(Request $request)
    {
        Auth::logout(); // Log the user out

        // Invalidate the session and regenerate the CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login'); // Redirect to the login page or home
    }
}
