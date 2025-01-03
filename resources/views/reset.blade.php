<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinição de Senha</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="login-page">
    <main>
        <img src="{{ asset('images/icon.png') }}" alt="Icon Left" class="icon-left">
        <img src="{{ asset('images/icon.png') }}" alt="Icon Right" class="icon-right">

        <h2>Redefinição de Senha</h2>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ request()->route('token') }}">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ request()->email }}" required>

            <label for="password">Nova Senha:</label>
            <input type="password" name="password" id="password" required>

            <label for="password_confirmation">Confirme a Senha:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>

            <button type="submit">Redefinir Senha</button>
        </form>

        <div class="footer-text mt-3">
            <a href="{{ route('login') }}">Voltar ao Login</a>
        </div>
    </main>
</body>
</html>
