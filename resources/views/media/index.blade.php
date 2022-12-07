@extends('principais.layout')

@section('title', 'NOTA MÉDIA NO PERÍODO')

@section('icon', 'ni-collection')

@section('content')

<a href="{{route('diarios')}}">{{$componente->nome}} - {{$curso->nome}}</a> >> Notas

<br/><br/>

<h1>{{$periodo->nome}}</h1>

<h3 style="background-color: #F1E6B2; color: #6B3D2E; text-align: center">Alterar média</h3>


<div>
    <form method="GET" action="{{route('media.store')}}">
    @csrf
        <input type="hidden" name="periodo" value="{{$periodo->id}}" />
        <input type="hidden" name="componente" value="{{$componente->id}}" />
        
        <label for="aluno">Estudante: </label>
        <select name="aluno" id="selectaluno">
            @foreach ($ativos as $aluno)
                <option value="{{$aluno["id"]}}">{{$aluno["nome"]}}</option>
            @endforeach
        </select>

        <label for="nota">Média: </label><input type="number" step="0.01" name="nota" id="nota">

        <button type="submit" id="registrar">Registrar</button>
    </form>
</div>

<br/>

<h3 style="background-color: #F1E6B2; color: #6B3D2E; text-align: center">Lista de médias</h3>
    <table class="table table-responsive-sm">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
        <th scope="col" style="text-align: center">Média</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ativos as $aluno)
            <tr>
                <td>{{$aluno["id"]}}</td>
                <td class="select-change" id="{{$aluno['id']}}">{{$aluno["nome"]}}</td>
                <td style="text-align: center">{{$aluno["media"]}}</td>
            </tr>
        @endforeach
    </tbody>
    </table>

    @if ($alunosTransferidos != '[]')
    <div>
        <br/><p>Desligados da turma: 
            @foreach ($alunosTransferidos as $aluno)
                | {{$aluno->nome}}
            @endforeach
        </p>
    </div>
    @endif

@endsection

@section('script')

    $(document).ready(function(){
        $('.select-change').click(function(){ 
            $('#selectaluno').val(this.id).trigger('change');
        });
        
        $("#registrar").on('click', function(e){
            var nota = $.trim($("#nota").val());
            if(nota < 0 || nota > 10 || nota === ""){
                alert("A média inserida é inválida.");
                e.preventDefault(); 
            }
        });
    });

@endsection