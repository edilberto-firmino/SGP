@extends('layouts.dashboard')

@section('content')

    <h2 class="mb-4">Detalhes da Alimentação</h2>

    <div>
        <strong>Data:</strong> {{ $alimentacao->data }}
    </div>

    <div>
        <strong>Descrição:</strong> {{ $alimentacao->descricao }}
    </div>

    <div>
        <strong>Calorias:</strong> {{ $alimentacao->calorias }}
    </div>

    <a href="{{ route('alimentacoes.index') }}" class="btn btn-primary mt-3">Voltar para Lista de Alimentações</a>

@endsection
