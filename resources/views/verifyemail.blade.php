<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificação de Email</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <h2>Verifique seu Email</h2>
        <p>Enviámos um link de verificação para o seu endereço de email. Verifique sua caixa de entrada e clique no link.</p>

        <!-- Botão para reenviar email -->
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit">Reenviar Email de Verificação</button>
        </form>

        <p>Já verificou o email? <a href="{{ route('home') }}">Ir para homepage</a></p>
    </div>
</body>
</html>
