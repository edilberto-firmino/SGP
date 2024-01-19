@extends('layouts.dashboard')

@section('title', 'Detalhes do Gasto')

@section('content')

    <h2 class="mb-4">Detalhes do Gasto</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Adicione o código para exibir os detalhes do gasto -->

    <div>
        <strong>Descrição:</strong> {{ $gasto->descricao }}
    </div>

    <div>
        <strong>Data:</strong> {{ \Carbon\Carbon::parse($gasto->data)->format('d/m/Y') }}
    </div>

    <div>
        <strong>Valor:</strong> {{ $gasto->valor }}
    </div>

    <a href="{{ route('gastos.index') }}" class="btn btn-primary mt-3">Voltar para Lista de Gastos</a>

@endsection
