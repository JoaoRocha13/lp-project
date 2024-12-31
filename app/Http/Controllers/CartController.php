<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Game; // Certifique-se de importar o modelo Game

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $cart = session()->get('cart', []);
        
        // Verificar se é produto ou bilhete
        if ($request->has('product_id')) {
            $productId = $request->input('product_id');
            $product = Product::find($productId);

            if (!$product) {
                return response()->json(['error' => 'Produto não encontrado.'], 404);
            }

            $itemKey = 'product_' . $productId;
            if (isset($cart[$itemKey])) {
                $cart[$itemKey]['quantity'] += 1;
            } else {
                $cart[$itemKey] = [
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => 1,
                    'image' => $product->image,
                ];
            }
        } elseif ($request->has('game_id')) {
            $gameId = $request->input('game_id');
            $game = Game::find($gameId);

            if (!$game) {
                return response()->json(['error' => 'Bilhete não encontrado.'], 404);
            }

            $itemKey = 'game_' . $gameId;
            if (isset($cart[$itemKey])) {
                $cart[$itemKey]['quantity'] += 1;
            } else {
                $cart[$itemKey] = [
                    'name' => $game->team_a . ' vs ' . $game->team_b,
                    'price' => $request->input('ticket_price', $game->ticket_price),
                    'quantity' => 1,
                    'game_date' => $game->game_date,
                ];
            }
        } else {
            return response()->json(['error' => 'Nenhum item válido especificado.'], 400);
        }

        session()->put('cart', $cart);

        return response()->json(['success' => 'Item adicionado ao carrinho.', 'cart' => $cart]);
    }

    public function updateCart(Request $request)
    {
        $cart = session()->get('cart', []);
        $itemKey = $request->input('item_key');
        $quantity = $request->input('quantity');

        if (isset($cart[$itemKey])) {
            $cart[$itemKey]['quantity'] = $quantity;

            if ($cart[$itemKey]['quantity'] <= 0) {
                unset($cart[$itemKey]);
            }

            session()->put('cart', $cart);
        }

        return response()->json(['success' => 'Carrinho atualizado.', 'cart' => $cart]);
    }

    public function removeFromCart(Request $request)
    {
        $cart = session()->get('cart', []);
        $itemKey = $request->input('item_key');

        if (isset($cart[$itemKey])) {
            unset($cart[$itemKey]);
            session()->put('cart', $cart);
        }

        return response()->json(['success' => 'Item removido do carrinho.', 'cart' => $cart]);
    }

    public function getCart()
    {
        $cart = session()->get('cart', []);
        return view('checkout', compact('cart'));
    }
}
