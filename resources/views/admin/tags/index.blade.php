@extends('admin.app')

@section('title', 'Tags')

@push('styles')
    <style>
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .header h1 {
            margin: 0;
            font-size: 2rem;
        }

        .table-container {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 20px;
            backdrop-filter: blur(10px);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background-color: rgba(255, 255, 255, 0.1);
        }

        th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
            border-bottom: 2px solid rgba(255, 255, 255, 0.2);
        }

        td {
            padding: 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        tbody tr {
            transition: 0.2s;
        }

        tbody tr:hover {
            background-color: rgba(255, 255, 255, 0.05);
        }

        td a:hover {
            text-decoration: underline;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            opacity: 0.7;
        }

        .empty-state p {
            font-size: 1.1rem;
            margin: 10px 0;
        }

        .btn {
            background: linear-gradient(90deg, #ff00cc, #3333ff);
            border: none;
            padding: 12px 24px;
            color: white;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .btn:hover {
            transform: scale(1.05);
        }

        .btn-action {
            background: none;
            border: none;
            font-size: 1.2rem;
            cursor: pointer;
            margin: 0 5px;
            transition: 0.2s;
            padding: 5px;
        }

        .btn-action:hover {
            transform: scale(1.2);
        }

        .pagination-wrapper {
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .pagination-info {
            text-align: center;
            font-size: 0.85rem;
            opacity: 0.7;
            margin-bottom: 15px;
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 5px;
        }

        .page-link {
            min-width: 36px;
            height: 36px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0 12px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 6px;
            color: #fff;
            text-decoration: none;
            transition: all 0.2s;
            font-size: 0.95rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .page-link:hover:not(.disabled):not(.active) {
            background-color: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        .page-link.active {
            background: linear-gradient(90deg, #ff00cc, #3333ff);
            border-color: transparent;
            font-weight: 600;
        }

        .page-link.disabled {
            opacity: 0.3;
            cursor: not-allowed;
            background-color: rgba(255, 255, 255, 0.05);
        }
    </style>
@endpush

@section('content')
    <div class="header">
        <h1>Gerenciar lista de Tags</h1>
        <a href="{{ route('admin.tags.create') }}" class="btn">Nova Tag</a>
    </div>

    <div class="table-container">
        @if($tags->isEmpty())
            <div class="empty-state">
                <p>📃</p>
                <p>Nenhuma Tag Criada.</p>
                <p style="font-size: 0.9rem; opacity: 0.7;">Clique em "Nova Tag" para começar.</p>
            </div>
        @else
            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Slug</th>
                    <th>Data de Criação</th>
                    <th style="text-align: center; width: 200px;">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td>
                            <a href="{{ route('admin.tags.show', $tags) }}" style="color: #fff; text-decoration: none; font-weight: 500;">
                                {{ $tag->name }}
                            </a>
                        </td>
                        <td>{{ $tag->slug ?? '-' }}</td>
                        <td>{{ $tag->created_at->format('d/m/Y H:i') }}</td>
                        <td style="text-align: center;">
                            <a href="{{ route('admin.tags.show', $tag) }}" class="btn-action" title="Visualizar">👁️</a>
                            <a href="{{ route('admin.tags.edit', $tag) }}" class="btn-action" title="Editar">✏️</a>
                            <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST" style="display: inline;" onsubmit="return confirm('Tem certeza que deseja excluir esta tag?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action" title="Excluir">🗑️</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            @if($tags->hasPages())
                <div class="pagination-wrapper">
                    <div class="pagination-info">
                        Mostrando {{ $categories->firstItem() }} a {{ $status->lastItem() }} de {{ $tag->total() }} resultados
                    </div>
                    <div class="pagination">
                        @if ($status->onFirstPage())
                            <span class="page-link disabled">‹</span>
                        @else
                            <a href="{{ $status->previousPageUrl() }}" class="page-link">‹</a>
                        @endif

                        @foreach ($tag->getUrlRange(1, $tag->lastPage()) as $page => $url)
                            @if ($page == $tag->currentPage())
                                <span class="page-link active">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                            @endif
                        @endforeach

                        @if ($tag->hasMorePages())
                            <a href="{{ $tag->nextPageUrl() }}" class="page-link">›</a>
                        @else
                            <span class="page-link disabled">›</span>
                        @endif
                    </div>
                </div>
            @endif
        @endif
    </div>
@endsection
