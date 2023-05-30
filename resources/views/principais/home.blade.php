@extends('principais.layout')

@section('title', 'HOME')
@section('icon', 'ni-tv-2')

@section('content')
<p>
    <div id='calendar'></div>
</p>
@endsection

@section('script')
var calendar = new FullCalendar.Calendar(document.getElementById("calendar"), {
      initialView: "dayGridMonth",
      selectable: true,
      locale: 'pt-br',
      events: [
        @foreach ($aniversariantes as $aniversariante)
            {
            title: '{{$aniversariante->nome}}',
            start: "{{date('Y').date('-m-d', strtotime($aniversariante->nascimento))}}",
            end: "{{date('Y').date('-m-d', strtotime($aniversariante->nascimento))}}",
            className: 'bg-gradient-danger'
            },
        @endforeach
      ],
      views: {
        month: {
          titleFormat: {
            month: "long",
            year: "numeric"
          }
        },
        agendaWeek: {
          titleFormat: {
            month: "long",
            year: "numeric",
            day: "numeric"
          }
        },
        agendaDay: {
          titleFormat: {
            month: "short",
            year: "numeric",
            day: "numeric"
          }
        }
      },
    });

    calendar.render();
@endsection