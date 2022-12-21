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

            margin-top: 4cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2.5cm;
        }

        header {
            position: fixed;
            top: 10pt;
            left: 0cm;
            right: 0cm;
            height: 3cm;
            text-align: center;
        }

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2.5cm;

            text-align: center;
        }

        .page-break {
            page-break-after: always;
        }

        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        table{
            font-size: smaller;
            width: 100%;
        }

        h1{
            font-size: 18px;
        }
    </style>
</head>

<body>

    @php
        setlocale(LC_ALL, "pt_BR", "pt_BR.utf-8", "pt_BR.utf-8", "portuguese");
        $agora = new DateTime(null, new DateTimeZone('America/Cuiaba'));
    @endphp

    <header>
        <div style="clear:both; position:relative; padding-left: 16px; padding-right: 16px">
            <div style="position:absolute; left:0pt; width:200pt;">
                <img src="{{public_path('assets/img/ctjj.jpg')}}" style="height: 100px; margin-top: 5px">
            </div>
            <div style="width: 100%; display: block; float: left">
                <p>Centro Técnico Juvenil de Jarudore</p>
                <p style="font-size: 14pt; margin-top: -10pt"><b>{{$escola->nome}}</b></p>
                <p style="margin-top: -13pt">CNPJ: {{$escola->cnpj}}. Fundação: {{strftime("%d de %b de %Y", strtotime($escola->fundacao))}}.</p>
                <p style="margin-top: -10pt">{{$escola->info}}.</p>
                <p style="margin-top: -10pt">Tel.: {{$escola->telefone}}. E-mail: {{$escola->email}} | Site: {{$escola->site}}</p>
                <p style="text-align: center">{{$calendario->nome}}, {{$calendario->ano}}. <b>{{$curso->nome}}</b>, <b>Ensino {{$curso->modalidade}}</b>. <b>{{$componente->nome}}</b>, {{$componente->horas}}h - Área: {{$area->nome}}.</p>
            </div>
            <div style="width: 180%; display: block; float: left">
                <img src="{{public_path('assets/img/lsf.jpg')}}" style="height: 90px; margin-top: 5px">
            </div>
        </div>
    </header>

    <footer style="clear:both">
        <hr style="margin-bottom: -10px" />
        <p>Ficha gerada para impressão por: {{Auth::user()->nome}}, em {{$agora->format('d/m/Y')}} às {{$agora->format('H:i')}}.</p>
        <p style="text-align: center; margin-top: -10pt">CTJJ. Endereço de Correspondência: Caixa Postal 338. CEP 78700-970. Rondonópolis-MT.</p>
    </footer>

    <main>
        <div style="clear:both; position:relative">
            <div style="text-align: center; font-size: 14pt; margin-bottom: -5pt">
                <br/><br/><br/>
                <p><b>DIÁRIO DE CLASSE</b></p>
                <p>{{$calendario->nome}} - Ano letivo: {{$calendario->ano}}</p>
                <span style="text-transform:uppercase; font-size: 13pt">{{$curso->nome}} ENSINO {{$curso->modalidade}}</span>
                <span style="text-transform:uppercase; font-size: 20pt"><b>{{$componente->nome}}</b></span><br/>
                <span style="font-size: 12pt">Área: {{$area->nome}}</span>
                <span style="text-transform:uppercase"><b>Prof.: {{$professor->nome}}</b></span>
                <br/><br /><br /><br />

                <p>Este documento contém _____ folhas e destina-se ao registro das frequências, atividades pedagógicas desenvolvidas e desempenho escolar dos alunos matriculados no regime REGULAR, nesta unidade escolar.</p>
                <br /><br />
                <p style="font-size: 11pt">Diretor(a): _________________________ &nbsp;&nbsp;&nbsp;&nbsp; Secretário(a): _________________________ &nbsp;&nbsp;&nbsp;&nbsp;</p>
                <br /><br />
            </div>

            <div class="page-break"></div>
            <h1 style="text-align: center">FICHA DE REGISTRO DE PROGRESSÃO</h1>

            <table style="margin-left: auto; margin-right: auto">
                <tr>
                    <th rowspan="2">&nbsp;Código&nbsp;</th>
                    <th rowspan="2">Nome</th>
                    <th colspan="{{count($periodos)}}">Notas</th>
                    <th rowspan="2">&nbsp;Média&nbsp;</th>
                    <th colspan="{{count($periodos)}}">Faltas</th>
                    <th rowspan="2">&nbsp;Total&nbsp;</th>
                    <th rowspan="2">&nbsp;Situação&nbsp;</th>
                </tr>
                <tr>
                    @foreach ($periodos as $p)
                        <td style="text-align: center">{{$p->nome}}</td>
                    @endforeach
                    @foreach ($periodos as $p)
                        <td style="text-align: center">{{$p->nome}}</td>
                    @endforeach
                </tr>
                @foreach ($infos as $t)
                        <tr>
                            <td style="text-align: center">{{$t['codigo']}}</td>
                            <td>&nbsp;{{$t['nome']}}&nbsp;&nbsp;</td>
                            @foreach ($t['notas'] as $nota)
                                <td style="text-align: center">{{$nota}}</td>
                            @endforeach
                            <td style="text-align: center">
                                @if(round(floatval($t['media']), 1) == 0)
                                    -
                                @else
                                    {{round(floatval($t['media']), 1)}}
                                @endif
                            </td>
                            @foreach ($t['faltas'] as $falta)
                                <td style="text-align: center">{{$falta}}</td>
                            @endforeach
                            <td style="text-align: center">{{$t['totalfaltas']}}</td>
                            <td style="text-align: center">&nbsp;{{$t['resultado']}}&nbsp;</td>
                        </tr>
                @endforeach
            </table>
            
            @php
                $cont = 0;
            @endphp

            @foreach($diariosbimestre as $bimestre)
                @if(count($t['diasletivos'][$cont]) > 0)    
                
                    <div class="page-break"></div>
                    <h1 style="text-align: center; text-transform:uppercase;">FREQUÊNCIA {{$periodos[$cont]->nome}}</h1>

                    <table style="margin-left: auto; margin-right: auto">
                        <tr>
                            <th rowspan="3">Código</th>
                            <th rowspan="3">Estudante</th>
                            <th colspan="{{count($bimestre)}}">Dias Letivos</th>
                            <th rowspan="3">TF</th>
                        </tr>
                        <tr>
                            @foreach($bimestre as $umdia)
                                <td style="text-align: center; font-size: 9px">&nbsp;{{strftime("%d", strtotime($umdia->data))}}&nbsp;</td>
                            @endforeach
                        </tr>
                        <tr>
                            @foreach($bimestre as $umdia)
                                <td style="text-align: center; font-size: 9px">&nbsp;{{strftime("%m", strtotime($umdia->data))}}&nbsp;</td>
                            @endforeach
                        </tr>                    
                        @foreach ($infos as $t)
                            <tr>
                                <td style="text-align: center">{{$t['codigo']}}</td>
                                <td>{{$t['nome']}}</td>
                                @foreach($t['diasletivos'][$cont] as $alunochamada)
                                    <td style="text-align: center">{{$alunochamada['chamada']}}</td>
                                @endforeach
                                <td style="text-align: center">{{$t['faltanessebim'][$cont]}}</td>
                            <tr>
                        @endforeach
                        <tr><td colspan="{{count($bimestre) + 3}}">Observações: </td></tr>
                    </table>

                    <h1 style="text-align: center; text-transform:uppercase;">CONTEÚDOS {{$periodos[$cont]->nome}}</h1>

                    <table style="margin-left: auto; margin-right: auto">
                        <tr>
                            <th>Data</th>
                            <th>Descrição</th>
                        </tr>
                        @foreach($diariosbimestre[$cont] as $diario)
                            <tr>
                                <td style="text-align: center; width: 8%">{{date('d-m-Y', strtotime($diario->data))}}</td>
                                <td style="text-align: left">&nbsp;{{$diario->conteudo}}</td>
                            </tr>
                        @endforeach
                    </table>

                @endif
                
                @php
                    $cont = $cont + 1;
                @endphp

            @endforeach

        </div>
    </main>

</body>

</html>