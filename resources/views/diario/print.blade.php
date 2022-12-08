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

            margin-top: 3.5cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
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
    </style>
</head>

<body>
    <header>
        <div style="clear:both; position:relative; padding-left: 16px; padding-right: 16px">
            <div style="position:absolute; left:0pt; width:200pt;">
                <img src="{{public_path('assets/img/ctjj.jpg')}}" style="height: 100px; margin-top: 5px">
            </div>
            <div style="width: 100%; display: block; float: left">
                <p style="font-size: 14pt"><b>Centro Técnico Juvenil de Jarudore</b></p>
                <p style="margin-top: -10pt">Tel.: (66) 3432-1093. E-mail: ctjj.mt@gmail.com</p>
                <p style="margin-top: -10pt">https://www.ctjj.org</p>
            </div>
            <div style="width: 180%; display: block; float: left">
                <img src="{{public_path('assets/img/lsf.jpg')}}" style="height: 90px; margin-top: 5px">
            </div>
        </div>
    </header>

    @php
        $agora = new DateTime(null, new DateTimeZone('America/Cuiaba'));
    @endphp

    <footer style="clear:both; margin-top: 10pt">
        Ficha gerada para impressão por: {{Auth::user()->nome}}, em {{$agora->format('d/m/Y')}} às {{$agora->format('H:i')}}.
        <hr style="margin-bottom: -10px" />
        <p style="text-align: center">CTJJ. Endereço de Correspondência: Caixa Postal 338. CEP 78700-970. Rondonópolis-MT.</p>
    </footer>

    <main>
        <div style="clear:both; position:relative">
            <div style="text-align: center; font-size: 14pt; margin-bottom: -5pt">
                <span>{{$calendario->nome}}</span>
                <span>DIÁRIO DE CLASSE | Ano letivo: <b>{{$calendario->ano}}</b></span>
                <hr style="margin-top: 0pt;" /><br /><br /><br />
                <span style="text-transform:uppercase; font-size: 13pt">{{$curso->nome}} ENSINO {{$curso->modalidade}} </span><br />
                <span style="text-transform:uppercase; font-size: 20pt"><b>{{$componente->nome}}</b></span>
                <br/><span style="font-size: 12pt">Área: {{$area->nome}}</span><br /><br />
                <br /><span style="text-transform:uppercase"><b>Prof.: {{$professor->nome}}</b></span>
                <br/><br /><br /><br />

                <p>Este documento contém _____ folhas e destina-se ao registro das frequências, atividades pedagógicas desenvolvidas e desempenho escolar dos alunos matriculados no regime REGULAR, nesta unidade escolar.</p>
                <br /><br />
                <p style="font-size: 11pt">Diretor(a): _________________________ &nbsp;&nbsp;&nbsp;&nbsp; Secretário(a): _________________________ &nbsp;&nbsp;&nbsp;&nbsp;</p>
                <br /><br />
            </div>

            <div class="page-break"></div>
            <h1 style="text-align: center">FICHA DE REGISTRO DE PROGRESSÃO</h1>

            <table style="margin-left: auto; margin-right: auto;">
                <tr>
                    <th rowspan="2">&nbsp;Código&nbsp;</th>
                    <th rowspan="2">Nome</th>
                    <th colspan="{{count($periodo)}}">Progressão</th>
                    <th rowspan="2">&nbsp;Média&nbsp;</th>
                    <th rowspan="2">&nbsp;Faltas&nbsp;</th>
                    <th rowspan="2">&nbsp;Situação&nbsp;</th>
                </tr>
                <tr>
                    @foreach ($periodo as $p)
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
                            <td style="text-align: center">{{$t['media']}}</td>
                            <td style="text-align: center">0</td>
                            <td style="text-align: center">&nbsp;{{$t['resultado']}}&nbsp;</td>
                        </tr>
                @endforeach
            </table>

            <div class="page-break"></div>
            <h1>Page 3</h1>
        </div>
    </main>

</body>

</html>