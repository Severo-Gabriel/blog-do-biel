@extends('admin.app')

@section('title', 'Dashboard')

@push('styles')
    <style>
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        .welcome-section h1 {
            font-size: 2rem;
            color: #fff;
            margin-bottom: 5px;
        }

        .welcome-section p {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.95rem;
        }

        .logout-btn {
            background: linear-gradient(90deg, #ff00cc, #3333ff);
            border: none;
            padding: 12px 30px;
            color: white;
            font-weight: 600;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 0.9rem;
            box-shadow: 0 4px 15px rgba(255, 0, 204, 0.3);
        }

        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 0, 204, 0.4);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 25px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .stat-icon.purple {
            background: linear-gradient(135deg, #8e2de2, #4a00e0);
        }

        .stat-icon.pink {
            background: linear-gradient(135deg, #ff00cc, #ff6b9d);
        }

        .stat-icon.blue {
            background: linear-gradient(135deg, #3333ff, #667eea);
        }

        .stat-label {
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.7);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 5px;
        }

        .stat-description {
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.6);
        }

        .quick-actions {
            margin-bottom: 40px;
        }

        .section-title {
            font-size: 1.3rem;
            color: #fff;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }

        .action-card {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            text-decoration: none;
            color: #fff;
            transition: all 0.3s;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .action-card:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-3px);
        }

        .action-icon {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .action-title {
            font-weight: 600;
            font-size: 0.95rem;
            margin-bottom: 5px;
        }

        .action-subtitle {
            font-size: 0.8rem;
            opacity: 0.7;
        }

        .info-banner {
            background: linear-gradient(135deg, rgba(255, 0, 204, 0.2), rgba(51, 51, 255, 0.2));
            border-radius: 16px;
            padding: 30px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .info-banner h3 {
            font-size: 1.5rem;
            color: #fff;
            margin-bottom: 10px;
        }

        .info-banner p {
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.6;
        }
    </style>
@endpush

@section('content')
    <div class="top-bar">
        <div class="welcome-section">
            <h1>Bem-vindo de volta, {{ explode(' ', Auth::user()->name)[0] }}! 👋</h1>
            <p>Aqui está um resumo das suas atividades</p>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">
                🚪 Sair
            </button>
        </form>
    </div>



    <div class="info-banner">
        <h3>🎯 Sistema de Estudos GabDev</h3>
        <p>
            Organize seus estudos de forma eficiente. Crie categorias, adicione materiais e acompanhe seu progresso.
            Transforme conhecimento em resultados!
        </p>
    </div>
@endsection
