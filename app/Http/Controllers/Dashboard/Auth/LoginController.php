<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function view()
    {
        return view('dashboard.auth.login');
    }

    public function auth(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect('/dashboard/admin');
    }

    public function destroy(Request $request)
    {
        Auth::guard('admin')->logout();

        return redirect('/dashboard');
    }
}
