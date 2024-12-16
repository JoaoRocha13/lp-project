<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|max:500',
        ]);

        Comment::create([
            'user_id' => Auth::user()->id,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Comment added successfully!');
    }

    public function index()
    {
        $comments = Comment::with('user')->latest()->get();
        return view('index', compact('comments'));
    }
}
