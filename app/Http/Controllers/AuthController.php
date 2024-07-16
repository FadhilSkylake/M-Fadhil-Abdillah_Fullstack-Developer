<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // Show register view
    public function showRegisterForm()
    {
        return view('register/index');
    }

    // Show login view
    public function showLoginForm()
    {
        return view('login/index');
    }
    // Register method
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:user',
            'email' => 'required|string|email|max:255|unique:user',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = new User([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->save();

        return response()->json(['message' => 'User successfully registered'], 201);
    }

    // Login method
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        // Set user in session
        $request->session()->put('user', $user);

        // Generate simple API token (for example purposes, replace with your preferred method)
        $token = base64_encode(Str::random(40));

        return redirect()->route('users.index')->with('access_token', $token);
    }

    // Logout method
    public function logout(Request $request)
    {
        // Remove user from session
        $request->session()->forget('user');

        // Optionally, invalidate the session (logout)
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.form')->with('message', 'You have been logged out successfully.');
    }
}
