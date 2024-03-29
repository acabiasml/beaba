<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title') | bêabá</title>
  <!-- Favicon -->
  <link rel="icon" href="../assets/img/ctjj.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
  <script src="../assets/vendor/fullcalendar/dist/index.global.min.js"></script>
  <script src="../assets/vendor/fullcalendar/packages/core/locales-all.global.js"></script>
</head>

<body>

  @php
  $avatar = 'https://www.gravatar.com/avatar/'.md5(strtolower(trim(Auth::user()->email)));
  @endphp

  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="{{route('home')}}">
          <img src="../assets/img/ctjj.png" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{route('home')}}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Home</span>
              </a>
            </li>
            @if(Auth::user()->tipo == 'bibli' || Auth::user()->tipo == 'admin')
            <li class="nav-item">
              <a class="nav-link" href="{{route('biblioteca')}}">
                <i class="ni ni-books text-orange"></i>
                <span class="nav-link-text">Biblioteca</span>
              </a>
            </li>
            @endif
          </ul>
          @if(Auth::user()->tipo == 'admin')
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Documentação</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="{{route('escolas')}}">
                <i class="ni ni-shop text-green"></i>
                <span class="nav-link-text">Escola</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('pessoas')}}">
                <i class="ni ni-single-02 text-yellow"></i>
                <span class="nav-link-text">Pessoas</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('relatorios')}}">
                <i class="ni ni-paper-diploma text-blue"></i>
                <span class="nav-link-text">Relatórios</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('historicos')}}">
                <i class="ni ni-map-big text-grey"></i>
                <span class="nav-link-text">Históricos</span>
              </a>
            </li>
          </ul>
          @endif
          @if(Auth::user()->tipo != 'bibli')
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Aulas</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="{{route('diarios')}}">
                <i class="ni ni-collection text-orange"></i>
                <span class="nav-link-text">Diários</span>
              </a>
              @endif
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <div class="col-lg-6 col-7">
            <i class="ni @yield('icon') text-amarelo" style="width: 20px"></i>
            <h6 class="h2 text-white d-inline-block mb-0"> @yield('title') </h6>
          </div>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Avatar do Gravatar" src="{{$avatar}}">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">{{Auth::user()->name}}</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <a href="{{route('user.show', Auth::user()->id)}}" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>Meu perfil</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{route('logout')}}" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Sair</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="py-2"></div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card border-0">
            <div style="margin-right: 10px; margin-left: 10px; margin-bottom: 10px; margin-top: 10px">
              @yield('content')
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
              &copy; 2022 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="#" class="nav-link">Desenvolvido por Acabias</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <script src="../assets/vendor/jquery/dist/jquery.mask.min.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>

  <script>
    @yield('script')
  </script>

  <script>
    // Example of javascript snippet to ask a confirmation before executing the destroy action
    // This js snippet uses the `data-confirm` attribute value provided in the use case example above
    const destroyButtons = $('table form.destroy-action button[data-confirm]');
    destroyButtons.click((event) => {
      event.preventDefault();
      const $this = $(event.target);
      const $destroyButton = $this.is('button') ? $this : $this.closest('button');
      const message = $destroyButton.data('confirm');
      const form = $destroyButton.closest('form');
      if (message && confirm(message)) {
        form.submit();
      }
    });
  </script>
</body>

</html>