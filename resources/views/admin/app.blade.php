<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'GabDev') - Blog de estudos</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #8e2de2, #4a00e0);
            min-height: 100vh;
            display: flex;
        }

        .sidebar {
            width: 280px;
            background-color: rgba(20, 20, 40, 0.95);
            color: #fff;
            display: flex;
            flex-direction: column;
            padding: 30px 20px;
            backdrop-filter: blur(10px);
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.2);
            position: sticky;
            top: 0;
            height: 100vh;
        }

        .sidebar-header {
            text-align: center;
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-header h2 {
            font-size: 1.5rem;
            background: linear-gradient(90deg, #ff00cc, #3333ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .sidebar-header p {
            font-size: 0.8rem;
            opacity: 0.6;
            margin-top: 5px;
        }

        .nav-section {
            margin-bottom: 30px;
        }

        .nav-section-title {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            opacity: 0.5;
            margin-bottom: 10px;
            padding-left: 10px;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            margin: 4px 0;
            padding: 12px 16px;
            border-radius: 10px;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 0.95rem;
        }

        .sidebar a:hover {
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateX(5px);
        }

        .sidebar a.active {
            background: linear-gradient(90deg, rgba(255, 0, 204, 0.3), rgba(51, 51, 255, 0.3));
            border-left: 3px solid #ff00cc;
        }

        .sidebar-footer {
            margin-top: auto;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px;
            background-color: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #ff00cc, #3333ff);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.2rem;
        }

        .user-details {
            flex: 1;
            overflow: hidden;
        }

        .user-name {
            font-weight: 600;
            font-size: 0.9rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .user-email {
            font-size: 0.75rem;
            opacity: 0.6;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .main-content {
            flex: 1;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .content {
            flex: 1;
            padding: 40px;
            overflow-y: auto;
            color: #fff;
        }

        .alert {
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .alert-success {
            background-color: rgba(46, 213, 115, 0.2);
            border: 1px solid rgba(46, 213, 115, 0.5);
            color: #2ed573;
        }

        .alert-error {
            background-color: rgba(255, 71, 87, 0.2);
            border: 1px solid rgba(255, 71, 87, 0.5);
            color: #ff4757;
        }

        .alert-info {
            background-color: rgba(52, 152, 219, 0.2);
            border: 1px solid rgba(52, 152, 219, 0.5);
            color: #3498db;
        }

        .alert-warning {
            background-color: rgba(255, 193, 7, 0.2);
            border: 1px solid rgba(255, 193, 7, 0.5);
            color: #ffc107;
        }

        /* Botão de logout */
        .logout-btn {
            width: 100%;
            background-color: rgba(255, 71, 87, 0.2);
            border: 1px solid rgba(255, 71, 87, 0.5);
            color: #ff4757;
            padding: 10px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .logout-btn:hover {
            background-color: rgba(255, 71, 87, 0.3);
            transform: scale(1.02);
        }
        .form-input {
        width: 100%;
        padding: 14px 16px;
        background: rgba(255, 255, 255, 0.15);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 8px;
        color: #fff;
        font-size: 16px;
        outline: none;
        margin-bottom: 16px;
        }

        .form-input::placeholder {
        color: rgba(255, 255, 255, 0.6);    
        }

        .form-input[type="date"] {
        color-scheme: dark;
        }

        .form-input[type="date"]::-webkit-datetime-edit {
        color: rgba(255, 255, 255, 0.9);
        }

        .form-input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(1);
            .form-group select,
        .form-group select[multiple] {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            background: rgba(255, 255, 255, 0.15);
            color: #fff;
            font-size: 14px;
            outline: none;
        }

        /* placeholder do select */
        .form-group select option {
            color: #000;
        }

        /* altura do select múltiplo */
        .form-group select[multiple] {
            min-height: 120px;
        }
        select[multiple].form-control {
        min-height: 120px;
        }
        }
    </style>
    @stack('styles')
</head>
<body>
    @auth
    <div class="sidebar">
        <div class="sidebar-header">
            <h2>🎓 GabDev</h2>
            <p>Blog de Estudos</p>
        </div>

        <div class="nav-section">
            <div class="nav-section-title">Menu Principal</div>

            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <span>📊</span>
                <span>Dashboard</span>
            </a>
            
             <a href="{{ route('admin.posts.index') }}" class="{{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">
                <span>📩</span>
                <span>Post's</span>
            </a>

            <a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                <span>📁</span>
                <span>Categorias</span>
            </a>

            <a href="{{ route('admin.tags.index') }}" class="{{ request()->routeIs('admin.tags.*') ? 'active' : '' }}">
                <span>🏷️</span>
                <span>Tags</span>
            </a>
            <a href="{{ route('admin.status.index') }}" class="{{ request()->routeIs('admin.status.*') ? 'active' : '' }}">
                <span>📃</span>
                <span>Status</span>
            </a>
             </a>
            <a href="{{ route('admin.authors.index') }}" class="{{ request()->routeIs('admin.authors.*') ? 'active' : '' }}">
                <span>🧑‍💼</span>
                <span>Autor</span>
            </a>

        </div>

        <div class="sidebar-footer">
            <div class="user-info">
                <div class="user-avatar">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div class="user-details">
                    <div class="user-name">{{ Auth::user()->name }}</div>
                    <div class="user-email">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">
                    🚪 Sair
                </button>
            </form>
        </div>
    </div>
    @endauth


    <div class="main-content">
        <div class="content">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('info'))
                <div class="alert alert-info">
                    {{ session('info') }}
                </div>
            @endif

            @if(session('warning'))
                <div class="alert alert-warning">
                    {{ session('warning') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-error">
                    <strong>Ops!</strong> Existem erros no formulário.
                    <ul style="margin-top: 10px; padding-left: 20px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    @stack('scripts')
</body>
</html>