@extends('layouts.dashboard')

@section('content')

    <h2 class="mb-4">Editar Alimentação</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('alimentacoes.update', $alimentacao) }}" method="POST">
    @csrf
    @method('PUT')

        <div class="form-group">
            <label for="data">Data:</label>
            <input type="date" class="form-control" name="data" value="{{ $alimentacao->data }}" required>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <input type="text" class="form-control" name="descricao" value="{{ $alimentacao->descricao }}" required>
        </div>

        <div class="form-group">
            <label for="calorias">Calorias:</label>
            <input type="text" class="form-control" name="calorias" value="{{ $alimentacao->calorias }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar Alimentação</button>
    </form>

@endsection
