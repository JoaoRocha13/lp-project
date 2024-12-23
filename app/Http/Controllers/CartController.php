<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function addToCart(Request $request)
{
    
    $cart = session()->get('cart', []);
    $productId = $request->input('product_id');
    $product = Product::find($productId);

    if (!$product) {
        return response()->json(['error' => 'Product not found.'], 404);
    }

    if (isset($cart[$productId])) {
        $cart[$productId]['quantity'] += 1;
    } else {
        $cart[$productId] = [
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'image' => $product->image,
        ];
    }

    session()->put('cart', $cart);

    return response()->json(['success' => 'Product added to cart.', 'cart' => $cart]);
   
}
public function updateCart(Request $request)
{
    $cart = session()->get('cart', []);
    $productId = $request->input('product_id');
    $quantity = $request->input('quantity');

    if (isset($cart[$productId])) {
        $cart[$productId]['quantity'] = $quantity;

        // Remover o produto se a quantidade for 0
        if ($cart[$productId]['quantity'] <= 0) {
            unset($cart[$productId]);
        }

        session()->put('cart', $cart);
    }

    return response()->json(['success' => 'Cart updated.', 'cart' => $cart]);
}
public function removeFromCart(Request $request)
{
    $cart = session()->get('cart', []);
    $productId = $request->input('product_id');

    if (isset($cart[$productId])) {
        unset($cart[$productId]);
        session()->put('cart', $cart);
    }

    return response()->json(['success' => 'Produto removido do carrinho.', 'cart' => $cart]);
}
    
    public function getCart()
    {
        $cart = session()->get('cart', []);
        return view('checkout', compact('cart'));
    }
}
