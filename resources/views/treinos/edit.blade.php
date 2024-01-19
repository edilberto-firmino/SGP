@extends('layouts.dashboard')

@section('content')

    <h1>Editar Treino</h1>

    <form action="{{ route('treinos.update', $treino->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="data">Data:</label>
            <input type="date" class="form-control" name="data" value="{{ $treino->data }}" required>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <input type="text" class="form-control" name="descricao" value="{{ $treino->descricao }}" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Atualizar Treino</button>
        <a href="{{ route('treinos.index') }}" class="btn btn-info">Voltar</a>
    </form>

@endsection
