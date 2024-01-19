<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-3">
                <button class="btn btn-secondary mb-2" data-toggle="collapse" data-target="#treinosGastos">Rotinas</button>
                <div class="collapse" id="treinosGastos">
                    <a href="{{ route('treinos.index') }}" class="btn btn-primary btn-block mb-2">Treinos</a>
                    <a href="{{ route('alimentacoes.index') }}" class="btn btn-primary btn-block">Alimentação</a>
                    <a href="{{ route('gastos.index') }}" class="btn btn-primary btn-block">Gastos</a>
                </div>
            </div>
            <div class="col-md-9">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    @stack('scripts')
</body>
</html>
