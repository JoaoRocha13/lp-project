<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('email'); // Mostra o formulário para solicitar o link
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            Log::info('Link de redefinição enviado com sucesso.', ['email' => $request->email]);
            return back()->with('status', 'Link de redefinição enviado para o email informado.');
        } else {
            Log::error('Erro ao enviar link de redefinição.', ['email' => $request->email, 'status' => $status]);
            return back()->withErrors(['email' => __($status)]);
        }
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
            'token' => 'required',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => bcrypt($password), // Garante que a senha está hasheada
                ])->save();

                // Adiciona um log para verificar o hash da senha
                Log::info('Senha redefinida com sucesso.', [
                    'user' => $user->name,
                    'email' => $user->email,
                    'hashed_password' => $user->password,
                ]);

                $user->setRememberToken(Str::random(60));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            Log::info('Processo de redefinição concluído com sucesso.', ['email' => $request->email]);
            return redirect()->route('login')->with('success', 'Senha redefinida com sucesso!');
        } else {
            Log::error('Erro ao redefinir senha.', ['email' => $request->email, 'status' => $status]);
            return back()->withErrors(['email' => [__($status)]]);
        }
    }
}
