@extends('layouts.dashboard')

@section('title', 'Lista de Treinos')

@section('content')

    <a href="{{ route('treinos.create') }}" class="btn btn-primary">Novo Treino</a>
    <div id="calendario" style="height: 500px;"></div>

    @push('scripts')
        <script>
            $(document).ready(function () {
                var modos = {
                    'month': 'Mês',
                    'agendaWeek': 'Semana',
                    'agendaDay': 'Dia'
                };

                $('#calendario').fullCalendar({
                    events: [
                        @foreach($treinos as $treino)
                            {
                                title: '{{ $treino->descricao }}',
                                start: '{{ $treino->data }}',
                                url: '{{ route('treinos.show', $treino->id) }}'
                            },
                        @endforeach
                    ],
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    views: {
                        month: { buttonText: modos.month },
                        agendaWeek: { buttonText: modos.agendaWeek },
                        agendaDay: { buttonText: modos.agendaDay }
                    },
                    dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
                    dayNamesShort: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
                    buttonText: {
                        today: 'Hoje'
                    }
                });
            });
        </script>
    @endpush
@endsection
