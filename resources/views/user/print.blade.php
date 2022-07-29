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
    $idade = 0;
    $mes = 0;
    $dia = 0;
    $ano = 0;

    if($usuario->nascimento !=null){
    list($ano, $mes, $dia) = explode('-', $usuario->nascimento);
    $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
    $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
    $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
    }

    @endphp

    <footer style="margin-top: 10pt;">
        Ficha gerada para impressão por: {{Auth::user()->nome}}, em {{$agora->format('d/m/Y')}} às {{$agora->format('H:i')}}.
        <hr style="margin-bottom: -15px" />
        <p style="text-align: center">CTJJ. Endereço de Correspondência: Caixa Postal 338. CEP 78700-970. Rondonópolis-MT.</p>
    </footer>

    <main>
        <div style="text-align: center; font-size: 14pt; margin-bottom: -5pt">
            <b>Ficha Cadastral</b>
        </div>
        <hr />
        <div style="clear:both; position:relative;">
            <div style="position:absolute; left:0pt">
                <p><b>Nome: {{$usuario->nome}}</b></p>
                <p><b>Nome social:</b> {{$usuario->nomesocial}}</p>
                <p><b>E-mail:</b> {{$usuario->email}}</p>
            </div>
            <div style="margin-left:400pt">
                <p><b>ID:</b> {{$usuario->id}}</p>
                <p><b>Sexo:</b> {{$usuario->sexo}}</p>
                <p><b>Idade:</b> {{$idade}} anos</p>
            </div>
        </div>
        <div style="clear:both; position:relative;">
            <div style="position:absolute; left:0pt; width: 400px">
                <p><b>CPF:</b> {{$usuario->cpf}}</p>
                <p><b>Genitora:</b> {{$usuario->genitora}}</p>
                <p><b>Genitor:</b> {{$usuario->genitor}}</p>
                <p><b>Responsável:</b> {{$usuario->responsavel}}</p>
                <p><b>CPF do responsável:</b> {{$usuario->responcpf}}</p>
                <p><b>Endereço:</b> {{$usuario->endereco}}, {{$usuario->endnumero}}, bairro {{$usuario->endbairro}}, {{$usuario->endcidade}} - {{$usuario->enduf}}, CEP {{$usuario->endcep}}, {{$usuario->endcomplemento}}</p>
            </div>
            <div style="margin-left:320pt">
                <p><b>Cor (autodeclarado):</b> {{$usuario->cor}}</p>
                <p><b>Código INEP:</b> {{$usuario->inep}}</p>
                <p><b>Data de nascimento:</b> {{$dia."/".$mes."/".$ano}}</p>
                <p><b>Telefone(s):</b> {{$usuario->telefone1}}, {{$usuario->telefone2}}, {{$usuario->respontel2}}, {{$usuario->respontel1}}</p>
                <p><b>NIS:</b> {{$usuario->nis}}</p>
                <p><b>Tipo sanguíneo:</b> {{$usuario->tiposangue}}</p>
            </div>
        </div>
        <div style="clear:both; position:relative">
            <div style="position:absolute; left:0pt; width: 350px">
                <p><b>Nacionalidade:</b> {{$usuario->nacionalidade}}</p>
                <p><b>Naturalidade:</b> {{$usuario->naturalidade}}, {{$usuario->naturaif}}</p>
                <p><b>Identidade:</b> {{$usuario->identidade}}, {{$usuario->identemissor}}-{{$usuario->identuf}}, expedido em {{$usuario->identemissao}}</p>
                <p><b>Documento extrangeiro:</b> {{$usuario->docextrangeiro}}</p>
                <p><b>Necessidades nutricionais:</b> {{$usuario->nutricionais}}</p>
                <p><b>Habilitação:</b> {{$usuario->habilitacao}}, categoria {{$usuario->habilcategoria}}, validade {{$usuario->habilvalidade}}</p>
            </div>
            <div style="margin-left:360px">
                <p><b>Certidão</b> {{$usuario->certidao}}, folha {{$usuario->certifolha}}, livro {{$usuario->certilivro}}, emitido em {{$usuario->certiemissao}}</p>
                <p><b>Título de eleitor</b> {{$usuario->titulo}}, zona {{$usuario->titulozona}}, sessao {{$usuario->titulosessao}}, UF {{$usuario->titulouf}}</p>
                <p><b>Documento militar:</b> {{$usuario->docmilitar}}</p>
                <p><b>Cartão SUS:</b> {{$usuario->cartaosus}}</p>
                <p><b>Conta bancária:</b> {{$usuario->banco}}, agência {{$usuario->agencia}}, conta {{$usuario->conta}}</p>
                <p><b>É gêmeo?</b> {{$usuario->gemeo}}</p>
            </div>
        </div>
    </main>

</body>

</html>