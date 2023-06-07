@extends('principais.layout')

@section('title', 'HOME')
@section('icon', 'ni-tv-2')

@section('content')

<div class="row">
  <div class="col-xl-4">
    <p style="text-align: center; font-weight: bold; text-transform: uppercase;">Avisos</p>
    <ul>
      <li><p>Atenção professores! As provas de recuperação devem ser feitas até dia 30/06 (trinta de junho)</p></li>
      <li><p>As férias dos meninos do internato começarão dia 01/07 (primeiro de julho).</p></li>
  </ul>
  </div>
  <div class="col-xl-8">
    <div id='calendar'></div>
  </div>
</div>
@endsection

@section('script')
var calendar = new FullCalendar.Calendar(document.getElementById("calendar"), {
      initialView: "dayGridMonth",
      selectable: true,
      select: function(info) {
        alert('selected ' + info.startStr + ' to ' + info.endStr);
      },
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

  calendar.on('dateClick', function(info) {
    alert('clicked on ' + info.dateStr);
  });
@endsection