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
            margin-left: 1.5cm;
            margin-right: 1.5cm;
            margin-bottom: 2.5cm;
        }

        header {
            position: fixed;
            top: 35px;
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
            <div style="position:absolute; left:-30pt; width:200pt;">
                <img src="{{public_path('assets/img/ctjj.jpg')}}" style="height: 80px; margin-top: 5px">
            </div>
            <div style="width: 100%; display: block; float: left">
                <p>Centro Técnico Juvenil de Jarudore</p>
                <p style="font-size: 12pt; margin-top: -14pt"><b>{{$curso->calendario->escola->nome}}</b></p>
                <p style="margin-top: -13pt">CNPJ: {{$curso->calendario->escola->cnpj}}. Fundação: {{strftime("%d de %b de %Y", strtotime($curso->calendario->escola->fundacao))}}.</p>
                <p style="margin-top: -10pt">Tel.: {{$curso->calendario->escola->telefone}}. E-mail: {{$curso->calendario->escola->email}} | Site: {{$curso->calendario->escola->site}}</p>
                <p style="margin-top: -10pt">{{$curso->calendario->escola->info}}.</p>
            </div>
            <div style="width: 180%; display: block; float: left">
                <img src="{{public_path('assets/img/lsf.jpg')}}" style="height: 70px; margin-top: 5px">
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
            @foreach ($dados as $matricula)
                @if ($i != 0)
                    <div class="page-break"></div>
                @endif
                
                <h1 style="text-align: center">FICHA INDIVIDUAL</h1>
                <h3 style="text-align: center; font-weight:normal; margin-top: -10px; text-transform:uppercase;">{{$curso->nome}} do ensino {{$curso->modalidade}}. {{$curso->calendario->nome}}, {{$curso->calendario->ano}}</h3>
                
                <p style="margin-top: 25px"><b>Estudante: </b>{{strtoupper($matricula['aluno']->nome)}}</p>
                <p style="margin-top: -8px">
                    <b>Naturalidade: </b>{{$matricula['aluno']->naturalidade}}, {{$matricula['aluno']->naturaif}}.
                    <b>Nacionalidade:</b> {{$matricula['aluno']->nacionalidade}}.
                    <b>Data de Nascimento:</b> {{date('d-m-Y', strtotime($matricula['aluno']->nascimento))}}.
                </p>
                <p style="margin-top: -8px"><b>Genitora: </b>{{$matricula['aluno']->genitora}}. <b>Genitor: </b>{{$matricula['aluno']->genitor}}.</p>
                <p style="margin-top: -8px"><b>CPF: </b> {{$matricula['aluno']->cpf}} | <b>Tel.: </b> {{$matricula['aluno']->respontel1}}</p>

                @php
                    $i = $i + 1;
                @endphp
            @endforeach
        </div>
    </main>

</body>

</html>