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
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController;


// Upload de fotos
Route::post('/profile/photo/update', [ProfileController::class, 'updatePhoto'])->name('profile.photo.update');

//Foto de Perfil
Route::post('/profile/update_picture', [ProfileController::class, 'updatePicture'])->name('profile.update_picture');


// Páginas públicas
Route::get('/', function () {
    return view('login');
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
    Route::post('/admin/storeNews', [AdminController::class, 'storeNews'])->name('admin.news.store'); 
    Route::get('/admin/previous-games', [AdminController::class, 'showPreviousGames'])->name('admin.previousGames');
    Route::delete('/admin/previous-games/{id}', [AdminController::class, 'deletePreviousGame'])->name('admin.previousGames.delete');
    Route::delete('/admin/news/{id}', [AdminController::class, 'deleteNews'])->name('admin.news.delete');
    Route::get('/admin/products', [AdminController::class, 'showProducts'])->name('admin.products');
    Route::delete('/admin/products/{id}', [AdminController::class, 'destroy'])->name('admin.products.delete');
    Route::get('/admin/games', [AdminController::class, 'showGames'])->name('admin.games');

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

Route::get('/index', [CommentController::class, 'index'])->name('index');


// Rotas para os jogos
Route::get('/games', [GameController::class, 'index'])->name('games.index');
Route::post('/games', [GameController::class, 'store'])->name('games.store');

// Rotas para os tickets
Route::get('/tickets', [TicketController::class, 'index']);

// Rotas para as faturas
Route::post('/faturas', [FaturaController::class, 'store']);
Route::get('/faturas', [FaturaController::class, 'index']);

Route::post('/products', [AdminController::class, 'storeProduct'])->name('products.store');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');


// Rota para processar o link de verificação
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill(); // Marca o email como verificado
    return redirect()->route('index')->with('success', 'Email verificado com sucesso!');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Aviso para verificar email
Route::get('/email/verify', function () {
    return view('registo');
})->middleware('auth')->name('verification.notice');

// Reenviar o email de verificação
Route::post('/email/resend', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Email de verificação reenviado!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

//Fatura
Route::get('/fatura', function () {
    return view('fatura');
})->name('fatura');
