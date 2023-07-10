@extends('principais.layout')

@section('title', 'EDITAR CADASTRO')
@section('icon', 'ni-single-02')

@section('content')

<a href="{{route('home')}}">Home</a> >> Pessoas
<br/><br/>
<h1>Editando</h1>

<div class="container-fluid" style="margin-top: 20px; margin-bottom: 50px">

    <x:form::form :bind="$usuario" class="row" method="POST" :action="route('user.update.user')">
        <div class="col-md-6">
            <x:form::input type="hidden" name="id" />
            <x:form::input type="hidden" name="codigo" />
            <x:form::input id="nome" name="nome" label="Nome Completo: " :placeholder="false"/>
            <x:form::input name="nomesocial" label="Nome Social: " :placeholder="false"/>
            <x:form::select name="tipo" label="Tipo: " :options="['admin' => 'Administrador', 'prof' => 'Professor', 'estud' => 'Estudante', 'apoio' => 'Apoio', 'bibli' => 'Biblioteca']" />
            <x:form::input id="email" type="email" name="email" label="E-mail: " :placeholder="false"/>
            <x:form::input id="password" type="password" name="password" label="Senha: " :placeholder="false"/>
            <x:form::input name="cpf" class="cpf" label="Número do CPF: " :placeholder="false"/>
            <x:form::input name="telefone1" class="phone" label="Telefone de Contato (1): " :placeholder="false"/>
            <x:form::input name="telefone2" class="phone" label="Telefone de Contato (2)" :placeholder="false"/>
            <x:form::input name="identidade" label="Número do RG (identidade): " :placeholder="false"/>
            <x:form::input name="identemissor" label="Órgão Emissor do RG: " :placeholder="false"/>
            <x:form::select name="identuf" label="Estado Emissor: " :options="['AC' => 'AC', 'AL' => 'AL', 'AP' => 'AP', 'AM' => 'AM', 'BA' => 'BA', 'CE' => 'CE', 'DF' => 'DF', 'ES' => 'ES', 'GO' => 'GO', 'MA' => 'MA', 'MS' => 'MS', 'MT' => 'MT', 'MG' => 'MG', 'PA' => 'PA', 'PB' => 'PB', 'PR' => 'PR', 'PE' => 'PE', 'PI' => 'PI', 'RR' => 'RR', 'RO' => 'RO', 'RJ' => 'RJ', 'RN' => 'RN', 'RS' => 'RS', 'SC' => 'SC', 'SP' => 'SP', 'SE' => 'SE', 'TO' => 'TO']" />
            <x:form::input type="date" name="identexpedicao" label="Data de Emissão do RG: " :placeholder="false"/>
            <x:form::select name="nacionalidade" label="Nacionalidade: " :options="['Afeganistão'=>'Afeganistão', 'África do Sul' => 'África do Sul', 'Akrotiri' => 'Akrotiri', 'Albânia' => 'Albânia', 'Alemanha' => 'Alemanha', 'Andorra' => 'Andorra', 'Angola' => 'Angola', 'Anguila' => 'Anguila', 'Antárctida' => 'Antárctida', 'Antígua e Barbuda' => 'Antígua e Barbuda', 'Arábia Saudita' => 'Arábia Saudita', 'Arctic Ocean' => 'Arctic Ocean', 'Argélia' => 'Argélia', 'Argentina' => 'Argentina', 'Arménia' => 'Arménia', 'Aruba' => 'Aruba', 'Ashmore and Cartier Islands' => 'Ashmore and Cartier Islands', 'Atlantic Ocean' => 'Atlantic Ocean', 'Austrália' => 'Austrália', 'Áustria' => 'Áustria', 'Azerbaijão' => 'Azerbaijão', 'Baamas' => 'Baamas', 'Bangladeche' => 'Bangladeche', 'Barbados' => 'Barbados', 'Barém' => 'Barém', 'Bélgica' => 'Bélgica', 'Belize' => 'Belize', 'Benim' => 'Benim', 'Bermudas' => 'Bermudas', 'Bielorrússia' => 'Bielorrússia', 'Birmânia' => 'Birmânia', 'Bolívia' => 'Bolívia', 'Bósnia e Herzegovina' => 'Bósnia e Herzegovina', 'Botsuana' => 'Botsuana', 'Brasil' => 'Brasil', 'Brunei' => 'Brunei', 'Bulgária' => 'Bulgária', 'Burquina Faso' => 'Burquina Faso', 'Burúndi' => 'Burúndi', 'Butão' => 'Butão', 'Cabo Verde' => 'Cabo Verde', 'Camarões' => 'Camarões', 'Camboja' => 'Camboja', 'Canadá' => 'Canadá', 'Catar' => 'Catar', 'Cazaquistão' => 'Cazaquistão', 'Chade' => 'Chade', 'Chile' => 'Chile', 'China' => 'China', 'Chipre' => 'Chipre', 'Clipperton Island' => 'Clipperton Island', 'Colômbia' => 'Colômbia', 'Comores' => 'Comores', 'Congo-Brazzaville' => 'Congo-Brazzaville', 'Congo-Kinshasa' => 'Congo Kinshasa', 'Coral Sea Islands' => 'Coral Sea Islands', 'Coreia do Norte' => 'Coreia do Norte', 'Coreia do Sul' => 'Coreia do Sul', 'Costa do Marfim' => 'Costa do Marfim', 'Costa Rica' => 'Costa Rica', 'Croácia' => 'Croácia', 'Cuba' => 'Cuba', 'Curacao' => 'Curacao', 'Dhekelia' => 'Dhekelia', 'Dinamarca' => 'Dinamarca', 'Domínica' => 'Domínica', 'Egito' => 'Egito', 'Emirados Árabes Unidos' => 'Emirados Árabes Unidos', 'Equador' => 'Equador', 'Eritreia' => 'Eritreia', 'Eslováquia' => 'Eslováquia', 'Eslovênia' => 'Eslovênia', 'Espanha' => 'Espanha', 'Estados Unidos' => 'Estados Unidos', 'Estônia' => 'Estônia', 'Etiópia' => 'Etiópia', 'Faroé' => 'Faroé', 'Fiji' => 'Fiji', 'Filipinas' => 'Filipinas', 'Finlândia' => 'Finlândia', 'França' => 'França', 'Gabão' => 'Gabão', 'Gâmbia' => 'Gâmbia', 'Gana' => 'Gana', 'Gaza Strip' => 'Gaza Strip', 'Geórgia' => 'Geórgia', 'Geórgia do Sul e Sandwich do Sul' => 'Geórgia do Sul e Sandwich do Sul', 'Gibraltar' => 'Gibraltar', 'Granada' => 'Granada', 'Grécia' => 'Grécia', 'Groenlândia' => 'Groenlândia', 'Guame' => 'Guame', 'Guatemala' => 'Guatemala', 'Guernsey' => 'Guernsey', 'Guiana' => 'Guiana', 'Guiné' => 'Guiné', 'Guiné Equatorial' => 'Guiné Equatorial', 'Guiné-Bissau' => 'Guiné-Bissau', 'Haiti' => 'Haiti', 'Honduras' => 'Honduras', 'Hong Kong' => 'Hong Kong', 'Hungria' => 'Hungria', 'Iémen' => 'Iémen', 'Ilha Bouvet' => 'Ilha Bouvet', 'Ilha do Natal' => 'Ilha do Natal', 'Ilha Norfolk' => 'Ilha Norfolk', 'Ilhas Caimão' => 'Ilhas Caimão', 'Ilhas Cook' => 'Ilhas Cook', 'Ilhas dos Cocos' => 'Ilhas dos Cocos', 'Ilhas Falkland' => 'Ilhas Falkland', 'Ilhas Heard e McDonald' => 'Ilhas Heard e McDonald', 'Ilhas Marshall' => 'Ilhas Marshall', 'Ilhas Salomão' => 'Ilhas Salomão', 'Ilhas Turcas e Caicos' => 'Ilhas Turcas e Caicos', 'Ilhas Virgens Americanas' => 'Ilhas Virgens Americanas', 'Ilhas Virgens Britânicas' => 'Ilhas Virgens Britânicas', 'Índia' => 'Índia', 'Indian Ocean' => 'Indian Ocean', 'Indonésia' => 'Indonésia', 'Irão' => 'Irão', 'Iraque' => 'Iraque', 'Irlanda' => 'Irlanda', 'Islândia' => 'Islândia', 'Israel' => 'Israel', 'Itália' => 'Itália', 'Jamaica' => 'Jamaica', 'Jan Mayen' => 'Jan Mayen', 'Japão' => 'Japão', 'Jersey' => 'Jersey', 'Jibuti' => 'Jibuti', 'Jordânia' => 'Jordânia', 'Kosovo' => 'Kosovo', 'Kuwait' => 'Kuwait', 'Laos' => 'Laos', 'Lesoto' => 'Lesoto', 'Letônia' => 'Letônia', 'Líbano' => 'Líbano', 'Libéria' => 'Libéria', 'Líbia' => 'Líbia', 'Listenstaine' => 'Listenstaine', 'Lituânia' => 'Lituânia', 'Luxemburgo' => 'Luxemburgo', 'Macau' => 'Macau', 'Macedônia' => 'Macedônia', 'Madagascar' => 'Madagascar', 'Malásia' => 'Malásia', 'Malávi' => 'Malávi', 'Maldivas' => 'Maldivas', 'Mali' => 'Mali', 'Malta' => 'Malta', 'Man, Isle of' => 'Man, Isle of', 'Marianas do Norte' => 'Marianas do Norte', 'Marrocos' => 'Marrocos', 'Maurícia' => 'Maurícia', 'Mauritânia' => 'Mauritânia', 'México' => 'México', 'Micronésia' => 'Micronésia', 'Moçambique' => 'Moçambique', 'Moldávia' => 'Moldávia', 'Mônaco' => 'Mônaco', 'Mongólia' => 'Mongólia', 'Monserrate' => 'Monserrate', 'Montenegro' => 'Montenegro', 'Mundo' => 'Mundo', 'Namíbia' => 'Namíbia', 'Nauru' => 'Nauru', 'Navassa Island' => 'Navassa Island', 'Nepal' => 'Nepal', 'Nicarágua' => 'Nicarágua', 'Níger' => 'Níger', 'Nigéria' => 'Nigéria', 'Niue' => 'Niue', 'Noruega' => 'Noruega', 'Nova Caledônia' => 'Nova Caledônia', 'Nova Zelândia' => 'Nova Zelândia', 'Omã' => 'Omã', 'Pacific Ocean' => 'Pacific Ocean', 'Países Baixos' => 'Países Baixos', 'Palau' => 'Palau', 'Panamá' => 'Panamá', 'Papua-Nova Guiné' => 'Papua-Nova Guiné', 'Paquistão' => 'Paquistão', 'Paracel Islands' => 'Paracel Islands', 'Paraguai' => 'Paraguai', 'Peru' => 'Peru', 'Pitcairn' => 'Pitcairn', 'Polinésia Francesa' => 'Polinésia Francesa', 'Polônia' => 'Polônia', 'Porto Rico' => 'Porto Rico', 'Portugal' => 'Portugal', 'Quênia' => 'Quênia', 'Quirguizistão' => 'Quirguizistão', 'Quiribáti' => 'Quiribáti', 'Reino Unido' => 'Reino Unido', 'República Centro-Africana' => 'República Centro-Africana', 'República Dominicana' => 'República Dominicana', 'Romênia' => 'Romênia', 'Ruanda' => 'Ruanda', 'Rússia' => 'Rússia', 'Salvador' => 'Salvador', 'Samoa' => 'Samoa', 'Samoa Americana' => 'Samoa Americana', 'Santa Helena' => 'Santa Helena', 'Santa Lúcia' => 'Santa Lúcia', 'São Bartolomeu' => 'São Bartolomeu', 'São Cristóvão e Neves' => 'São Cristóvão e Neves', 'São Marinho' => 'São Marinho', 'São Martinho' => 'São Martinho', 'São Pedro e Miquelon' => 'São Pedro e Miquelon', 'São Tomé e Príncipe' => 'São Tomé e Príncipe', 'São Vicente e Granadinas' => 'São Vicente e Granadinas', 'Sara Ocidental' => 'Sara Ocidental', 'Seicheles' => 'Seicheles', 'Senegal' => 'Senegal', 'Serra Leoa' => 'Serra Leoa', 'Sérvia' => 'Sérvia', 'Singapura' => 'Singapura', 'Sint Maarten' => 'Sint Maarten', 'Síria' => 'Síria', 'Somália' => 'Somália', 'Southern Ocean' => 'Southern Ocean', 'Spratly Islands' => 'Spratly Islands', 'Sri Lanca' => 'Sri Lanca', 'Suazilândia' => 'Suazilândia', 'Sudão' => 'Sudão', 'Sudão do Sul' => 'Sudão do Sul', 'Suécia' => 'Suécia', 'Suíça' => 'Suíça', 'Suriname' => 'Suriname', 'Svalbard e Jan Mayen' => 'Svalbard e Jan Mayen', 'Tailândia' => 'Tailândia', 'Taiwan' => 'Taiwan', 'Tajiquistão' => 'Tajiquistão', 'Tanzânia' => 'Tanzânia', 'Território Britânico do Oceano Índico' => 'Território Britânico do Oceano Índico', 'Territórios Austrais Franceses' => 'Territórios Austrais Franceses', 'Timor Leste' => 'Timor Leste', 'Togo' => 'Togo', 'Tokelau' => 'Tokelau', 'Tonga' => 'Tonga', 'Trindade e Tobago' => 'Trindade e Tobago', 'Tunísia' => 'Tunísia', 'Turquemenistão' => 'Turquemenistão', 'Turquia' => 'Turquia', 'Tuvalu' => 'Tuvalu', 'Ucrânia' => 'Ucrânia', 'Uganda' => 'Uganda', 'União Europeia' => 'União Europeia', 'Uruguai' => 'Uruguai', 'Usbequistão' => 'Usbequistão', 'Vanuatu' => 'Vanuatu', 'Vaticano' => 'Vaticano', 'Venezuela' => 'Venezuela', 'Vietã' => 'Vietã', 'Wake Island' => 'Wake Island', 'Wallis e Futuna' => 'Wallis e Futuna', 'West Bank' => 'West Bank', 'Zâmbia' => 'Zâmbia', 'Zimbabué' => 'Zimbabué']" />
            <x:form::input name="naturalidade" label="Cidade de Naturalidade: " :placeholder="false"/>
            <x:form::select name="naturaif" label="Estado de Naturalidade: " :options="['AC' => 'AC', 'AL' => 'AL', 'AP' => 'AP', 'AM' => 'AM', 'BA' => 'BA', 'CE' => 'CE', 'DF' => 'DF', 'ES' => 'ES', 'GO' => 'GO', 'MA' => 'MA', 'MS' => 'MS', 'MT' => 'MT', 'MG' => 'MG', 'PA' => 'PA', 'PB' => 'PB', 'PR' => 'PR', 'PE' => 'PE', 'PI' => 'PI', 'RR' => 'RR', 'RO' => 'RO', 'RJ' => 'RJ', 'RN' => 'RN', 'RS' => 'RS', 'SC' => 'SC', 'SP' => 'SP', 'SE' => 'SE', 'TO' => 'TO']" />
            <x:form::input name="docextrangeiro" label="Documento de Estrangeiro: " :placeholder="false"/>
            <x:form::input name="certidao" label="Número da Certidão de Nascimento: " :placeholder="false"/>
            <x:form::input name="certifolha" label="Folha da Certidão de Nascimento: " :placeholder="false"/>
            <x:form::input name="certilivro" label="Livro da Certidão de Nascimento: " :placeholder="false"/>
            <x:form::input name="certiemissao" label="Data da Certidão de Nascimento: " :placeholder="false"/>
            <x:form::input name="cartaosus" label="Cartão SUS: " :placeholder="false" :placeholder="false"/>
            <x:form::input name="nis" label="NIS: " :placeholder="false"/>
            <x:form::select name="tiposangue" label="Tipo Sanguíneo: " :options="['A+' => 'A+', 'A-' => 'A-', 'B+' => 'B+', 'B-' => 'B-', 'AB+' => 'AB+', 'AB-' => 'AB-', 'O+' => 'O+', 'O-' => 'O-']" />
            <x:form::textarea label="Observações Nutricionais: " :placeholder="false" name="nutricionais" />
            <x:form::input name="habilitacao" label="Número da Habilitação de Motorista: " :placeholder="false"/>
            <x:form::input name="habilvalidade" label="Validade da Habilitação de Motorista: " :placeholder="false"/>
            <x:form::input name="habilcategoria" label="Categoria de Habilitação de Motorista: " :placeholder="false"/>
        </div>
        <div class="col-md-6">
        <x:form::select name="sexo" label="Sexo: " :options="['fem' => 'Feminino', 'mas' => 'Masculino']" />
            <x:form::select name="gemeo" label="Gêmeo: " :options="['sim' => 'Sim', 'nao' => 'Não']" />
            <x:form::select name="cor" label="Cor (autodeclaração): " :options="['branca' => 'Branca', 'preta' => 'Preta', 'parda' => 'Parda', 'amarela' => 'Amarela', 'indigena' => 'Indígena']" />
            <x:form::input name="inep" label="Código INEP: " :placeholder="false"/>
            <x:form::input type="date" name="nascimento" label="Data de Nascimento: " />
            <x:form::input name="genitora" label="Nome da Genitora: " :placeholder="false"/>
            <x:form::input name="genitor" label="Nome do Genitor: " :placeholder="false"/>
            <x:form::input name="responsavel" label="Nome do Responsável: " :placeholder="false"/>
            <x:form::input name="responcpf" class="cpf" label="Número de CPF do Responsável: " :placeholder="false"/>
            <x:form::input name="respontel1" class="phone" label="Telefone (1) do Responsável: " :placeholder="false"/>
            <x:form::input name="respontel2" class="phone" label="Telefone (2) do Responsável: " :placeholder="false"/>
            <x:form::input name="endereco" label="Logradouro: " :placeholder="false"/>
            <x:form::input name="endnumero" label="Número do Logradouro: " :placeholder="false"/>
            <x:form::input name="endbairro" label="Bairro: " :placeholder="false"/>
            <x:form::input name="endcidade" label="Cidade: " :placeholder="false"/>
            <x:form::select name="enduf" label="Estado do Endereço: " :options="['AC' => 'AC', 'AL' => 'AL', 'AP' => 'AP', 'AM' => 'AM', 'BA' => 'BA', 'CE' => 'CE', 'DF' => 'DF', 'ES' => 'ES', 'GO' => 'GO', 'MA' => 'MA', 'MS' => 'MS', 'MT' => 'MT', 'MG' => 'MG', 'PA' => 'PA', 'PB' => 'PB', 'PR' => 'PR', 'PE' => 'PE', 'PI' => 'PI', 'RR' => 'RR', 'RO' => 'RO', 'RJ' => 'RJ', 'RN' => 'RN', 'RS' => 'RS', 'SC' => 'SC', 'SP' => 'SP', 'SE' => 'SE', 'TO' => 'TO']" />
            <x:form::input name="endcomplemento" label="Complemento do Endereço: " :placeholder="false"/>
            <x:form::input name="endcep" class="cep" label="Código de Endereçamento Postal (CEP): " :placeholder="false"/>
            <x:form::input name="titulo" label="Número do Título de Eleitor: " :placeholder="false"/>
            <x:form::input name="titulozona" label="Zona do Título de Eleitor: " :placeholder="false"/>
            <x:form::input name="titulosessao" label="Sessão do Título de Eleitor: " :placeholder="false"/>
            <x:form::select name="titulouf" label="Estado do Título: " :options="['AC' => 'AC', 'AL' => 'AL', 'AP' => 'AP', 'AM' => 'AM', 'BA' => 'BA', 'CE' => 'CE', 'DF' => 'DF', 'ES' => 'ES', 'GO' => 'GO', 'MA' => 'MA', 'MS' => 'MS', 'MT' => 'MT', 'MG' => 'MG', 'PA' => 'PA', 'PB' => 'PB', 'PR' => 'PR', 'PE' => 'PE', 'PI' => 'PI', 'RR' => 'RR', 'RO' => 'RO', 'RJ' => 'RJ', 'RN' => 'RN', 'RS' => 'RS', 'SC' => 'SC', 'SP' => 'SP', 'SE' => 'SE', 'TO' => 'TO']" />
            <x:form::input name="docmilitar" label="Número do Documento Militar: " :placeholder="false"/>
            <x:form::input name="carteiratrab" label="Número da Carteira de Trabalho: " :placeholder="false"/>
            <x:form::input name="banco" label="Nome do Banco: " :placeholder="false"/>
            <x:form::input name="agencia" label="Número de Agência: " :placeholder="false"/>
            <x:form::input name="conta" label="Número de Conta: " :placeholder="false"/>
        </div>
        <div class="col-12 mt-2">
            <x:form::button.link class="btn-secondary me-3" href="{{route('pessoas')}}">{{ __('Cancel') }}</x:form::button.link>
            <x:form::button.submit>Atualizar registro</x:form::button.submit>
        </div>
    </x:form::form>
</div>

@endsection

@section('script')
    $(document).ready(function() {

        $(".cpf").mask('000.000.000-00', {reverse: true});

        $('.phone').mask('(00) 00000-0000');

        $('.cep').mask('00000-000');

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
@endsection