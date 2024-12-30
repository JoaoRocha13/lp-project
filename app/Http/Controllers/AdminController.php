<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PreviousGame;
use App\Models\News;
use App\Models\Product;
use App\Models\Ticket;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\PhotoController;


class AdminController extends Controller
{
    public function __construct()
    {
        // Compartilha jogos futuros com todas as views
        View::share('games', Game::where('game_date', '>=', now())->latest()->get());
    }

    
    public function index()
{
    $users = User::all(); // Obtém todos os usuários
    $previousGames = PreviousGame::all(); // Obtém todos os jogos anteriores
    $news = News::all(); // Obtém todas as notícias
    $products = Product::all(); // Obtém todos os produtos
    $games = Game::all(); // Obtém todos os jogos
    $tickets = Ticket::all(); // Obtém todos os tickets
    //dd($products);

    return view('admin', compact('users', 'previousGames', 'news', 'products', 'games', 'tickets')); // Passa todas as variáveis para a view
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
        'local' => 'required|string|max:255',
        'ticket_price' => 'required|numeric|min:0',
        'tickets_available' => 'required|integer|min:0',
        'team_a_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'team_b_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $photoController = new PhotoController();

$teamALogoPath = null;
if ($request->hasFile('team_a_logo')) {
    $storedImageA = $photoController->store($request, 'team_a_logo');
    $teamALogoPath = $storedImageA->path; // Caminho armazenado
}

$teamBLogoPath = null;
if ($request->hasFile('team_b_logo')) {
    $storedImageB = $photoController->store($request, 'team_b_logo');
    $teamBLogoPath = $storedImageB->path; // Caminho armazenado
}

    // Criar o jogo correspondente
    $game = Game::create([
        'team_a' => $request->input('team_a'),
        'team_b' => $request->input('team_b'),
        'game_date' => $request->input('game_date'),
        'local' => $request->input('local'),
        'ticket_price' => $request->input('ticket_price'),
        'tickets_available' => $request->input('tickets_available'),
    ]);

    // Criar o jogo anterior com os dados e logos
    PreviousGame::create([
        'game_id' => $game->id,
        'team_a' => $request->input('team_a'),
        'team_b' => $request->input('team_b'),
        'score_a' => $request->input('score_a'),
        'score_b' => $request->input('score_b'),
        'game_date' => $request->input('game_date'),
        'local' => $request->input('local'),
        'ticket_price' => $request->input('ticket_price'),
        'tickets_available' => $request->input('tickets_available'),
        'team_a_logo' => $teamALogoPath, // Caminho do logo do time A
        'team_b_logo' => $teamBLogoPath, // Caminho do logo do time B
    ]);

    return redirect()->back()->with('success', 'Previous game added successfully!');
}

public function showPreviousGames()
{
    $previousGames = PreviousGame::all(); // Busca todos os jogos
    return view('admin', compact('previousGames'));
}


public function AddNewGame(Request $request) {

    // Validação dos dados recebidos
    $request->validate([
        'team_a' => 'required|string|max:50',
        'team_b' => 'required|string|max:50',
        'game_date' => 'required|date',
        'local' => 'required|string|max:100', 
        'ticket_price' => 'required|numeric|min:0',
        'tickets_available' => 'required|integer|min:0',
    ]);
    
    // Criação do novo jogo na bd
    Game::create([
        'team_a' => $request->input('team_a'),
        'team_b' => $request->input('team_b'),
        'game_date' => $request->input('game_date'),
        'local' => $request->input('local'),
        'ticket_price' => $request->input('ticket_price'),
        'tickets_available' => $request->input('tickets_available'),
    ]);
    

    return redirect()->route('admin')->with('section', 'postGamesSection')->with('success', 'Game added successfully!');
    
}

public function deleteGame($id)
{
    $game = Game::findOrFail($id); // Localiza o jogo pelo ID
    $game->delete(); // Deleta o jogo
    return redirect()->route('admin')->with('success', 'Game removed successfully!');
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
    $news = News::paginate(3);

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
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $photoController = new PhotoController();
        $storedImage = $photoController->store($request, 'image');
        $imagePath = $storedImage->path;
    }

    Product::create([
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'price' => $request->input('price'),
        'stock' => $request->input('stock'),
        'image' => $imagePath,
    ]);

    return redirect()->route('admin')
        ->with('section', 'postItemsSection')
        ->with('success', 'Product added successfully!');
}
public function showStore()
{
    $products = Product::all(); // Carregar todos os produtos
    return view('store', compact('products'));
}
public function showGames()
{
    // Pega apenas os jogos futuros, ordenados por data
    $games = Game::paginate(6);

    // Retorna para a view home
    return view('home', compact('games'));
}
}

