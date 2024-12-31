<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Product;
use App\Models\Ticket;
use App\Models\Game;

class StripeController extends Controller
{
    /**
     * Mostra o formulário de checkout.
     */
    public function checkOutForm()
    {
        return view('checkout');
    }

    /**
     * Processa o pagamento com Stripe.
     */

     public function processPayment(Request $request)
{
    $request->validate([
        'amount' => 'required|numeric|min:1',
        'stripeToken' => 'required',
        'cart' => 'required|array',
    ]);

    // Configura a chave secreta do Stripe
    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    // Converte o valor para centavos
    $amountInCents = (int) ($request->input('amount') * 100);

    try {
        // Cria o pagamento no Stripe
        $charge = \Stripe\Charge::create([
            'amount' => $amountInCents,
            'currency' => 'eur',
            'description' => 'Pagamento de teste',
            'source' => $request->input('stripeToken'),
        ]);

        \Log::info('Charge criado com sucesso', ['charge_id' => $charge->id]);

        return redirect()->back()->with('success', 'Pagamento realizado com sucesso!');
    } catch (\Exception $e) {
        \Log::error('Erro ao criar Charge', ['error' => $e->getMessage()]);
        return redirect()->back()->with('error', 'Erro ao processar pagamento: ' . $e->getMessage());
    }
}


    public function test() {
        dd("funcção teste chamada");
    }
}
