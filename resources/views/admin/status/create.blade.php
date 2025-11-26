@extends('admin.app')

@section('title', 'Criar Status')

@push('styles')
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
        }

        .header h1 {
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

        .form-container {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 30px;
            backdrop-filter: blur(10px);
            max-width: 600px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            font-size: 0.95rem;
        }

        .required {
            color: #ff4757;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff;
            font-size: 1rem;
            font-family: 'Poppins', sans-serif;
            transition: 0.3s;
            box-sizing: border-box;
        }

        input[type="text"]:focus,
        textarea:focus {
            outline: none;
            border-color: rgba(255, 255, 255, 0.5);
            background-color: rgba(255, 255, 255, 0.15);
        }

        input[type="text"]::placeholder,
        textarea::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        textarea {
            resize: vertical;
            min-height: 120px;
        }

        .error {
            color: #ff4757;
            font-size: 0.85rem;
            margin-top: 5px;
            display: block;
        }

        .input-error {
            border-color: #ff4757;
        }

        .form-actions {
            display: flex;
            gap: 15px;
            margin-top: 30px;
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
            font-size: 1rem;
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
    </style>
@endpush

@section('content')
<div class="content">
    <div class="header">
        <h1>Novo Status</h1>
        <div class="breadcrumb">
            <a href="{{ route('dashboard') }}">Dashboard</a> /
            <a href="{{ route('admin.status.index') }}">Status</a> /
            <a href="{{ route('admin.status.create') }}">Criar</a> /
     
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-error">
            <strong>Ops!</strong> Existem erros no formulário.
        </div>
    @endif

    <div class="form-container">
        <form action="{{ route('admin.status.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">
                    Nome <span class="required">*</span>
                </label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Ex: Novo, Antigo..."
                    class="{{ $errors->has('name') ? 'input-error' : '' }}"
                    required
                >
                @error('name')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">
                    Descrição
                </label>
                <textarea
                    id="description"
                    name="description"
                    placeholder="Descreva sobre o status..."
                    class="{{ $errors->has('description') ? 'input-error' : '' }}"
                >{{ old('description') }}</textarea>
                @error('description')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Salvar Status</button>
                <a href="{{ route('admin.status.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection