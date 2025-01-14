<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    public function store(Request $request)
    {
        // Validação dos dados enviados
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Criar o usuário
        $user = User::create([
            'name' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'cliente', // Papel padrão para novos usuários
        ]);

         // Enviar o email de verificação
         $user->sendEmailVerificationNotification();
         
    // Autenticar o usuário, mas forçar a verificação
    Auth::login($user);

    return redirect()->route('verification.notice')
                     ->with('success', 'Por favor, verifique seu email.');
}
}
