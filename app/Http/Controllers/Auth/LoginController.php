<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        // Validação dos dados enviados
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Tentar autenticar o usuário
        if (Auth::attempt(['name' => $credentials['username'], 'password' => $credentials['password']])) {
            // Redirecionar para a página inicial após sucesso
            $request->session()->regenerate();
            return redirect()->intended('home')->with('success', 'Login realizado com sucesso!');
        }

        // Se falhar, retornar com mensagem de erro
        return back()->withErrors([
            'login' => 'Credenciais inválidas.',
        ]);
    }
}