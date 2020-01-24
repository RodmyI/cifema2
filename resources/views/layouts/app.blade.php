<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CIFEMA SAM</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

    <!-- jQuery -->
    <script src="{{ asset('js/jquery-1.12.4.min.js') }}"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/bootstrap.js') }}" defer></script>

    <!-- jquery.cycle2 -->
    <script src="{{ asset('plugins/cycle2/jquery.cycle2.min.js') }}" defer></script>
    <!-- tynylight -->
    <script src="{{ asset('plugins/tynylight/js/jquery.light.js') }}" defer></script>
    <!-- Custom -->
    <script src="{{ asset('js/custom.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- HoverEffectIdeas -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/HoverEffectIdeas/set2.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/HoverEffectIdeas/font-awesome-4.2.0/css/font-awesome.min.css') }}" />
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Economica&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dosis:400,700&display=swap" rel="stylesheet">
    <!-- cycle2 -->
    <link href="{{ asset('plugins/cycle2/cycle2.css') }}" rel="stylesheet">
    <!-- tynylight -->
    <link href="{{ asset('plugins/tynylight/css/jquery.light.css') }}" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <section class="header_page">
            <div class="content">
                <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                    <div class="container">
                        <a class="navbar-brand" href="{{ url('/') }}">
                           <img src="{{ asset('images/logo_cifema.jpg') }}" alt="CIFEMA SAM" class="img-fluid">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav mr-auto">

                            </ul>

                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto navbar-light">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ url('/') }}">Inicio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('about') }}">Acerca de Nosotros</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('contact') }}">Contacto</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="bar_red">
                    <div class="container sub_header">
                        <div class="bar_item">
                            <a href="#">
                                <img src="{{ asset('images/facebook_cicle_2.png') }}" alt="" width="27px">
                            </a>
                        </div>
                        <div class="bar_item">
                            <a href="#">
                                <img src="{{ asset('images/twitter_cicle_2.png') }}" alt="" width="27px">
                            </a>
                        </div>
                        <div class="bar_item">
                            <a href="#">
                                <img src="{{ asset('images/whatsapp_cicle2.png') }}" alt="" width="27px">
                            </a>
                        </div>
                        <div class="bar_item">
                            <form action="{{ route('search') }}" method="POST">
                              {{ csrf_field() }}
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="input-group mb-2">
                                    <input type="text" name="s" class="form-control form-control-sm" placeholder="Buscar Producto...">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">
                                        <input type="submit" name="Submit" value=" " class="image_search" >
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="body_page">
          <div class="container">
            <main class="py-4">
                @yield('content')
            </main>
          </div>
        </section>
        <section class="footer_page">
          <div class="container">
            <div class="row">
                <div class="col-md-4 col-xs-12">
                    <h4 class="title_foot">Acerca de Nosotros</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam commodo hendrerit lectus, vel viverra felis vehicula vitae. Vivamus vitae eros risus. In semper commodo ligula non egestas</p>
                </div>
                <div class="col-md-8 col-xs-12">
                    <h4 class="title_foot">Categorias de Productos</h4>
                    @php
                        $categories = App\Typept::get();
                    @endphp
                    <ul class="list_cat">
                        @if($categories)
                            @foreach($categories as $category)
                                <li><a href="#">{{ $category->name }}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="col-md-12 col-xs-12">
                    <hr>
                    <p>&copy; 2019 Todos los derechos reservados.</p>
                </div>
            </div>
          </div>
        </section>
    </div>
    <script>
    jQuery(function() {
        jQuery('a[rel=light]').light();
    });
    </script>
</body>
</html>