<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|max:500',
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Comment added successfully!');
    }

    public function index()
    {
        $comments = Comment::with('user')->latest()->get();
        return response()->json($comments);
    }
}