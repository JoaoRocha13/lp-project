<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FaturaController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\Auth\ResetPasswordController;





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

Route::get('/home', function () {
    return view('home');
})->name('home');

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
    Route::post('/admin/previous-games', [AdminController::class, 'storePreviousGame'])->name('admin.previousGames.store');
    Route::get('/admin/previous-games', [AdminController::class, 'showPreviousGames'])->name('admin.previousGames');
    Route::delete('/admin/previous-games/{id}', [AdminController::class, 'deletePreviousGame'])->name('admin.previousGames.delete');
    Route::post('/admin/storeNews', [AdminController::class, 'storeNews'])->name('admin.news.store'); 
    Route::delete('/admin/news/{id}', [AdminController::class, 'deleteNews'])->name('admin.news.delete');
    Route::get('/admin/products', [AdminController::class, 'index'])->name('admin.products.index');
    Route::post('/admin/products', [AdminController::class, 'storeProduct'])->name('admin.products.store');
    Route::delete('/admin/products/{id}', [AdminController::class, 'destroy'])->name('admin.products.delete');
    Route::get('/admin/games', [AdminController::class, 'index'])->name('admin.games.index');
    Route::post('/admin/games', [AdminController::class, 'AddNewGame'])->name('admin.games.store');
    Route::delete('/admin/games/{id}', [AdminController::class, 'deleteGame'])->name('admin.games.delete');

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
    return redirect()->route('home'); // Redireciona para a página inicial
})->name('logout');

//comments
Route::middleware('auth')->group(function () {
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
});

// Route para a home com comentários
Route::get('/home', [CommentController::class, 'index'])->name('home');




Route::get('/store', [AdminController::class, 'showStore'])->name('store');

Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/checkout', [CartController::class, 'getCart'])->name('checkout');
Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
// Rotas para as faturas
Route::post('/faturas', [FaturaController::class, 'store']);
Route::get('/faturas', [FaturaController::class, 'index']);

Route::get('stripe/checkout', [StripeController::class, 'checkoutForm'])->name('checkout.form');
Route::post('stripe/checkout/process', [StripeController::class, 'processPayment'])->name('checkout.process');


// Rota para processar o link de verificação
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill(); // Marca o email como verificado
    return redirect()->route('home')->with('success', 'Email verificado com sucesso!');
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

//Rota para faturas
Route::get('/admin/faturas', [AdminController::class, 'showFaturas'])->name('admin.faturas');   



// Exibir formulário para solicitar link de redefinição
Route::get('/password/reset', [ResetPasswordController::class, 'showLinkRequestForm'])->name('password.request');

// Enviar o link de redefinição
Route::post('/password/email', [ResetPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Exibir formulário para redefinir senha (com token)
Route::get('/password/reset/{token}', function ($token) {
    return view('reset', ['token' => $token]);
})->name('password.reset');



// Processar a redefinição de senha
Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');





