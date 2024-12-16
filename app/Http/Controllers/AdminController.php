<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PreviousGame;
use App\Models\News;
use App\Models\Game;
use App\Models\Product;
use App\Models\Ticket;


class AdminController extends Controller
{
    public function index()
{
    $users = User::all(); // Obtém todos os usuários
    $previousGames = PreviousGame::all(); // Obtém todos os jogos anteriores
    $news = News::all(); // Obtém todas as notícias
    $products = Product::all(); // Obtém todos os produtos
    //dd($products);

    return view('admin', compact('users', 'previousGames', 'news', 'products')); // Passa todas as variáveis para a view
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

    $photoController = new PhotoController();

    if ($request->hasFile('team_a_logo')) {
        $teamALogo = $photoController->store($request, 'team_a_logo');
        $validatedData['team_a_logo'] = $teamALogo->path;
    }

    if ($request->hasFile('team_b_logo')) {
        $teamBLogo = $photoController->store($request, 'team_b_logo');
        $validatedData['team_b_logo'] = $teamBLogo->path;
    }

    PreviousGame::create([
        'team_a' => $request->input('team_a'),
        'team_b' => $request->input('team_b'),
        'score_a' => $request->input('score_a'),
        'score_b' => $request->input('score_b'),
        'game_date' => $request->input('game_date'),
        'team_a_logo' => $validatedData['team_a_logo'],
        'team_b_logo' => $validatedData['team_b_logo'],
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
    // Validação dos dados recebidos
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'date' => 'required|date',
        'news_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Processamento da imagem
    $imagePath = null;
    if ($request->hasFile('news_image')) {
        $photoController = new PhotoController();
        $storedImage = $photoController->store($request, 'news_image');
        $imagePath = $storedImage->path; // Caminho da imagem armazenada
    }

    // Criação da nova notícia no banco de dados
    try {
        News::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'date' => $request->input('date'),
            'image' => $imagePath, // Caminho da imagem, se presente
        ]);
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to create news: ' . $e->getMessage());
    }

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


    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            //'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        //$product->image = $request->file('image')->store('products', 'public');
        $product->save();
        //return redirect()->route('admin.products')->with('success', 'Product added successfully!');
        return redirect()->route('admin');

    
       
    }
}

