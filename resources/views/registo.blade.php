<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registo</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="registration-page">
    <main>
        <!-- Left Icon -->
        <img src="{{ asset('images/icon.png') }}" alt="Icon Left" class="icon-left">
        <!-- Right Icon -->
        <img src="{{ asset('images/icon.png') }}" alt="Icon Right" class="icon-right">

        <h2>Registo</h2>
         
        <!-- Mensagem de Sucesso -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
                <p>Verifique a sua caixa de entrada e clique no link para verificar o email.</p>
                
                @auth
                <!-- Form para reenviar o email de verificação -->
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit">Reenviar Email de Verificação</button>
                </form>
                @endauth

            </div>
        @endif

        <!-- Mensagens de Erro -->
        @if ($errors->any() && !session('success'))
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(!session('success'))
        <form action="{{ route('register.store') }}" method="post">
            @csrf
            <label for="username">Nome de Utilizador:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Palavra-Passe:</label>
            <input type="password" id="password" name="password" required>
            
            <label for="password_confirmation">Confirmar Palavra-Passe:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
            
            <button type="submit">Registar</button>
        </form>
        @endif

        <div class="footer-text">
            Já tem uma conta? <a href="{{ route('login') }}">Faça login</a>
        </div>
    </main>
</body>
</html>
