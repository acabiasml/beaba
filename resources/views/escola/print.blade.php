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
    </style>
</head>

<body>

    <header>
        <div style="clear:both; position:relative;">
            <div style="position:absolute; left:0pt; width:200pt;">
                <img src="{{public_path('assets/img/ctjj.jpg')}}" style="height: 100px; margin-top: 5px">
            </div>
            <div style="margin-left:100pt">
                <p style="font-size: 14pt"><b>Centro Técnico Juvenil de Jarudore</b></p>
                <p style="margin-top: -10pt">Tel.: (66) 3432-1093. E-mail: ctjj.mt@gmail.com</p>
                <p style="margin-top: -10pt">https://www.ctjj.org</p>
            </div>
        </div>
    </header>

    @php
    $agora = new DateTime(null, new DateTimeZone('America/Cuiaba'));
    $funda = new DateTime($escola->fundacao);
    @endphp

    <footer style="margin-top: 10pt;">
        Ficha gerada para impressão por: {{Auth::user()->nome}}, em {{$agora->format('d/m/Y')}} às {{$agora->format('H:i')}}.
        <hr style="margin-bottom: -15px" />
        <p style="text-align: center">CTJJ. Endereço de Correspondência: Caixa Postal 338. CEP 78700-970. Rondonópolis-MT.</p>
    </footer>

    <main>
        <div style="text-align: center; font-size: 14pt; margin-bottom: -5pt">
            <b>Ficha Cadastral da Escola</b>
        </div>
        <hr />
        <div style="clear:both; position:relative">
            <div style="position:absolute; left:0pt; width: 350px">
                <p><b>Nome:</b> <b>{{$escola->nome}}</b></p>
                <p><b>Fundação:</b> {{$funda->format('d/m/Y')}}</p>
                <p><b>Atos de autorização:</b> {{$escola->info}}</p>
                <p><b>Razão social:</b> {{$escola->razao}}</p>
                <p><b>CNPJ:</b> {{$escola->cnpj}}</p>
                <p><b>Telefone:</b> {{$escola->telefone}}</p>
                <p><b>Email:</b> {{$escola->email}}</p>
                <p><b>Site:</b> {{$escola->site}}</p>
            </div>
            <div style="margin-left:360px">
                <<p><b>Direção:</b> {{$diretor}}</p>
                    <p><b>Coordenação:</b> {{$coordenador}}</p>
                    <p><b>Secretaria:</b> {{$secretario}}</p>
                    <p><b>Endereço:</b> {{$escola->endereco}}, {{$escola->numero}}, bairro {{$escola->bairro}}, {{$escola->cidade}}-{{$escola->estado}}, CEP {{$escola->cep}}</p>
            </div>
        </div>
    </main>

</body>

</html>