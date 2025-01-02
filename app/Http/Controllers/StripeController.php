<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Stripe;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Fatura;

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
    Log::info('Caminho do arquivo .env carregado', ['path' => base_path('.env')]);
    Log::info('Método processPayment iniciado', ['request_data' => $request->all()]);

    try {
        Log::info('Iniciando validação do request.');

        // Decodifica o campo `cart` caso ele esteja em formato JSON
        if (is_string($request->input('cart'))) {
            $decodedCart = json_decode($request->input('cart'), true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \Exception('Erro ao decodificar o campo cart: ' . json_last_error_msg());
            }

            // Atualiza o request com o array decodificado
            $request->merge(['cart' => $decodedCart]);
        }

        // Validação dos dados
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'stripeToken' => 'required',
            'cart' => 'required|array',
        ]);

        Log::info('Validação do request concluída.');

        // Configura a chave secreta do Stripe
        \Stripe\Stripe::setApiKey('sk_test_51QbkK2KGPJ3qpAMTrFQJ8gaPVCtjA2r4ifhjE8k1KhWJgfOVd2npQ68pW6KUWGvJW1454sGcxamIrWr6euev9M9L00eYo4xdeY');
        Log::info('Chave secreta do Stripe configurada.');

        // Converte o valor para centavos
        $amountInCents = (int) ($request->input('amount') * 100);
        Log::info('Valor convertido para centavos.', ['amount_in_cents' => $amountInCents]);

        // Criação da cobrança
        Log::info('Tentando criar cobrança...', [
            'amount' => $amountInCents,
            'source' => $request->input('stripeToken'),
        ]);

        $charge = \Stripe\Charge::create([
            'amount' => $amountInCents,
            'currency' => 'eur',
            'description' => 'Pagamento para ' . $request->input('fullName'),
            'source' => $request->input('stripeToken'),
        ]);

        Log::info('Cobrança criada com sucesso.', ['charge' => $charge]);

        // Salvar fatura na base de dados
        Fatura::create([
            'user_id' => auth()->id(),
            'nome' => auth()->user()->name,
            'codigo_postal' => $request->input('codigo_postal'),
            'localidade' => $request->input('localidade'),
            'telefone' => $request->input('telefone'),
            'itens' => json_encode($request->input('cart')),
            'total' => $request->input('amount'),
        ]);

        Log::info('Fatura salva com sucesso.');

        $pdf = Pdf::loadView('fatura', [
            'user' => auth()->user(),
            'cart' => $request->input('cart'),
            'total' => $request->input('amount'),
            'charge' => $charge,
            'telefone' => $request->input('telefone'),
            'localidade' => $request->input('localidade'),
            'codigo_postal' => $request->input('codigo_postal'),
        ]);
        

        // Salvar o PDF no servidor (opcional, para referência futura)
        return $pdf->stream('fatura.pdf');
        
        

        // Retornar mensagem de sucesso e oferecer o download
        session()->flash('success', 'Pagamento realizado com sucesso! Sua fatura foi gerada.');
        return $pdf->download('fatura_' . $charge->id . '.pdf');

        // Redireciona com mensagem de sucesso
        return redirect()->back()->with('success', 'Pagamento realizado com sucesso!');
    } catch (\Illuminate\Validation\ValidationException $e) {
        Log::error('Erro de validação.', ['error' => $e->errors()]);
        return redirect()->back()->withErrors($e->errors());
    } catch (\Stripe\Exception\CardException $e) {
        Log::error('Erro de cartão ao criar cobrança.', ['error' => $e->getMessage()]);
        return redirect()->back()->with('error', 'Erro no pagamento: ' . $e->getMessage());
    } catch (\Exception $e) {
        Log::error('Erro geral ao criar cobrança.', ['error' => $e->getMessage()]);
        return redirect()->back()->with('error', 'Erro ao processar pagamento: ' . $e->getMessage());
    }
} 

}