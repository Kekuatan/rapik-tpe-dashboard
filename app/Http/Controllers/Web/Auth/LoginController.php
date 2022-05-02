<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showForm()
    {
        return view('auth.login');
    }

    public function submitForm(Request $request)
    {


        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::guard('staff')->attempt($request->only(['email', 'password']))) {
            return redirect()->route('home');
        }

        return redirect()
            ->route('login')
            ->withInput()
            ->with('message', 'Login Gagal, email atau password salah.');
    }
}
