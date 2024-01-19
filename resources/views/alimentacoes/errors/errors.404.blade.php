@extends('layouts.dashboard')

@section('content')
    <div class="alert alert-danger">
        <h1>404 Not Found</h1>
        <p>A página que você está procurando não foi encontrada.</p>
        <a href="{{ route('alimentacoes.index') }}" class="btn btn-info">Voltar</a>

    </div>
@endsection
