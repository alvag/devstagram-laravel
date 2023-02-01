<?php

namespace App\Http\Controllers;

class LogoutController extends Controller
{
    public function store()
    {
        // $request->session()->flush();
        auth()->logout();
        return redirect()->route('login');
    }
}
