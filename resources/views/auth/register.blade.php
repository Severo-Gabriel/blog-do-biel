<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Crie sua conta</h1>

        @if ($errors->any())
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <label for="name">Nome:</label>
            <input type="text" name="name" value="{{ old('name') }}" required>

            <label for="email">E-mail:</label>
            <input type="email" name="email" value="{{ old('email') }}" required>

            <label for="password">Senha:</label>
            <input type="password" name="password" required>

            <label for="password_confirmation">Confirme a senha:</label>
            <input type="password" name="password_confirmation" required>

            <button type="submit">Cadastrar</button>
        </form>

        <p>Já tem uma conta? <a href="{{ route('login') }}">Entrar</a></p>
    </div>
</body>
</html>