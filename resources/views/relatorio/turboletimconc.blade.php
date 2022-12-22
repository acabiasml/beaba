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

            margin-top: 3.2cm;
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
            text-align: center;
        }

        table{
            font-size: 10px;
            width: 100%;
        }

        h1{
            font-size: 18px;
        }

        th.rotate {
            height: 80px;
        }

        th.rotate > div {
            font-weight: normal;
            transform: 
                rotate(270deg);
        }
    </style>
</head>

<body>

    @php
        setlocale(LC_ALL, "pt_BR", "pt_BR.utf-8", "pt_BR.utf-8", "portuguese");
        $agora = new DateTime(null, new DateTimeZone('America/Cuiaba'));
        $i = 0;
    @endphp

    <header>
        <div style="clear:both; position:relative; padding-left: 16px; padding-right: 16px">
            <div style="position:absolute; left:0pt; width:200pt;">
                <img src="{{public_path('assets/img/ctjj.jpg')}}" style="height: 100px; margin-top: 5px">
            </div>
            <div style="width: 100%; display: block; float: left">
                <p>Centro Técnico Juvenil de Jarudore</p>
                <p style="font-size: 14pt; margin-top: -10pt"><b>{{$curso->calendario->escola->nome}}</b></p>
                <p style="margin-top: -13pt">CNPJ: {{$curso->calendario->escola->cnpj}}. Fundação: {{strftime("%d de %b de %Y", strtotime($curso->calendario->escola->fundacao))}}.</p>
                <p style="margin-top: -10pt">{{$curso->calendario->escola->info}}.</p>
                <p style="margin-top: -10pt">Tel.: {{$curso->calendario->escola->telefone}}. E-mail: {{$curso->calendario->escola->email}} | Site: {{$curso->calendario->escola->site}}</p>
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
            @foreach ($dados["periodos"] as $bimestre)
                @if ($i != 0)
                    <div class="page-break"></div>
                @endif
                
                <h1 style="text-align: center; font-weight:normal">BOLETIM {{strtoupper($bimestre["periodo-nome"])}} | <b>{{strtoupper($dados["curso-nome"])}} DO ENSINO {{strtoupper($dados["curso-modalidade"])}}</b> | {{$curso->calendario->nome}}, {{$curso->calendario->ano}}</h1>

                <table style="margin-left: auto; margin-right: auto">
                    <tr>
                        <th rowspan="3">ID</th>
                        <th rowspan="3">Estudante</th>

                        @php
                            $conte = 0;
                            foreach($bimestre['alunos'][0]['areas'] as $area){
                                if($area["area-nome"] != "Parte Diversificada" && $area["area-nome"] != "Itinerário Formativo"){
                                    $conte = $conte + count($area['componentes']);
                                }
                            }

                            $conte2 = 0;
                            foreach($bimestre['alunos'][0]['areas'] as $area){
                                if($area["area-nome"] == "Parte Diversificada" || $area["area-nome"] == "Itinerário Formativo"){
                                    $conte2 = $conte2 + count($area['componentes']);
                                }
                            }
                        @endphp

                        <th colspan="{{$conte}}">Base Nacional Comum (Lei nº 9.394/96)</th>
                        <th colspan="{{count(end($bimestre['alunos'][0]['areas'])['componentes'])}}">{{end($bimestre['alunos'][0]['areas'])['area-nome']}}</th>
                    </tr>
                    <tr>
                        @foreach ($bimestre['alunos'][0]['areas'] as $area)
                            @if($area["area-nome"] != "Parte Diversificada" && $area["area-nome"] != "Itinerário Formativo")
                                <td colspan="{{count($area['componentes'])}}">{{$area["area-nome"]}}</td>
                            @endif
                        @endforeach

                        @foreach ($bimestre['alunos'][0]['areas'] as $area)
                            @if($area["area-nome"] == "Parte Diversificada" || $area["area-nome"] == "Itinerário Formativo")
                                @foreach ($area["componentes"] as $componente)
                                    <th rowspan="2" class="rotate"><div>{{$componente["componente-nome"]}}</div></th>
                                @endforeach
                            @endif
                        @endforeach
                    </tr>
                    <tr>
                        @foreach ($bimestre['alunos'][0]['areas'] as $area)
                            @if($area["area-nome"] != "Parte Diversificada" && $area["area-nome"] != "Itinerário Formativo")
                                @foreach ($area["componentes"] as $componente)
                                    <th class="rotate"><div>{{$componente["componente-nome"]}}</div></th>
                                @endforeach
                            @endif
                        @endforeach
                    </tr>
                    @foreach ($bimestre["alunos"] as $aluno)
                        <tr>
                            <td>{{$aluno["aluno-id"]}}</td>
                            <td>{{$aluno["aluno-nome"]}}</td>
                            @foreach ($aluno["areas"] as $area)
                                @foreach ($area["componentes"] as $componente)
                                    <td>
                                        @php
                                            if($componente["componente-media"] != "-"){
                                                if($componente["componente-media"] >=0 && $componente["componente-media"] <= 2.9){
                                                    echo "ING";
                                                }else if($componente["componente-media"] > 2.9 && $componente["componente-media"] <= 5.4){
                                                    echo "INS";
                                                }else if($componente["componente-media"] > 5.4 && $componente["componente-media"] <= 7.5){
                                                    echo "SUF";
                                                }else if($componente["componente-media"] > 7.5 && $componente["componente-media"] <= 9){
                                                    echo "BOM";
                                                }else if($componente["componente-media"] > 9){
                                                    echo "OTI";
                                                }
                                            }else{
                                                echo $componente["componente-media"];
                                            }
                                        @endphp
                                    </td>
                                @endforeach
                            @endforeach
                        </tr>
                    @endforeach
                </table>
                
                @php
                    $i = $i + 1;
                @endphp
            @endforeach
        </div>
    </main>

</body>

</html>