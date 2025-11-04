<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Forms Login</title>
</head>
<body>
   <form method="POST" action="{{ route('login') }}">
    <h1>Blog BielDev</h1>
    <h2>Entre ou cadastre-se para ter acesso aos conteúdos do Blog.</h2>
    
    <label for="email">E-mail:</label>
    <input type="email" name="email" id="email">
    <br><br>
    <label for="senha">Senha:</label>
    <input type="password" name="senha" id="senha">
    <br>
    <input type="submit" value="Login">

   </form>
</body>
</html>
