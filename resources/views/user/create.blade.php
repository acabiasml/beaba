@extends('principais.layout')

@section('title', 'CRIAR REGISTRO')
@section('icon', 'ni-single-02')

@section('content')

<div class="container-fluid" style="margin-top: 20px; margin-bottom: 50px">
    <h1 style="text-align: center">NOVO CADASTRO</h1> <br />

    <x:form::form class="row" method="POST" :action="route('user.store.user')">
        <div class="col-md-6">
            <x:form::input id="nome" name="nome" label="Nome completo" />
            <x:form::input name="nomesocial" label="Nome social" />
            <x:form::select name="tipo" label="Tipo: " :options="['admin' => 'Administrador', 'prof' => 'Professor', 'estud' => 'Estudante', 'apoio' => 'Apoio']" selected="estud" />
            <x:form::input id="email" type="email" name="email" label="E-mail" />
            <x:form::input id="password" type="password" name="password" label="Senha" />
            <x:form::input name="cpf" label="CPF" />
            <x:form::input name="telefone1" label="Telefone de contato 1" />
            <x:form::input name="telefone2" label="Telefone de contato 2" />
            <x:form::input name="identidade" label="Identidade" />
            <x:form::input name="identemissor" label="Órgão emissor" />
            <x:form::select name="identuf" label="Estado emissor: " :options="['AC' => 'AC', 'AL' => 'AL', 'AP' => 'AP', 'AM' => 'AM', 'BA' => 'BA', 'CE' => 'CE', 'DF' => 'DF', 'ES' => 'ES', 'GO' => 'GO', 'MA' => 'MA', 'MS' => 'MS', 'MT' => 'MT', 'MG' => 'MG', 'PA' => 'PA', 'PB' => 'PB', 'PR' => 'PR', 'PE' => 'PE', 'PI' => 'PI', 'RR' => 'RR', 'RO' => 'RO', 'RJ' => 'RJ', 'RN' => 'RN', 'RS' => 'RS', 'SC' => 'SC', 'SP' => 'SP', 'SE' => 'SE', 'TO' => 'TO']" selected="MT" />
            <x:form::input type="date" name="identexpedicao" label="Emissão da identidade" />
            <x:form::select name="nacionalidade" label="Nacionalidade: " :options="['Afeganistão'=>'Afeganistão', 'África do Sul' => 'África do Sul', 'Akrotiri' => 'Akrotiri', 'Albânia' => 'Albânia', 'Alemanha' => 'Alemanha', 'Andorra' => 'Andorra', 'Angola' => 'Angola', 'Anguila' => 'Anguila', 'Antárctida' => 'Antárctida', 'Antígua e Barbuda' => 'Antígua e Barbuda', 'Arábia Saudita' => 'Arábia Saudita', 'Arctic Ocean' => 'Arctic Ocean', 'Argélia' => 'Argélia', 'Argentina' => 'Argentina', 'Arménia' => 'Arménia', 'Aruba' => 'Aruba', 'Ashmore and Cartier Islands' => 'Ashmore and Cartier Islands', 'Atlantic Ocean' => 'Atlantic Ocean', 'Austrália' => 'Austrália', 'Áustria' => 'Áustria', 'Azerbaijão' => 'Azerbaijão', 'Baamas' => 'Baamas', 'Bangladeche' => 'Bangladeche', 'Barbados' => 'Barbados', 'Barém' => 'Barém', 'Bélgica' => 'Bélgica', 'Belize' => 'Belize', 'Benim' => 'Benim', 'Bermudas' => 'Bermudas', 'Bielorrússia' => 'Bielorrússia', 'Birmânia' => 'Birmânia', 'Bolívia' => 'Bolívia', 'Bósnia e Herzegovina' => 'Bósnia e Herzegovina', 'Botsuana' => 'Botsuana', 'Brasil' => 'Brasil', 'Brunei' => 'Brunei', 'Bulgária' => 'Bulgária', 'Burquina Faso' => 'Burquina Faso', 'Burúndi' => 'Burúndi', 'Butão' => 'Butão', 'Cabo Verde' => 'Cabo Verde', 'Camarões' => 'Camarões', 'Camboja' => 'Camboja', 'Canadá' => 'Canadá', 'Catar' => 'Catar', 'Cazaquistão' => 'Cazaquistão', 'Chade' => 'Chade', 'Chile' => 'Chile', 'China' => 'China', 'Chipre' => 'Chipre', 'Clipperton Island' => 'Clipperton Island', 'Colômbia' => 'Colômbia', 'Comores' => 'Comores', 'Congo-Brazzaville' => 'Congo-Brazzaville', 'Congo-Kinshasa' => 'Congo Kinshasa', 'Coral Sea Islands' => 'Coral Sea Islands', 'Coreia do Norte' => 'Coreia do Norte', 'Coreia do Sul' => 'Coreia do Sul', 'Costa do Marfim' => 'Costa do Marfim', 'Costa Rica' => 'Costa Rica', 'Croácia' => 'Croácia', 'Cuba' => 'Cuba', 'Curacao' => 'Curacao', 'Dhekelia' => 'Dhekelia', 'Dinamarca' => 'Dinamarca', 'Domínica' => 'Domínica', 'Egito' => 'Egito', 'Emirados Árabes Unidos' => 'Emirados Árabes Unidos', 'Equador' => 'Equador', 'Eritreia' => 'Eritreia', 'Eslováquia' => 'Eslováquia', 'Eslovênia' => 'Eslovênia', 'Espanha' => 'Espanha', 'Estados Unidos' => 'Estados Unidos', 'Estônia' => 'Estônia', 'Etiópia' => 'Etiópia', 'Faroé' => 'Faroé', 'Fiji' => 'Fiji', 'Filipinas' => 'Filipinas', 'Finlândia' => 'Finlândia', 'França' => 'França', 'Gabão' => 'Gabão', 'Gâmbia' => 'Gâmbia', 'Gana' => 'Gana', 'Gaza Strip' => 'Gaza Strip', 'Geórgia' => 'Geórgia', 'Geórgia do Sul e Sandwich do Sul' => 'Geórgia do Sul e Sandwich do Sul', 'Gibraltar' => 'Gibraltar', 'Granada' => 'Granada', 'Grécia' => 'Grécia', 'Groenlândia' => 'Groenlândia', 'Guame' => 'Guame', 'Guatemala' => 'Guatemala', 'Guernsey' => 'Guernsey', 'Guiana' => 'Guiana', 'Guiné' => 'Guiné', 'Guiné Equatorial' => 'Guiné Equatorial', 'Guiné-Bissau' => 'Guiné-Bissau', 'Haiti' => 'Haiti', 'Honduras' => 'Honduras', 'Hong Kong' => 'Hong Kong', 'Hungria' => 'Hungria', 'Iémen' => 'Iémen', 'Ilha Bouvet' => 'Ilha Bouvet', 'Ilha do Natal' => 'Ilha do Natal', 'Ilha Norfolk' => 'Ilha Norfolk', 'Ilhas Caimão' => 'Ilhas Caimão', 'Ilhas Cook' => 'Ilhas Cook', 'Ilhas dos Cocos' => 'Ilhas dos Cocos', 'Ilhas Falkland' => 'Ilhas Falkland', 'Ilhas Heard e McDonald' => 'Ilhas Heard e McDonald', 'Ilhas Marshall' => 'Ilhas Marshall', 'Ilhas Salomão' => 'Ilhas Salomão', 'Ilhas Turcas e Caicos' => 'Ilhas Turcas e Caicos', 'Ilhas Virgens Americanas' => 'Ilhas Virgens Americanas', 'Ilhas Virgens Britânicas' => 'Ilhas Virgens Britânicas', 'Índia' => 'Índia', 'Indian Ocean' => 'Indian Ocean', 'Indonésia' => 'Indonésia', 'Irão' => 'Irão', 'Iraque' => 'Iraque', 'Irlanda' => 'Irlanda', 'Islândia' => 'Islândia', 'Israel' => 'Israel', 'Itália' => 'Itália', 'Jamaica' => 'Jamaica', 'Jan Mayen' => 'Jan Mayen', 'Japão' => 'Japão', 'Jersey' => 'Jersey', 'Jibuti' => 'Jibuti', 'Jordânia' => 'Jordânia', 'Kosovo' => 'Kosovo', 'Kuwait' => 'Kuwait', 'Laos' => 'Laos', 'Lesoto' => 'Lesoto', 'Letônia' => 'Letônia', 'Líbano' => 'Líbano', 'Libéria' => 'Libéria', 'Líbia' => 'Líbia', 'Listenstaine' => 'Listenstaine', 'Lituânia' => 'Lituânia', 'Luxemburgo' => 'Luxemburgo', 'Macau' => 'Macau', 'Macedônia' => 'Macedônia', 'Madagascar' => 'Madagascar', 'Malásia' => 'Malásia', 'Malávi' => 'Malávi', 'Maldivas' => 'Maldivas', 'Mali' => 'Mali', 'Malta' => 'Malta', 'Man, Isle of' => 'Man, Isle of', 'Marianas do Norte' => 'Marianas do Norte', 'Marrocos' => 'Marrocos', 'Maurícia' => 'Maurícia', 'Mauritânia' => 'Mauritânia', 'México' => 'México', 'Micronésia' => 'Micronésia', 'Moçambique' => 'Moçambique', 'Moldávia' => 'Moldávia', 'Mônaco' => 'Mônaco', 'Mongólia' => 'Mongólia', 'Monserrate' => 'Monserrate', 'Montenegro' => 'Montenegro', 'Mundo' => 'Mundo', 'Namíbia' => 'Namíbia', 'Nauru' => 'Nauru', 'Navassa Island' => 'Navassa Island', 'Nepal' => 'Nepal', 'Nicarágua' => 'Nicarágua', 'Níger' => 'Níger', 'Nigéria' => 'Nigéria', 'Niue' => 'Niue', 'Noruega' => 'Noruega', 'Nova Caledônia' => 'Nova Caledônia', 'Nova Zelândia' => 'Nova Zelândia', 'Omã' => 'Omã', 'Pacific Ocean' => 'Pacific Ocean', 'Países Baixos' => 'Países Baixos', 'Palau' => 'Palau', 'Panamá' => 'Panamá', 'Papua-Nova Guiné' => 'Papua-Nova Guiné', 'Paquistão' => 'Paquistão', 'Paracel Islands' => 'Paracel Islands', 'Paraguai' => 'Paraguai', 'Peru' => 'Peru', 'Pitcairn' => 'Pitcairn', 'Polinésia Francesa' => 'Polinésia Francesa', 'Polônia' => 'Polônia', 'Porto Rico' => 'Porto Rico', 'Portugal' => 'Portugal', 'Quênia' => 'Quênia', 'Quirguizistão' => 'Quirguizistão', 'Quiribáti' => 'Quiribáti', 'Reino Unido' => 'Reino Unido', 'República Centro-Africana' => 'República Centro-Africana', 'República Dominicana' => 'República Dominicana', 'Romênia' => 'Romênia', 'Ruanda' => 'Ruanda', 'Rússia' => 'Rússia', 'Salvador' => 'Salvador', 'Samoa' => 'Samoa', 'Samoa Americana' => 'Samoa Americana', 'Santa Helena' => 'Santa Helena', 'Santa Lúcia' => 'Santa Lúcia', 'São Bartolomeu' => 'São Bartolomeu', 'São Cristóvão e Neves' => 'São Cristóvão e Neves', 'São Marinho' => 'São Marinho', 'São Martinho' => 'São Martinho', 'São Pedro e Miquelon' => 'São Pedro e Miquelon', 'São Tomé e Príncipe' => 'São Tomé e Príncipe', 'São Vicente e Granadinas' => 'São Vicente e Granadinas', 'Sara Ocidental' => 'Sara Ocidental', 'Seicheles' => 'Seicheles', 'Senegal' => 'Senegal', 'Serra Leoa' => 'Serra Leoa', 'Sérvia' => 'Sérvia', 'Singapura' => 'Singapura', 'Sint Maarten' => 'Sint Maarten', 'Síria' => 'Síria', 'Somália' => 'Somália', 'Southern Ocean' => 'Southern Ocean', 'Spratly Islands' => 'Spratly Islands', 'Sri Lanca' => 'Sri Lanca', 'Suazilândia' => 'Suazilândia', 'Sudão' => 'Sudão', 'Sudão do Sul' => 'Sudão do Sul', 'Suécia' => 'Suécia', 'Suíça' => 'Suíça', 'Suriname' => 'Suriname', 'Svalbard e Jan Mayen' => 'Svalbard e Jan Mayen', 'Tailândia' => 'Tailândia', 'Taiwan' => 'Taiwan', 'Tajiquistão' => 'Tajiquistão', 'Tanzânia' => 'Tanzânia', 'Território Britânico do Oceano Índico' => 'Território Britânico do Oceano Índico', 'Territórios Austrais Franceses' => 'Territórios Austrais Franceses', 'Timor Leste' => 'Timor Leste', 'Togo' => 'Togo', 'Tokelau' => 'Tokelau', 'Tonga' => 'Tonga', 'Trindade e Tobago' => 'Trindade e Tobago', 'Tunísia' => 'Tunísia', 'Turquemenistão' => 'Turquemenistão', 'Turquia' => 'Turquia', 'Tuvalu' => 'Tuvalu', 'Ucrânia' => 'Ucrânia', 'Uganda' => 'Uganda', 'União Europeia' => 'União Europeia', 'Uruguai' => 'Uruguai', 'Usbequistão' => 'Usbequistão', 'Vanuatu' => 'Vanuatu', 'Vaticano' => 'Vaticano', 'Venezuela' => 'Venezuela', 'Vietã' => 'Vietã', 'Wake Island' => 'Wake Island', 'Wallis e Futuna' => 'Wallis e Futuna', 'West Bank' => 'West Bank', 'Zâmbia' => 'Zâmbia', 'Zimbabué' => 'Zimbabué']" selected="Brasil" />
            <x:form::input name="naturalidade" label="Naturalidade" />
            <x:form::select name="naturaif" label="Estado de naturalidade: " :options="['AC' => 'AC', 'AL' => 'AL', 'AP' => 'AP', 'AM' => 'AM', 'BA' => 'BA', 'CE' => 'CE', 'DF' => 'DF', 'ES' => 'ES', 'GO' => 'GO', 'MA' => 'MA', 'MS' => 'MS', 'MT' => 'MT', 'MG' => 'MG', 'PA' => 'PA', 'PB' => 'PB', 'PR' => 'PR', 'PE' => 'PE', 'PI' => 'PI', 'RR' => 'RR', 'RO' => 'RO', 'RJ' => 'RJ', 'RN' => 'RN', 'RS' => 'RS', 'SC' => 'SC', 'SP' => 'SP', 'SE' => 'SE', 'TO' => 'TO']" selected="MT" />
            <x:form::input name="docextrangeiro" label="Documento de estrangeiro" />
            <x:form::input name="certidao" label="Certidão de nascimento" />
            <x:form::input name="certifolha" label="Folha da certidão" />
            <x:form::input name="certilivro" label="Livro da certidão" />
            <x:form::input name="certiemissao" label="Data da certidão" />
            <x:form::input name="cartaosus" label="Cartão SUS" />
            <x:form::input name="nis" label="NIS" />
            <x:form::select name="tiposangue" label="Tipo Sanguíneo: " :options="['A+' => 'A+', 'A-' => 'A-', 'B+' => 'B+', 'B-' => 'B-', 'AB+' => 'AB+', 'AB-' => 'AB-', 'O+' => 'O+', 'O-' => 'O-']" selected="O+" />
            <x:form::textarea label="Observações nutricionais" name="nutricionais" />
            <x:form::input name="habilitacao" label="Habilitação" />
            <x:form::input name="habilvalidade" label="Validade da habilitação" />
            <x:form::input name="habilcategoria" label="Categoria de habilitação" />
        </div>
        <div class="col-md-6">
            <x:form::select name="sexo" label="Sexo: " :options="['fem' => 'Feminino', 'mas' => 'Masculino']" selected="fem" />
            <x:form::select name="gemeo" label="Gêmeo: " :options="['sim' => 'Sim', 'nao' => 'Não']" selected="nao" />
            <x:form::select name="cor" label="Cor (autodeclaração): " :options="['branca' => 'Branca', 'preta' => 'Preta', 'parda' => 'Parda', 'amarela' => 'Amarela', 'indigena' => 'Indígena']" selected="preta" />
            <x:form::input name="inep" label="Código INEP" />
            <x:form::input type="date" name="nascimento" label="Data de nascimento" />
            <x:form::input name="genitora" label="Nome da genitora" />
            <x:form::input name="genitor" label="Nome do genitor" />
            <x:form::input name="responsavel" label="Nome do responsável" />
            <x:form::input name="responcpf" label="CPF do responsável" />
            <x:form::input name="respontel1" label="Telefone 1 do responsável" />
            <x:form::input name="respontel2" label="Telefone 2 do responsável" />
            <x:form::input name="endereco" label="Logradouro" />
            <x:form::input name="endnumero" label="Número do logradouro" />
            <x:form::input name="endbairro" label="Bairro" />
            <x:form::input name="endcidade" label="Cidade" />
            <x:form::select name="enduf" label="Estado do endereço: " :options="['AC' => 'AC', 'AL' => 'AL', 'AP' => 'AP', 'AM' => 'AM', 'BA' => 'BA', 'CE' => 'CE', 'DF' => 'DF', 'ES' => 'ES', 'GO' => 'GO', 'MA' => 'MA', 'MS' => 'MS', 'MT' => 'MT', 'MG' => 'MG', 'PA' => 'PA', 'PB' => 'PB', 'PR' => 'PR', 'PE' => 'PE', 'PI' => 'PI', 'RR' => 'RR', 'RO' => 'RO', 'RJ' => 'RJ', 'RN' => 'RN', 'RS' => 'RS', 'SC' => 'SC', 'SP' => 'SP', 'SE' => 'SE', 'TO' => 'TO']" selected="MT" />
            <x:form::input name="endcomplemento" label="Complemento do endereço" />
            <x:form::input name="endcep" label="CEP" />
            <x:form::input name="titulo" label="Título de eleitor" />
            <x:form::input name="titulozona" label="Zona do título de eleitor" />
            <x:form::input name="titulosessao" label="Sessão do título de eleitor" />
            <x:form::select name="titulouf" label="Estado do título: " :options="['AC' => 'AC', 'AL' => 'AL', 'AP' => 'AP', 'AM' => 'AM', 'BA' => 'BA', 'CE' => 'CE', 'DF' => 'DF', 'ES' => 'ES', 'GO' => 'GO', 'MA' => 'MA', 'MS' => 'MS', 'MT' => 'MT', 'MG' => 'MG', 'PA' => 'PA', 'PB' => 'PB', 'PR' => 'PR', 'PE' => 'PE', 'PI' => 'PI', 'RR' => 'RR', 'RO' => 'RO', 'RJ' => 'RJ', 'RN' => 'RN', 'RS' => 'RS', 'SC' => 'SC', 'SP' => 'SP', 'SE' => 'SE', 'TO' => 'TO']" selected="MT" />
            <x:form::input name="docmilitar" label="Documento militar" />
            <x:form::input name="carteiratrab" label="Carteira de trabalho" />
            <x:form::input name="banco" label="Banco" />
            <x:form::input name="agencia" label="Agência" />
            <x:form::input name="conta" label="Conta" />
        </div>
        <div class="col-12 mt-2">
            <x:form::button.link class="btn-secondary me-3" href="{{route('pessoas')}}">{{ __('Cancel') }}</x:form::button.link>
            <x:form::button.submit>Registrar</x:form::button.submit>
        </div>
    </x:form::form>
</div>

<script>
    $(document).ready(function() {
        $(":submit").on("click", function(e) {
            e.preventDefault();

            nome = $.trim($("#nome").val());
            email = $.trim($("#email").val());
            password = $.trim($("#password").val());

            if (nome != "" && email != "" && password != "") {
                $("form:first").submit();
            } else {
                alert("Existem campos a serem preenchidos.");
            }

            return false;
        });
    });
</script>

@endsection