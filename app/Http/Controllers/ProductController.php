<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Obtém todos os produtos
        return view('admin', compact('products'));
    }

    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:0'
        ]);

        // Inserção no banco
        try {
            Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock,
            ]);

            return redirect()->route('products.index');
        } catch (\Exception $e) {
            // Mostra o erro se algo falhar
            dd($e->getMessage());
        }
    }
}
