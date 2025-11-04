<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Bem-vindo, {{ Auth::user()->name }}!</h1>
        <p>Você está logado com o e-mail: {{ Auth::user()->email }}</p>

        <a href="{{ route('logout') }}">Sair</a>
    </div>
</body>
</html>