<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;

Route::post('save', [PhotoController::class, 'store'])->name('upload.picture');

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

Route::get('/admin', function () {
    return view('admin');
})->name('admin');

Route::get('/profile', function () {
    return view('profile');
})->name('profile')->middleware('auth'); 


Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');



use App\Http\Controllers\Auth\RegisterController;
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

use App\Http\Controllers\Auth\LoginController;
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');


use Illuminate\Support\Facades\Auth;
Route::post('/logout', function () {
    Auth::logout(); // Faz o logout do usuário
    request()->session()->invalidate(); // Invalida a sessão
    request()->session()->regenerateToken(); // Regenera o token CSRF
    return redirect()->route('index'); // Redireciona para a página inicial
})->name('logout');