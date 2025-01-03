<!-- Página de Login -->
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body class="login-page">
    <main>
       
        <img src="{{ asset('images/icon.png') }}" alt="Icon Left" class="icon-left">
        
        <img src="{{ asset('images/icon.png') }}" alt="Icon Right" class="icon-right">
        
        <h2>Login</h2>
        @if(session('success'))
    <p>{{ session('success') }}</p>
@endif

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
        <form action="{{ route('login') }}" method="post">
        @csrf
            <label for="loginUsername">Nome de Utilizador:</label>
            <input type="text" id="loginUsername" name="username" required>
            
            <label for="loginPassword">Palavra-Passe:</label>
            <input type="password" id="loginPassword" name="password" required>
            
            <button type="submit">Entrar</button>
        </form>
        
        <div class="footer-text">
            Não tem conta? <a href="{{ route('registo') }}">Registe-se</a>
        </div>
         <!-- Link para recuperação de senha -->
         <div class="footer-text mt-3">
            <a href="{{ route('password.request') }}">Esqueceu a sua senha?</a>
        </div>
        
        
    </main>
</body>
