<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        $doctor = Doctor::where('username', $credentials['username'])->first();

        if ($doctor && \Hash::check($credentials['password'], $doctor->password)) {
            session(['doctor' => $doctor->id]);
            return redirect('/dashboard');
        }

        return back()->withErrors(['message' => 'Invalid credentials']);
    }

    public function logout()
    {
        session()->forget('doctor');
        return redirect('/login');
    }
}
