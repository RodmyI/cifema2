<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Layout</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/lte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/lte/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  @include("theme/lte/navbar")

  @include('theme/lte/aside')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @if(session('info'))
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="alert alert-success">
              {{ session('info') }}
            </div>
          </div>
        </div>
      </div>
    @endif

    @yield('content')

  </div>
  <!-- /.content-wrapper -->

  @include('theme/lte/footer')

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('assets/lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- InputMask -->
<script src="{{ asset('assets/lte/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/lte/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/lte/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/lte/dist/js/demo.js') }}"></script>
<!-- Page script -->
<script>
  $(function () {
    //Money Euro
    $('[data-mask]').inputmask();
  });
</script>

</body>
</html>