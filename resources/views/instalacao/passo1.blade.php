<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Instalação | bêabá</title>

  <!-- Favicon -->
  <link rel="icon" href="../assets/img/ctjj.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">

  <!-- Argon CSS -->
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body style="background-color: white; margin: 20px 20px 20px 20px">

  <div style="text-align: center">
    <h1>Bêabá! </h1>
    <h2>Esse é um simples sistema de gerenciamento escolar.</h2>
    <h3>Vamos começar incluindo quem administrará o sistema:</h3>
  </div>

  <x:form::form method="POST" :action="route('user.store.first')">
    <x:form::input name="nome" id="nome" label="Nome completo: " :placeholder="false"/>
    <x:form::input type="email" name="email" id="email" label="E-mail: ":placeholder="false" />
    <x:form::input type="password" name="password" id="password" label="Senha: " :placeholder="false"/>
    <x:form::select name="tipo" label="Tipo: " :options="['admin' => 'Administrador']" selected="admin" />

    <div style="text-align: center">
      <x:form::button.submit>Registrar</x:form::submit>
    </div>
  </x:form::form>

  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

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

</body>

</html>