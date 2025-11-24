<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes da Categoria</title>
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #8e2de2, #4a00e0);
            min-height: 100vh;
            display: flex;
        }

        .sidebar {
            width: 250px;
            background-color: rgba(20, 20, 40, 0.9);
            color: #fff;
            display: flex;
            flex-direction: column;
            padding: 20px;
            min-height: 100vh;
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

        .content {
            flex: 1;
            padding: 40px;
            color: #fff;
        }

        .header {
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .header-text h1 {
            margin: 0 0 10px 0;
            font-size: 2rem;
        }

        .breadcrumb {
            opacity: 0.7;
            font-size: 0.9rem;
        }

        .breadcrumb a {
            color: #fff;
            text-decoration: none;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 30px;
            backdrop-filter: blur(10px);
            max-width: 800px;
        }

        .detail-group {
            margin-bottom: 25px;
            padding-bottom: 25px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .detail-group:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .detail-label {
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            opacity: 0.7;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .detail-value {
            font-size: 1.1rem;
            line-height: 1.6;
        }

        .detail-value.empty {
            opacity: 0.5;
            font-style: italic;
        }

        .slug-badge {
            background-color: rgba(255, 255, 255, 0.15);
            padding: 6px 12px;
            border-radius: 6px;
            display: inline-block;
            font-family: 'Courier New', monospace;
            font-size: 0.95rem;
        }

        .metadata {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 30px;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .metadata-item {
            background-color: rgba(255, 255, 255, 0.05);
            padding: 15px;
            border-radius: 8px;
        }

        .metadata-label {
            font-size: 0.8rem;
            opacity: 0.7;
            margin-bottom: 5px;
        }

        .metadata-value {
            font-size: 1rem;
            font-weight: 500;
        }

        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            text-decoration: none;
            display: inline-block;
            font-size: 0.95rem;
        }

        .btn-primary {
            background: linear-gradient(90deg, #ff00cc, #3333ff);
            color: white;
        }

        .btn-primary:hover {
            transform: scale(1.05);
        }

        .btn-secondary {
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff;
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        .btn-secondary:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .btn-danger {
            background-color: rgba(255, 71, 87, 0.3);
            color: #fff;
            border: 2px solid rgba(255, 71, 87, 0.5);
        }

        .btn-danger:hover {
            background-color: rgba(255, 71, 87, 0.5);
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h2>Menu</h2>
    <a href="{{ route('dashboard') }}">Dashboard</a>
    <a href="{{ route('admin.status.index') }}" style="background-color: rgba(255, 255, 255, 0.15);">Status</a>
</div>

<div class="content">
    <div class="header">
        <div class="header-text">
            <h1>Detalhes do status</h1>
            <div class="breadcrumb">
                <a href="{{ route('dashboard') }}">Dashboard</a> /
                <a href="{{ route('admin.status.index') }}">Status</a> /
                {{ $status->name }}
            </div>
        </div>
        <div class="actions">
            <a href="{{ route('admin.status.edit', $status) }}" class="btn btn-primary">✏️ Editar</a>
            <form action="{{ route('admin.status.destroy', $status) }}" method="POST" style="display: inline;" onsubmit="return confirm('Tem certeza que deseja excluir este status?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">🗑️ Excluir</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="detail-group">
            <div class="detail-label">Nome do status</div>
            <div class="detail-value">{{ $status->name }}</div>
        </div>

        <div class="detail-group">
            <div class="detail-label">Descrição</div>
            <div class="detail-value {{ empty($status->description) ? 'empty' : '' }}">
                {{ $status->description ?? 'Nenhuma descrição fornecida.' }}
            </div>
        </div>

        <div class="metadata">
            <div class="metadata-item">
                <div class="metadata-label">ID</div>
                <div class="metadata-value">#{{ $status->id }}</div>
            </div>
            <div class="metadata-item">
                <div class="metadata-label">Criada em</div>
                <div class="metadata-value">{{ $status->created_at->format('d/m/Y H:i') }}</div>
            </div>
            <div class="metadata-item">
                <div class="metadata-label">Última atualização</div>
                <div class="metadata-value">{{ $status->updated_at->format('d/m/Y H:i') }}</div>
            </div>
        </div>

        <div style="margin-top: 30px;">
            <a href="{{ route('admin.status.index') }}" class="btn btn-secondary">← Voltar para Lista</a>
        </div>
    </div>
</div>

</body>
</html>
