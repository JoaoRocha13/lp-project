<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PreviousGame;
use App\Models\News;

class AdminController extends Controller
{
    public function index()
{
    $users = User::all(); // Obtém todos os usuários
    $previousGames = PreviousGame::all(); // Obtém todos os jogos anteriores
    $news = News::all(); // Obtém todas as notícias

    return view('admin', compact('users', 'previousGames', 'news')); // Passa todas as variáveis para a view
}
 public function promoteToAdmin($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->role = 'admin'; // Atualiza o papel para admin
            $user->save();
            return redirect()->route('admin')->with('success', 'User promoted to admin successfully.');
        }

        return redirect()->route('admin')->with('error', 'User not found.');
    }
    public function storePreviousGame(Request $request)
{
    $request->validate([
        'team_a' => 'required|string|max:255',
        'team_b' => 'required|string|max:255',
        'score_a' => 'required|integer',
        'score_b' => 'required|integer',
        'game_date' => 'required|date',
        'team_a_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'team_b_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Salvar as imagens com o nome original
    $teamALogo = $request->file('team_a_logo');
    $teamBLogo = $request->file('team_b_logo');

    $teamALogoPath = $teamALogo->storeAs(
        'public/images',
        $teamALogo->getClientOriginalName()
    );

    $teamBLogoPath = $teamBLogo->storeAs(
        'public/images',
        $teamBLogo->getClientOriginalName()
    );

    // Salvar no banco de dados
    PreviousGame::create([
        'team_a' => $request->team_a,
        'team_b' => $request->team_b,
        'score_a' => $request->score_a,
        'score_b' => $request->score_b,
        'game_date' => $request->game_date,
        'team_a_logo' => basename($teamALogoPath),
        'team_b_logo' => basename($teamBLogoPath),
    ]);

    return redirect()->back()->with('success', 'Game posted successfully!');
}
public function showPreviousGames()
{
    $previousGames = PreviousGame::all(); // Busca todos os jogos
    return view('admin', compact('previousGames'));
}

public function deletePreviousGame($id)
{
    $game = PreviousGame::findOrFail($id); // Localiza o jogo pelo ID
    $game->delete(); // Deleta o jogo
    return redirect()->route('admin')->with('success', 'Previous Game removed successfully!');
}
public function storeNews(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'date' => 'required|date',
    ]);

    News::create([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'date' => $request->input('date'),
    ]);

    return redirect()->back()->with('success', 'News posted successfully!');
}
public function deleteNews($id)
{
    $newsItem = News::findOrFail($id); // Localiza a notícia pelo ID
    $newsItem->delete(); // Deleta a notícia
    return redirect()->route('admin')->with('success', 'News removed successfully!');
}

public function about()
{
    // Obter todos os jogos anteriores e notícias
    $previousGames = PreviousGame::all();
    $news = News::all();

    // Retornar a view com os dados
    return view('about', compact('previousGames', 'news'));
}
}

