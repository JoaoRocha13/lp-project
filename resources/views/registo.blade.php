<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registo - Plataforma de Oportunidades</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="registration-page">
    <main>
        <!-- Left Icon -->
        <img src="{{ asset('storage/images/icon.png') }}" alt="Icon Left" class="icon-left">
        <!-- Right Icon -->
        <img src="{{ asset('storage/images/icon.png') }}" alt="Icon Right" class="icon-right">
        
        <h2>Registo</h2>
        
        <form action="/register" method="post">
            <label for="userType">Tipo de Utilizador:</label>
            <select id="userType" name="userType" required>
                <option value="cliente">Cliente</option>
                <option value="admin">Admin</option>
            </select>
        
            <label for="username">Nome de Utilizador:</label>
            <input type="text" id="username" name="username" required>
        
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        
            <label for="password">Palavra-Passe:</label>
            <input type="password" id="password" name="password" required>
        
            <button type="submit">Registar</button>
        </form>
        <div class="footer-text">
            Já tem uma conta? <a href="login">Faça login</a>
        </div>
    </main>
</body>
</html>