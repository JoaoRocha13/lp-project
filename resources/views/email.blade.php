<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperação de Senha</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="login-page">
    <main>
        <img src="{{ asset('images/icon.png') }}" alt="Icon Left" class="icon-left">
        
        <img src="{{ asset('images/icon.png') }}" alt="Icon Right" class="icon-right">
        
        <h2>Recuperação de Senha</h2>

        @if (session('status'))
            <p class="success-message">{{ session('status') }}</p>
        @endif

        @if ($errors->any())
            <ul class="error-list">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>

            <button type="submit">Enviar link de redefinição</button>
        </form>

        <div class="footer-text mt-3">
            <a href="{{ route('login') }}">Voltar para o login</a>
        </div>
    </main>
</body>
</html>