<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\FaturaController;
use App\Http\Controllers\ProductController;

// Upload de fotos
Route::post('save', [PhotoController::class, 'store'])->name('upload.picture');


// Páginas públicas
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/registo', function () {
    return view('registo');
})->name('registo');

Route::get('/index', function () {
    return view('index');
})->name('index');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/store', function () {
    return view('store');
})->name('store');

// Página de checkout protegida
Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', function () {
        return view('checkout');
    })->name('checkout');

    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');
});

// Rotas protegidas (Autenticadas e Administrativas)
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::post('/admin/storePreviousGame', [AdminController::class, 'storePreviousGame'])->name('admin.store.previousGames');
    Route::post('/admin/storeNews', [AdminController::class, 'storeNews'])->name('admin.news.store'); // Certifique-se de que esta rota está definida corretamente
    Route::get('/admin/previous-games', [AdminController::class, 'showPreviousGames'])->name('admin.previousGames');
    Route::delete('/admin/previous-games/{id}', [AdminController::class, 'deletePreviousGame'])->name('admin.previousGames.delete');
    Route::post('/admin/storeNews', [AdminController::class, 'storeNews'])->name('admin.news.store');
    Route::delete('/admin/news/{id}', [AdminController::class, 'deleteNews'])->name('admin.news.delete');
});
 // Rota para promover usuários a admin
    Route::post('/admin/promote/{id}', [AdminController::class, 'promoteToAdmin'])->name('admin.promote');
  
    Route::get('/about', [AdminController::class, 'about'])->name('about');
// Registro e Login
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');

// Logout
Route::post('/logout', function () {
    Auth::logout(); // Faz o logout do usuário
    request()->session()->invalidate(); // Invalida a sessão
    request()->session()->regenerateToken(); // Regenera o token CSRF
    return redirect()->route('index'); // Redireciona para a página inicial
})->name('logout');

//comments
Route::middleware('auth')->group(function () {
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
});

Route::get('/comments', [CommentController::class, 'index']);


// Rotas para os jogos
Route::post('/games', [GameController::class, 'store']);
Route::get('/games', [GameController::class, 'index']);

// Rotas para os tickets
Route::post('/tickets', [TicketController::class, 'store']);
Route::get('/tickets', [TicketController::class, 'index']);

// Rotas para as faturas
Route::post('/faturas', [FaturaController::class, 'store']);
Route::get('/faturas', [FaturaController::class, 'index']);

// Rota para exibir o formulário de adição de produtos
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

// Rota para salvar o produto no banco de dados
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// Rota para listar os produtos
Route::get('/products', [ProductController::class, 'index'])->name('products.index');