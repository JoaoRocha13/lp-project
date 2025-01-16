<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Models\Game;


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

        return redirect()->route('home')->with('success', 'Comment added successfully!');
    }

    public function index()
{
    $comments = Comment::with('user')->latest()->get(); // Busca os comentários mais recentes
    $games = Game::paginate(6); // Busca os jogos com paginação

    
    return view('home', compact('comments', 'games'));
}
}
