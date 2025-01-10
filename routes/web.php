<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FaturaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\StripeController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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

Route::get('/home', [CommentController::class, 'index'])->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/store', function () {
    return view('store');
})->name('store');

// Rotas de autenticação
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('home');
})->name('logout');

// Verificação de E-mail
Route::get('/email/verify', function () {
    return view('registo');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()->route('home')->with('success', 'Email verificado com sucesso!');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/resend', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Email de verificação reenviado!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Redefinição de Senha
Route::get('/password/reset', [ResetPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [ResetPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', function ($token) {
    return view('reset', ['token' => $token]);
})->name('password.reset');
Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// Rotas protegidas (Usuários autenticados)
Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [CartController::class, 'getCart'])->name('checkout');
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');

    Route::post('/profile/photo/update', [ProfileController::class, 'updatePhoto'])->name('profile.photo.update');
    Route::post('/profile/update_picture', [ProfileController::class, 'updatePicture'])->name('profile.update_picture');

    // Comentários
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

    // Carrinho
    Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
});

// Rotas administrativas (Apenas Administradores)
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');

    // Gestão de Jogos
    Route::get('/admin/games', [AdminController::class, 'index'])->name('admin.games.index');
    Route::post('/admin/games', [AdminController::class, 'AddNewGame'])->name('admin.games.store');
    Route::delete('/admin/games/{id}', [AdminController::class, 'deleteGame'])->name('admin.games.delete');

    // Jogos anteriores
    Route::get('/admin/previous-games', [AdminController::class, 'showPreviousGames'])->name('admin.previousGames');
    Route::post('/admin/previous-games', [AdminController::class, 'storePreviousGame'])->name('admin.previousGames.store');
    Route::delete('/admin/previous-games/{id}', [AdminController::class, 'deletePreviousGame'])->name('admin.previousGames.delete');

    // Notícias
    Route::post('/admin/storeNews', [AdminController::class, 'storeNews'])->name('admin.news.store');
    Route::delete('/admin/news/{id}', [AdminController::class, 'deleteNews'])->name('admin.news.delete');

    // Produtos
    Route::get('/admin/products', [AdminController::class, 'index'])->name('admin.products.index');
    Route::post('/admin/products', [AdminController::class, 'storeProduct'])->name('admin.products.store');
    Route::delete('/admin/products/{id}', [AdminController::class, 'destroy'])->name('admin.products.delete');

    // Promoção de Usuários
    Route::post('/admin/promote/{id}', [AdminController::class, 'promoteToAdmin'])->name('admin.promote');

    // Faturas
    Route::get('/admin/faturas', [AdminController::class, 'showFaturas'])->name('admin.faturas');
});

// Rotas de Faturas
Route::post('/faturas', [FaturaController::class, 'store']);
Route::get('/faturas', [FaturaController::class, 'index']);

// Integração Stripe
Route::get('stripe/checkout', [StripeController::class, 'checkoutForm'])->name('checkout.form');
Route::post('stripe/checkout/process', [StripeController::class, 'processPayment'])->name('checkout.process');
