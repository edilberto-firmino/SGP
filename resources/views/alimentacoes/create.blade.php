@extends('layouts.dashboard')

@section('content')

    <h2 class="mb-4">Criar Nova Alimentação</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('alimentacoes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="data">Data:</label>
            <input type="date" class="form-control" name="data" required>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <input type="text" class="form-control" name="descricao" required>
        </div>

        <div class="form-group">
            <label for="calorias">Calorias:</label>
            <input type="text" class="form-control" name="calorias" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Alimentação</button>
        <a href="{{ route('alimentacoes.index') }}" class="btn btn-info">Voltar</a>
    </form>

@endsection
