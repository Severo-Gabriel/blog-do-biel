<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página inicial</title>
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #8e2de2, #4a00e0);
            height: 100vh;
            display: flex;
        }

        /* === SIDEBAR === */
        .sidebar {
            width: 250px;
            background-color: rgba(20, 20, 40, 0.9);
            color: #fff;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            margin: 8px 0;
            padding: 10px;
            border-radius: 8px;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background-color: rgba(255, 255, 255, 0.15);
        }

        /* === CONTEÚDO === */
        .content {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-align: center;
        }

        .logout-btn {
            margin-top: 20px;
            background: linear-gradient(90deg, #ff00cc, #3333ff);
            border: none;
            padding: 12px 60px;
            color: white;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }

        .logout-btn:hover {
            transform: scale(1.05);
        }

        img {
            border-radius: 10px;
            max-width: 250px;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h2>Menu</h2>
       
    </div>

    <!-- === CONTEÚDO PRINCIPAL === -->
    <div class="content">
        <h1>Bem-vindo, {{ Auth::user()->name }}!</h1>
        <p>Você está logado com o e-mail: {{ Auth::user()->email }}</p>
        <p>Aqui você terá acesso a todos os conteúdos estudados pelo Gabiru.</p>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">SAIR</button>
        </form>
    </div>

</body>
</html>