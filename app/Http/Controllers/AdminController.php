<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Certifique-se de que o arquivo admin.blade.php existe em resources/views
        return view('admin');
    }
}
