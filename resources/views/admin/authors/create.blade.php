@extends('admin.app')

@section('title','Criar Autor')

@push ('styles')

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
            input[type="email"],
            input[type="date"],
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
            input[type="email"]:focus,
            input[type="date"]:focus,
            textarea:focus {
                outline: none;
                border-color: rgba(255, 255, 255, 0.5);
                background-color: rgba(255, 255, 255, 0.15);
            }

            input[type="text"]::placeholder,
            input[type="email"]::placeholder,
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
        }

    </style>
@endpush                                                                                  

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h2>Novo Autor</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.authors.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Nome *</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email *</label>
                                <input 
                                    type="email" 
                                    class="form-control @error('email') is-invalid @enderror"
                                    id="email" 
                                    name="email" 
                                    value="{{ old('email') }}" 
                                    required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Telefone</label>
                                <input 
                                    type="text" 
                                    class="form-control @error('phone') is-invalid @enderror"
                                    id="phone" 
                                    name="phone" 
                                    value="{{ old('phone') }}" 
                                    placeholder="(00) 00000-0000">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="birth_date" class="form-label">Data de nascimento</label>
                            <input 
                                type="date" 
                                class="form-control @error('birth_date') is-invalid @enderror"
                                id="birth_date" 
                                name="birth_date" 
                                value="{{ old('birth_date') }}">
                            @error('birth_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="speciality" class="form-label">Especialidade</label>
                            <input type="text" class="form-control @error('speciality') is-invalid @enderror" 
                                   id="speciality" name="speciality" value="{{ old('speciality') }}" 
                                   placeholder="Ex: Tecnologia, Educação, Agronomia">
                            @error('speciality')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.authors.index') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Salvar Autor</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection