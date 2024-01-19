@extends('layouts.dashboard')

@section('content')
    <h2 class="mb-4">Cadastro de Gastos</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('gastos.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <input type="text" class="form-control" id="descricao" name="descricao" required>
        </div>

        <div class="form-group">
            <label for="data">Data:</label>
            <input type="date" class="form-control" id="data" name="data" required>
        </div>

        <div class="form-group">
            <label for="valor">Valor:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">R$</span>
                </div>
                <input type="number" class="form-control" id="valor" name="valor" step="0.01" required>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar Gasto</button>
    </form>
@endsection
