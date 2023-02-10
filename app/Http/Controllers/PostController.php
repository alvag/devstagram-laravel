<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        $data = request()->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required',
        ]);

        /* Post::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $data['image'],
            'user_id' => auth()->user()->id,
        ]); */

        $request->user()->posts()->create($data);

        return redirect()->route('posts.index', auth()->user()->username);
    }
}
