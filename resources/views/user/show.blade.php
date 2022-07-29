@extends('principais.layout')

@section('title', 'DADOS DE CADASTRO')
@section('icon', 'ni-single-02')

@section('content')

<div style="text-align: right">
    <a href="{{route('pessoas')}}">
        <button type="button" class="btn btn-secondary">Voltar</button>
    </a>
    <a href="{{route('user.print', $usuario->id)}}">
        <button type="button" class="btn btn-primary">Imprimir</button>
    </a>
    <a href="{{route('user.edit', $usuario->id)}}">
        <button type="button" class="btn btn-warning">Editar</button>
    </a>
</div><br />

<div class="container-fluid" style="margin-bottom: 50px">
    <x:form::form :bind="$usuario" class="row">
        <div class="col-md-6">
            <x:form::input type="hidden" name="id" />
            <x:form::input readonly id="nome" name="nome" label="Nome completo" />
            <x:form::input readonly name="nomesocial" label="Nome social" />
            <x:form::select style="background: #eee; pointer-events: none; touch-action: none;" name="tipo" label="Tipo: " :options="['admin' => 'Administrador', 'prof' => 'Professor', 'estud' => 'Estudante', 'apoio' => 'Apoio', 'bibli' => 'Biblioteca']" />
            <x:form::input readonly id="email" type="email" name="email" label="E-mail" />
            <x:form::input readonly id="password" type="password" name="password" label="Senha" />
            <x:form::input readonly name="cpf" label="CPF" />
            <x:form::input readonly name="telefone1" label="Telefone de contato 1" />
            <x:form::input readonly name="telefone2" label="Telefone de contato 2" />
            <x:form::input readonly name="identidade" label="Identidade" />
            <x:form::input readonly name="identemissor" label="Órgão emissor" />
            <x:form::select style="background: #eee; pointer-events: none; touch-action: none;" name="identuf" label="Estado emissor: " :options="['AC' => 'AC', 'AL' => 'AL', 'AP' => 'AP', 'AM' => 'AM', 'BA' => 'BA', 'CE' => 'CE', 'DF' => 'DF', 'ES' => 'ES', 'GO' => 'GO', 'MA' => 'MA', 'MS' => 'MS', 'MT' => 'MT', 'MG' => 'MG', 'PA' => 'PA', 'PB' => 'PB', 'PR' => 'PR', 'PE' => 'PE', 'PI' => 'PI', 'RR' => 'RR', 'RO' => 'RO', 'RJ' => 'RJ', 'RN' => 'RN', 'RS' => 'RS', 'SC' => 'SC', 'SP' => 'SP', 'SE' => 'SE', 'TO' => 'TO']" />
            <x:form::input readonly type="date" name="identexpedicao" label="Emissão da identidade" />
            <x:form::select style="background: #eee; pointer-events: none; touch-action: none;" name="nacionalidade" label="Nacionalidade: " :options="['Afeganistão'=>'Afeganistão', 'África do Sul' => 'África do Sul', 'Akrotiri' => 'Akrotiri', 'Albânia' => 'Albânia', 'Alemanha' => 'Alemanha', 'Andorra' => 'Andorra', 'Angola' => 'Angola', 'Anguila' => 'Anguila', 'Antárctida' => 'Antárctida', 'Antígua e Barbuda' => 'Antígua e Barbuda', 'Arábia Saudita' => 'Arábia Saudita', 'Arctic Ocean' => 'Arctic Ocean', 'Argélia' => 'Argélia', 'Argentina' => 'Argentina', 'Arménia' => 'Arménia', 'Aruba' => 'Aruba', 'Ashmore and Cartier Islands' => 'Ashmore and Cartier Islands', 'Atlantic Ocean' => 'Atlantic Ocean', 'Austrália' => 'Austrália', 'Áustria' => 'Áustria', 'Azerbaijão' => 'Azerbaijão', 'Baamas' => 'Baamas', 'Bangladeche' => 'Bangladeche', 'Barbados' => 'Barbados', 'Barém' => 'Barém', 'Bélgica' => 'Bélgica', 'Belize' => 'Belize', 'Benim' => 'Benim', 'Bermudas' => 'Bermudas', 'Bielorrússia' => 'Bielorrússia', 'Birmânia' => 'Birmânia', 'Bolívia' => 'Bolívia', 'Bósnia e Herzegovina' => 'Bósnia e Herzegovina', 'Botsuana' => 'Botsuana', 'Brasil' => 'Brasil', 'Brunei' => 'Brunei', 'Bulgária' => 'Bulgária', 'Burquina Faso' => 'Burquina Faso', 'Burúndi' => 'Burúndi', 'Butão' => 'Butão', 'Cabo Verde' => 'Cabo Verde', 'Camarões' => 'Camarões', 'Camboja' => 'Camboja', 'Canadá' => 'Canadá', 'Catar' => 'Catar', 'Cazaquistão' => 'Cazaquistão', 'Chade' => 'Chade', 'Chile' => 'Chile', 'China' => 'China', 'Chipre' => 'Chipre', 'Clipperton Island' => 'Clipperton Island', 'Colômbia' => 'Colômbia', 'Comores' => 'Comores', 'Congo-Brazzaville' => 'Congo-Brazzaville', 'Congo-Kinshasa' => 'Congo Kinshasa', 'Coral Sea Islands' => 'Coral Sea Islands', 'Coreia do Norte' => 'Coreia do Norte', 'Coreia do Sul' => 'Coreia do Sul', 'Costa do Marfim' => 'Costa do Marfim', 'Costa Rica' => 'Costa Rica', 'Croácia' => 'Croácia', 'Cuba' => 'Cuba', 'Curacao' => 'Curacao', 'Dhekelia' => 'Dhekelia', 'Dinamarca' => 'Dinamarca', 'Domínica' => 'Domínica', 'Egito' => 'Egito', 'Emirados Árabes Unidos' => 'Emirados Árabes Unidos', 'Equador' => 'Equador', 'Eritreia' => 'Eritreia', 'Eslováquia' => 'Eslováquia', 'Eslovênia' => 'Eslovênia', 'Espanha' => 'Espanha', 'Estados Unidos' => 'Estados Unidos', 'Estônia' => 'Estônia', 'Etiópia' => 'Etiópia', 'Faroé' => 'Faroé', 'Fiji' => 'Fiji', 'Filipinas' => 'Filipinas', 'Finlândia' => 'Finlândia', 'França' => 'França', 'Gabão' => 'Gabão', 'Gâmbia' => 'Gâmbia', 'Gana' => 'Gana', 'Gaza Strip' => 'Gaza Strip', 'Geórgia' => 'Geórgia', 'Geórgia do Sul e Sandwich do Sul' => 'Geórgia do Sul e Sandwich do Sul', 'Gibraltar' => 'Gibraltar', 'Granada' => 'Granada', 'Grécia' => 'Grécia', 'Groenlândia' => 'Groenlândia', 'Guame' => 'Guame', 'Guatemala' => 'Guatemala', 'Guernsey' => 'Guernsey', 'Guiana' => 'Guiana', 'Guiné' => 'Guiné', 'Guiné Equatorial' => 'Guiné Equatorial', 'Guiné-Bissau' => 'Guiné-Bissau', 'Haiti' => 'Haiti', 'Honduras' => 'Honduras', 'Hong Kong' => 'Hong Kong', 'Hungria' => 'Hungria', 'Iémen' => 'Iémen', 'Ilha Bouvet' => 'Ilha Bouvet', 'Ilha do Natal' => 'Ilha do Natal', 'Ilha Norfolk' => 'Ilha Norfolk', 'Ilhas Caimão' => 'Ilhas Caimão', 'Ilhas Cook' => 'Ilhas Cook', 'Ilhas dos Cocos' => 'Ilhas dos Cocos', 'Ilhas Falkland' => 'Ilhas Falkland', 'Ilhas Heard e McDonald' => 'Ilhas Heard e McDonald', 'Ilhas Marshall' => 'Ilhas Marshall', 'Ilhas Salomão' => 'Ilhas Salomão', 'Ilhas Turcas e Caicos' => 'Ilhas Turcas e Caicos', 'Ilhas Virgens Americanas' => 'Ilhas Virgens Americanas', 'Ilhas Virgens Britânicas' => 'Ilhas Virgens Britânicas', 'Índia' => 'Índia', 'Indian Ocean' => 'Indian Ocean', 'Indonésia' => 'Indonésia', 'Irão' => 'Irão', 'Iraque' => 'Iraque', 'Irlanda' => 'Irlanda', 'Islândia' => 'Islândia', 'Israel' => 'Israel', 'Itália' => 'Itália', 'Jamaica' => 'Jamaica', 'Jan Mayen' => 'Jan Mayen', 'Japão' => 'Japão', 'Jersey' => 'Jersey', 'Jibuti' => 'Jibuti', 'Jordânia' => 'Jordânia', 'Kosovo' => 'Kosovo', 'Kuwait' => 'Kuwait', 'Laos' => 'Laos', 'Lesoto' => 'Lesoto', 'Letônia' => 'Letônia', 'Líbano' => 'Líbano', 'Libéria' => 'Libéria', 'Líbia' => 'Líbia', 'Listenstaine' => 'Listenstaine', 'Lituânia' => 'Lituânia', 'Luxemburgo' => 'Luxemburgo', 'Macau' => 'Macau', 'Macedônia' => 'Macedônia', 'Madagascar' => 'Madagascar', 'Malásia' => 'Malásia', 'Malávi' => 'Malávi', 'Maldivas' => 'Maldivas', 'Mali' => 'Mali', 'Malta' => 'Malta', 'Man, Isle of' => 'Man, Isle of', 'Marianas do Norte' => 'Marianas do Norte', 'Marrocos' => 'Marrocos', 'Maurícia' => 'Maurícia', 'Mauritânia' => 'Mauritânia', 'México' => 'México', 'Micronésia' => 'Micronésia', 'Moçambique' => 'Moçambique', 'Moldávia' => 'Moldávia', 'Mônaco' => 'Mônaco', 'Mongólia' => 'Mongólia', 'Monserrate' => 'Monserrate', 'Montenegro' => 'Montenegro', 'Mundo' => 'Mundo', 'Namíbia' => 'Namíbia', 'Nauru' => 'Nauru', 'Navassa Island' => 'Navassa Island', 'Nepal' => 'Nepal', 'Nicarágua' => 'Nicarágua', 'Níger' => 'Níger', 'Nigéria' => 'Nigéria', 'Niue' => 'Niue', 'Noruega' => 'Noruega', 'Nova Caledônia' => 'Nova Caledônia', 'Nova Zelândia' => 'Nova Zelândia', 'Omã' => 'Omã', 'Pacific Ocean' => 'Pacific Ocean', 'Países Baixos' => 'Países Baixos', 'Palau' => 'Palau', 'Panamá' => 'Panamá', 'Papua-Nova Guiné' => 'Papua-Nova Guiné', 'Paquistão' => 'Paquistão', 'Paracel Islands' => 'Paracel Islands', 'Paraguai' => 'Paraguai', 'Peru' => 'Peru', 'Pitcairn' => 'Pitcairn', 'Polinésia Francesa' => 'Polinésia Francesa', 'Polônia' => 'Polônia', 'Porto Rico' => 'Porto Rico', 'Portugal' => 'Portugal', 'Quênia' => 'Quênia', 'Quirguizistão' => 'Quirguizistão', 'Quiribáti' => 'Quiribáti', 'Reino Unido' => 'Reino Unido', 'República Centro-Africana' => 'República Centro-Africana', 'República Dominicana' => 'República Dominicana', 'Romênia' => 'Romênia', 'Ruanda' => 'Ruanda', 'Rússia' => 'Rússia', 'Salvador' => 'Salvador', 'Samoa' => 'Samoa', 'Samoa Americana' => 'Samoa Americana', 'Santa Helena' => 'Santa Helena', 'Santa Lúcia' => 'Santa Lúcia', 'São Bartolomeu' => 'São Bartolomeu', 'São Cristóvão e Neves' => 'São Cristóvão e Neves', 'São Marinho' => 'São Marinho', 'São Martinho' => 'São Martinho', 'São Pedro e Miquelon' => 'São Pedro e Miquelon', 'São Tomé e Príncipe' => 'São Tomé e Príncipe', 'São Vicente e Granadinas' => 'São Vicente e Granadinas', 'Sara Ocidental' => 'Sara Ocidental', 'Seicheles' => 'Seicheles', 'Senegal' => 'Senegal', 'Serra Leoa' => 'Serra Leoa', 'Sérvia' => 'Sérvia', 'Singapura' => 'Singapura', 'Sint Maarten' => 'Sint Maarten', 'Síria' => 'Síria', 'Somália' => 'Somália', 'Southern Ocean' => 'Southern Ocean', 'Spratly Islands' => 'Spratly Islands', 'Sri Lanca' => 'Sri Lanca', 'Suazilândia' => 'Suazilândia', 'Sudão' => 'Sudão', 'Sudão do Sul' => 'Sudão do Sul', 'Suécia' => 'Suécia', 'Suíça' => 'Suíça', 'Suriname' => 'Suriname', 'Svalbard e Jan Mayen' => 'Svalbard e Jan Mayen', 'Tailândia' => 'Tailândia', 'Taiwan' => 'Taiwan', 'Tajiquistão' => 'Tajiquistão', 'Tanzânia' => 'Tanzânia', 'Território Britânico do Oceano Índico' => 'Território Britânico do Oceano Índico', 'Territórios Austrais Franceses' => 'Territórios Austrais Franceses', 'Timor Leste' => 'Timor Leste', 'Togo' => 'Togo', 'Tokelau' => 'Tokelau', 'Tonga' => 'Tonga', 'Trindade e Tobago' => 'Trindade e Tobago', 'Tunísia' => 'Tunísia', 'Turquemenistão' => 'Turquemenistão', 'Turquia' => 'Turquia', 'Tuvalu' => 'Tuvalu', 'Ucrânia' => 'Ucrânia', 'Uganda' => 'Uganda', 'União Europeia' => 'União Europeia', 'Uruguai' => 'Uruguai', 'Usbequistão' => 'Usbequistão', 'Vanuatu' => 'Vanuatu', 'Vaticano' => 'Vaticano', 'Venezuela' => 'Venezuela', 'Vietã' => 'Vietã', 'Wake Island' => 'Wake Island', 'Wallis e Futuna' => 'Wallis e Futuna', 'West Bank' => 'West Bank', 'Zâmbia' => 'Zâmbia', 'Zimbabué' => 'Zimbabué']" />
            <x:form::input readonly name="naturalidade" label="Naturalidade" />
            <x:form::select style="background: #eee; pointer-events: none; touch-action: none;" name="naturaif" label="Estado de naturalidade: " :options="['AC' => 'AC', 'AL' => 'AL', 'AP' => 'AP', 'AM' => 'AM', 'BA' => 'BA', 'CE' => 'CE', 'DF' => 'DF', 'ES' => 'ES', 'GO' => 'GO', 'MA' => 'MA', 'MS' => 'MS', 'MT' => 'MT', 'MG' => 'MG', 'PA' => 'PA', 'PB' => 'PB', 'PR' => 'PR', 'PE' => 'PE', 'PI' => 'PI', 'RR' => 'RR', 'RO' => 'RO', 'RJ' => 'RJ', 'RN' => 'RN', 'RS' => 'RS', 'SC' => 'SC', 'SP' => 'SP', 'SE' => 'SE', 'TO' => 'TO']" />
            <x:form::input readonly name="docextrangeiro" label="Documento de estrangeiro" />
            <x:form::input readonly name="certidao" label="Certidão de nascimento" />
            <x:form::input readonly name="certifolha" label="Folha da certidão" />
            <x:form::input readonly name="certilivro" label="Livro da certidão" />
            <x:form::input readonly name="certiemissao" label="Data da certidão" />
            <x:form::input readonly name="cartaosus" label="Cartão SUS" />
            <x:form::input readonly name="nis" label="NIS" />
            <x:form::select style="background: #eee; pointer-events: none; touch-action: none;" name="tiposangue" label="Tipo Sanguíneo: " :options="['A+' => 'A+', 'A-' => 'A-', 'B+' => 'B+', 'B-' => 'B-', 'AB+' => 'AB+', 'AB-' => 'AB-', 'O+' => 'O+', 'O-' => 'O-']" />
            <x:form::textarea readonly label="Observações nutricionais" name="nutricionais" />
            <x:form::input readonly name="habilitacao" label="Habilitação" />
            <x:form::input readonly name="habilvalidade" label="Validade da habilitação" />
            <x:form::input readonly name="habilcategoria" label="Categoria de habilitação" />
        </div>
        <div class="col-md-6">
            <x:form::select style="background: #eee; pointer-events: none; touch-action: none;" name="sexo" label="Sexo: " :options="['fem' => 'Feminino', 'mas' => 'Masculino']" />
            <x:form::select style="background: #eee; pointer-events: none; touch-action: none;" name="gemeo" label="Gêmeo: " :options="['sim' => 'Sim', 'nao' => 'Não']" />
            <x:form::select style="background: #eee; pointer-events: none; touch-action: none;" name="cor" label="Cor (autodeclaração): " :options="['branca' => 'Branca', 'preta' => 'Preta', 'parda' => 'Parda', 'amarela' => 'Amarela', 'indigena' => 'Indígena']" />
            <x:form::input readonly name="inep" label="Código INEP" />
            <x:form::input readonly type="date" name="nascimento" label="Data de nascimento" />
            <x:form::input readonly name="genitora" label="Nome da genitora" />
            <x:form::input readonly name="genitor" label="Nome do genitor" />
            <x:form::input readonly name="responsavel" label="Nome do responsável" />
            <x:form::input readonly name="responcpf" label="CPF do responsável" />
            <x:form::input readonly name="respontel1" label="Telefone 1 do responsável" />
            <x:form::input readonly name="respontel2" label="Telefone 2 do responsável" />
            <x:form::input readonly name="endereco" label="Logradouro" />
            <x:form::input readonly name="endnumero" label="Número do logradouro" />
            <x:form::input readonly name="endbairro" label="Bairro" />
            <x:form::input readonly name="endcidade" label="Cidade" />
            <x:form::select style="background: #eee; pointer-events: none; touch-action: none;" name="enduf" label="Estado do endereço: " :options="['AC' => 'AC', 'AL' => 'AL', 'AP' => 'AP', 'AM' => 'AM', 'BA' => 'BA', 'CE' => 'CE', 'DF' => 'DF', 'ES' => 'ES', 'GO' => 'GO', 'MA' => 'MA', 'MS' => 'MS', 'MT' => 'MT', 'MG' => 'MG', 'PA' => 'PA', 'PB' => 'PB', 'PR' => 'PR', 'PE' => 'PE', 'PI' => 'PI', 'RR' => 'RR', 'RO' => 'RO', 'RJ' => 'RJ', 'RN' => 'RN', 'RS' => 'RS', 'SC' => 'SC', 'SP' => 'SP', 'SE' => 'SE', 'TO' => 'TO']" />
            <x:form::input readonly name="endcomplemento" label="Complemento do endereço" />
            <x:form::input readonly name="endcep" label="CEP" />
            <x:form::input readonly name="titulo" label="Título de eleitor" />
            <x:form::input readonly name="titulozona" label="Zona do título de eleitor" />
            <x:form::input readonly name="titulosessao" label="Sessão do título de eleitor" />
            <x:form::select style="background: #eee; pointer-events: none; touch-action: none;" name="titulouf" label="Estado do título: " :options="['AC' => 'AC', 'AL' => 'AL', 'AP' => 'AP', 'AM' => 'AM', 'BA' => 'BA', 'CE' => 'CE', 'DF' => 'DF', 'ES' => 'ES', 'GO' => 'GO', 'MA' => 'MA', 'MS' => 'MS', 'MT' => 'MT', 'MG' => 'MG', 'PA' => 'PA', 'PB' => 'PB', 'PR' => 'PR', 'PE' => 'PE', 'PI' => 'PI', 'RR' => 'RR', 'RO' => 'RO', 'RJ' => 'RJ', 'RN' => 'RN', 'RS' => 'RS', 'SC' => 'SC', 'SP' => 'SP', 'SE' => 'SE', 'TO' => 'TO']" />
            <x:form::input readonly name="docmilitar" label="Documento militar" />
            <x:form::input readonly name="carteiratrab" label="Carteira de trabalho" />
            <x:form::input readonly name="banco" label="Banco" />
            <x:form::input readonly name="agencia" label="Agência" />
            <x:form::input readonly name="conta" label="Conta" />
        </div>
    </x:form::form>
</div>

@endsection