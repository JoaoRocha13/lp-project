<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Exibir o formulário de criação
    public function create()
    {
        return view('products.create'); // Certifique-se de criar a view products/create.blade.php
    }

    // Salvar o produto no banco de dados
    public function store(Request $request)
    {
        // Valida os dados recebidos
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        // Salva no banco de dados
        $product = Product::create($validated);

        // Redireciona ou exibe uma mensagem de sucesso
        return redirect()->route('products.index')->with('success', 'Product added successfully!');
    }

    // Listar produtos
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products')); // Certifique-se de criar a view products/index.blade.php
    }
}



?>