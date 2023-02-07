<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user): Factory|View|Application
    {
        return view('dashboard', [
            'user' => $user,
        ]);
    }

    public function create(): Factory|View|Application
    {
        return view('posts.create');
    }
}
