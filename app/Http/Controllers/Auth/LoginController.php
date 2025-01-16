<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        // Validação dos dados enviados
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = \App\Models\User::where('name', $credentials['username'])->first();

        if (!$user) {
            Log::error('Usuário não encontrado', ['username' => $credentials['username']]);
            return back()->withErrors(['login' => 'Credenciais inválidas.']);
        }

     
        if (!Hash::check($credentials['password'], $user->password)) {
            Log::error('Senha incorreta', [
                'username' => $credentials['username'],
                'provided_password' => $credentials['password'],
                'stored_hash' => $user->password,
            ]);
            return back()->withErrors(['login' => 'Credenciais inválidas.']);
        }

     
        if (Auth::attempt(['name' => $credentials['username'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            Log::info('Login bem-sucedido', ['username' => $credentials['username']]);
            return redirect()->intended('home')->with('success', 'Login realizado com sucesso!');
        }

        
        Log::error('Falha no Auth::attempt', ['username' => $credentials['username']]);
        return back()->withErrors(['login' => 'Credenciais inválidas.']);
    }
}
