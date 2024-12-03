<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/registo', function () {
    return view('registo');
});
Route::get('/index', function () {
    return view('index');
});