<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">

    <style>
        @page {
            margin: 0cm 0cm;
        }

        @font-face {
            font-family: 'roboto-serif';
            src: url("{{storage_path('fonts/RobotoSerif.ttf')}}") format('truetype');
            font-weight: 400;
            font-style: normal;
        }

        body {
            font-family: roboto-serif, sans-serif;
            font-size: 10pt;
            margin-left: 2cm;
            margin-right: 2cm;
        }

        .page-break {
            page-break-after: always;
        }

        table, td {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
        }

        table{
            font-size: 9px;
            width: 100%;
        }

        h1{
            font-size: 18px;
        }

        td.rotate > div {
            font-weight: normal;
            transform: rotate(270deg);
        }

        .column {
            float: left;
            padding: 2px;
        }
    </style>
</head>

<body>

    @php
        setlocale(LC_ALL, "pt_BR", "pt_BR.utf-8", "pt_BR.utf-8", "portuguese");
        $agora = new DateTime(null, new DateTimeZone('America/Cuiaba'));
        $i = 0;
    @endphp

    <main>
        <div style="clear:both; position:relative">
            @foreach ($dados as $matricula)
                @if ($i != 0)
                    <div class="page-break"></div>
                    <div style="height: 20px" ></div>
                @endif
                
                <div style="text-align: center; margin-top: 1cm; display: table; clear: both; width: 100%; font-size: 9pt">
                    <div class="column" style="width: 10%">
                        <img src="../assets/img/ctjj.jpg" style="height: 60px; margin-top: 5px; vertical-align: top;">
                    </div>
                    <div class="column" style="width: 77%">
                        <p>Centro Técnico Juvenil de Jarudore</p>
                        <p style="font-size: 12pt; margin-top: -8pt"><b>{{$curso->calendario->escola->nome}}</b></p>
                        <p style="margin-top: -8pt">CNPJ: {{$curso->calendario->escola->cnpj}}. Fundação: {{strftime("%d de %b de %Y", strtotime($curso->calendario->escola->fundacao))}}.</p>
                        <p style="margin-top: -8pt">Tel.: {{$curso->calendario->escola->telefone}}. E-mail: {{$curso->calendario->escola->email}} | Site: {{$curso->calendario->escola->site}}</p>
                        <p style="margin-top: -8pt">{{$curso->calendario->escola->info}}.</p>
                    </div>
                    <div class="column" style="width: 10%">
                        <img src="../assets/img/lsf.jpg" style="height: 60px; vertical-align: top;">
                    </div>
                </div>

                <h1 style="text-align: center">FICHA INDIVIDUAL</h1>
                <h3 style="text-align: center; font-weight:normal; margin-top: -10px; text-transform:uppercase;">{{$curso->nome}} do ensino {{$curso->modalidade}}. {{$curso->calendario->nome}}, {{$curso->calendario->ano}}</h3>
                
                <p style="margin-top: 25px"><b>Estudante: </b>{{strtoupper($matricula['aluno']->nome)}}</p>
                <p style="margin-top: -8px">
                    <b>Naturalidade: </b>{{$matricula['aluno']->naturalidade}}, {{$matricula['aluno']->naturaif}}.
                    <b>Nacionalidade:</b> {{$matricula['aluno']->nacionalidade}}.
                    <b>Data de Nascimento:</b> {{date('d/m/Y', strtotime($matricula['aluno']->nascimento))}}.
                </p>
                <p style="margin-top: -8px"><b>Mãe: </b>{{$matricula['aluno']->genitora}}. <b>Pai: </b>{{$matricula['aluno']->genitor}}.</p>
                <p style="margin-top: -8px"><b>CPF: </b> {{$matricula['aluno']->cpf}} | <b>Tel.: </b> {{$matricula['aluno']->respontel1}}</p>

                @php

                    $contoutra = 0;

                    $conte = 0;
                    foreach($matricula['areas'] as $area){
                            $conte = $conte + 1;
                            
                            if($area["nome"] != "Parte Diversificada" && $area["nome"] != "Itinerário Formativo"){
                                $contoutra = $contoutra + count($area['componentes']);
                            }
                    }

                    $contoutra = $contoutra + $conte;
    
                    $conte2 = 0;
                    foreach($matricula['areas'] as $area){
                        if($area["nome"] == "Parte Diversificada" || $area["nome"] == "Itinerário Formativo"){
                            $conte2 = $conte2 + count($area['componentes']);
                        }
                    }
                @endphp

                <br/>

                <table>
                    <tr>
                        <td rowspan="2" colspan="3" style="text-transform:uppercase;">Componentes Curriculares</td>
                        @foreach ($matricula['areas'][0]['componentes'][0]['notas'] as $bimestre)
                            <td colspan="2">{{$bimestre['nome']}}<td>
                        @endforeach
                        <td rowspan="2">MF</td>
                        <td rowspan="2">TF</td>
                        <td rowspan="2">CHP</td>
                        <td rowspan="2">CHC</td>
                        <td rowspan="2">RF</td>
                    </tr>
                    <tr>
                        @foreach ($matricula['areas'][0]['componentes'][0]['notas'] as $bimestre)
                            <td>N</td>
                            <td>F</td>
                            <td></td>
                        @endforeach
                    </tr>

                    @php

                    foreach($matricula['areas'] as $area){
                        if($area["nome"] == "Parte Diversificada" || $area["nome"] == "Itinerário Formativo"){
                            $tamanho = $contoutra;
                        }else{
                            $tamanho = $contoutra + 1;
                        }
                    }

                    @endphp

                    <tr>
                        <td rowspan="{{$tamanho}}" style="text-transform:uppercase; max-width: 2cm;"><div>Base Nacional Comum <br/> (Lei nº 9.394/96)</div></td>
                    </tr>

                    @foreach ($matricula["areas"] as $area)

                        @if($area["nome"] != "Parte Diversificada" && $area["nome"] != "Itinerário Formativo")
                            <tr>
                                <td rowspan="{{count($area['componentes']) +1}}" style="text-transform:uppercase; max-width: 3cm;">{{$area["nome"]}}</td>
                            </tr>
                            @foreach ($area['componentes'] as $componente)
                                <tr>
                                    <td style="text-transform:uppercase;">{{$componente['nome']}}</td>

                                    @foreach ($componente['notas'] as $bimestre)
                                        <td>{{$bimestre['periodo-media']}}</td>
                                        <td>{{$bimestre['periodo-faltas']}}</td>
                                        <td></td>
                                    @endforeach

                                    <td>{{$componente['MF']}}</td>
                                    <td>{{$componente['TF']}}</td>
                                    <td>{{$componente['CHP']}}</td>
                                    <td>{{$componente['CHC']}}</td>
                                    <td>{{$componente['RF']}}</td>
                                </tr>
                            @endforeach
                        @endif
                    @endforeach

                    @foreach ($matricula["areas"] as $area)
                        @if($area["nome"] == "Parte Diversificada" || $area["nome"] == "Itinerário Formativo")
                            <tr>
                                <td colspan="2" rowspan="{{count($area['componentes']) +1}}" style="text-transform:uppercase; ">{{$area["nome"]}}</td>
                            </tr>
                            @foreach ($area['componentes'] as $componente)
                                <tr>
                                    <td style="text-transform:uppercase; max-width: 4cm;">{{$componente['nome']}}</td>
                                    
                                    @foreach ($componente['notas'] as $bimestre)
                                        <td>{{$bimestre['periodo-media']}}</td>
                                        <td>{{$bimestre['periodo-faltas']}}</td>
                                        <td></td>
                                    @endforeach

                                    <td>{{$componente['MF']}}</td>
                                    <td>{{$componente['TF']}}</td>
                                    <td>{{$componente['CHP']}}</td>
                                    <td>{{$componente['CHC']}}</td>
                                    <td>{{$componente['RF']}}</td>
                                </tr>
                            @endforeach
                        @endif
                    @endforeach

                </table>

                <br/>

                <p><b>Dias letivos:</b> 200</p>
                <p><b>Carga horária total prevista:</b> {{$matricula["totalhoras"]}} h | <b>Carga horária total cumprida:</b> {{$matricula["totalhorascumpridas"]}} h</p>
                <p>
                    <b>Data da matrícula:</b> {{date('d/m/Y', strtotime($matricula["datamatricula"]))}} | 
                    <b>Resultado:</b> {{$matricula["resultado"]}}
                    
                    @if ($matricula["resultado"] == "TRANSFERIDO")
                        <b>Data da transferência:</b> {{date('d/m/Y', strtotime($matricula["datatransferencia"]))}}
                    @endif
                </p>

                <p style="text-weight: normal; font-size: 8pt">Legenda: <br/>N (nota); F (falta); MF (média final); TF (total de faltas); CHP (carga-horária prevista); CHC (carga-horária cursada); RF (resultado final).</p>
                <br/>

                <div style="text-align: center">
                    <p style="margin-top: 0.5cm; margin-bottom: 2cm">Diretor(a): _________________________ &nbsp;&nbsp;&nbsp;&nbsp; Secretário(a): _________________________ &nbsp;&nbsp;&nbsp;&nbsp;</p>
                    <hr  />
                    <p style="margin-top: -5pt">Ficha gerada para impressão por: {{Auth::user()->nome}}, em {{$agora->format('d/m/Y')}} às {{$agora->format('H:i')}}.</p>
                    <p style="text-align: center; margin-top: -10pt">CTJJ. Endereço de Correspondência: Caixa Postal 338. CEP 78700-970. Rondonópolis-MT.</p>
                </div>

                @php
                    $i = $i + 1;
                @endphp
            @endforeach
        </div>
    </main>

</body>

</html>