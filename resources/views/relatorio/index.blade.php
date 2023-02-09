@extends('principais.layout')

@section('title', 'RELATÓRIOS')
@section('icon', 'ni-paper-diploma')

@section('content')

<a href="{{route('home')}}">Home</a> >> Relatórios

<br/><br/>

<div style="text-align: center">
    <h1 style="text-align: left">Emitir registros </h1>
    <form action="{{route('relatorio.boletim')}}" method="get">
        <div class="row">
            <div class="col-md-6">
                <select name="opcao" name="reldisp" class="form-control form-control-sm">
                    <optgroup label="Relatórios disponíveis">
                        <option value="boletim">Boletim por período</option>
                        <option value="boletimconc">Boletim conceitual por período</option>
                        <option value="individual">Ficha individual</option>
                        <option value="matricula">Ficha de matrícula</option>
                        <option value="chamada">Lista de chamada</option>
                    </optgroup>
                </select>
            </div>
            <div class="col-md-6">
                <select name="curso" name="relturm" class="form-control form-control-sm">
                    <optgroup label="Turmas ativas">
                    @foreach ($cursos as $curso)
                        @if ($curso->status == 'ativo')
                            <option value="{{$curso->id}}">{{strtoupper($curso->nome)}} - {{strtoupper($curso->modalidade)}} ({{$curso->calendario->ano}})</option>
                        @endif
                    @endforeach
                    </optgroup>
                    
                    <optgroup label="Turmas suspensas">
                    @foreach ($cursos as $curso)
                        @if ($curso->status == 'suspenso')
                            <option value="{{$curso->id}}">{{strtoupper($curso->nome)}} - {{strtoupper($curso->modalidade)}} ({{$curso->calendario->ano}})</option>
                        @endif
                    @endforeach
                    </optgroup>
                </select>
            </div>
        </div><br/>
        <input type="submit" class="btn btn-success" value="Consultar">
    </form>
    <br/>

    <h1 style="text-align: left">Por professor</h1>
    <form action="{{route('diarios')}}" method="get">
        <div class="row">
            <div class="col-md-6">
                <select class="form-control form-control-sm">
                    <option>Diário de Classe</option>
                </select>
            </div>
            <div class="col-md-6">
                <select name="professor" class="form-control form-control-sm">
                    <optgroup label="Professores e gestão">
                    @foreach ($professores as $professor)
                        <option value="{{$professor->id}}">{{$professor->nome}}</option>
                    @endforeach
                    </optgroup>
                </select>
            </div>
        </div><br/>
        <input type="submit" value="Acessar" class="btn btn-warning">
    </form>
</div>
<br/>
@endsection