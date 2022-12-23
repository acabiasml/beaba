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
        <div class="row">
            @csrf
        
            <input type="hidden" name="periodo" value="{{$periodo->id}}" />
            <input type="hidden" name="componente" value="{{$componente->id}}" />
            
            <div class="col-sm">
                <div class="form-group">
                    <label for="aluno">Estudante: </label>
                    <select name="aluno" class="form-control" id="selectaluno">
                        @foreach ($ativos as $aluno)
                            <option value="{{$aluno["id"]}}">{{$aluno["nome"]}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-sm">
                <div class="form-group">
                    <label for="nota">Média: </label>
                    <input class="form-control" type="number" step="0.01" name="nota" id="nota">
                </div>
            </div>

            <div class="col-sm">
                <div class="form-group">
                    <br/>
                    <div style="text-align: center">
                        <button type="submit" class="btn btn-warning" id="registrar">Registrar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<br/>

<h3 style="background-color: #F1E6B2; color: #6B3D2E; text-align: center">Lista de médias</h3>
    <table class="table table-responsive-sm">
    <thead>
        <tr>
            <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7" style="text-align: center" scope="col">ID</th>
            <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7" style="text-align: center" scope="col">Nome</th>
            <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7" style="text-align: center" scope="col" style="text-align: center">Média</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ativos as $aluno)
            <tr>
                <td style="text-align: center">{{$aluno["id"]}}</td>
                <td class="select-change" id="{{$aluno['id']}}">{{$aluno["nome"]}}</td>
                <td style="text-align: center" style="text-align: center">{{$aluno["media"]}}</td>
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