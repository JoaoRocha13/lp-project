<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return redirect()->route('admin');
    }

    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048' // Validação da imagem
            
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
    public function destroy($id)
{
    $product = Product::findOrFail($id);
    $product->delete();
    return redirect()->route('admin')->with('success', 'Product removed successfully!');
}
}
