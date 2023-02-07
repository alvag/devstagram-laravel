<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class LogoutController extends Controller
{
    public function store(): RedirectResponse
    {
        // $request->session()->flush();
        auth()->logout();
        return redirect()->route('login');
    }
}
