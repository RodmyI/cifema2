<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
  <title>CIFEMA SAM</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/lte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Jquery UI -->
  <link rel="stylesheet" href="{{ asset('assets/lte/plugins/jquery-ui/jquery-ui.structure.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/lte/plugins/jquery-ui/jquery-ui.theme.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/lte/dist/css/adminlte.min.css') }}">
  <!-- Custom style -->
  <link rel="stylesheet" href="{{ asset('assets/lte/dist/css/custom.css') }}">
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
<!-- jQuery -->
<script src="{{ asset('assets/lte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
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

    //autocomplete
    var $url_mat = '{{ route("materials.materialst") }}';
    $(document).on('keypress','.material_st', function(){
      $(this).autocomplete({
          source: $url_mat,
          minLength: 1,
          select: function( event, ui ){
            var standard_id = ui.item.id;
            var name = ui.item.name;
            if(standard_id != "no_id")
            {
              var content_div = $(this).parent();

              content_div.find('input[name="material_id[]"]').val(standard_id);
              content_div.find('input[name="material[]"]').hide();
              content_div.find('span').html(name);
              return false;
            }
          }
      }).data( "uiAutocomplete" )._renderItem = function( ul, item ) {
          var text_show = '';
          if(item.id!='no_id'){
            var text_show = item.name;
          
            return $( "<li></li>" )
              .data( "item.autocomplete", item )
              .append(
                  "<a class='ali' style='cursor:pointer;'>"+
                    text_show+ 
                  "</a>"
                  ) 
              .appendTo( ul );
          }else{
          
            return $( "<li></li>" )
              .data( "item.autocomplete", item )
              .append(
                  "<a class='ali' style='cursor:pointer;'>"+
                    text_show+
                  "</a>"
                  ) 
              .appendTo( ul );
          }
      };
    });

    $('#standares').find('tr').find('a.addrow').hide();
    $('#standares tr').last().find('a.addrow').show();

    //add row
    $(document).on('click','a.addrow', function(e){
      e.preventDefault();
      $('#standares').find('tr').find('a.addrow').hide();
      var $tr = $('#row_standares').find('tr').clone();
      $('#standares').find('tbody').append($tr);
    });

    //Delete row
    $(document).on('click', 'a.deleterow', function(e){
      e.preventDefault();
      $(this).parents('tr').remove();
      $('#standares tr').last().find('a.addrow').show();
    });


    //autocomplete2
    var $url_mat = '{{ route("materials.materialst") }}';
    $(document).on('keypress','.material_oc', function(){
      $(this).autocomplete({
          source: $url_mat,
          minLength: 1,
          select: function( event, ui ){
            var standard_id = ui.item.id;
            var name = ui.item.name;
            var code = ui.item.code;
            var unity = ui.item.unity;
            if(standard_id != "no_id")
            {
              var content_div = $(this).parent();

              content_div.find('input[name="material_id[]"]').val(standard_id);
              content_div.find('input[name="material[]"]').hide();
              content_div.find('span').html(code+ ' - ' +name+ ' - ' +unity);
              return false;
            }
          }
      }).data( "uiAutocomplete" )._renderItem = function( ul, item ) {
          var text_show = '';
          if(item.id!='no_id'){
            var text_show = item.name;
          
            return $( "<li></li>" )
              .data( "item.autocomplete", item )
              .append(
                  "<a class='ali' style='cursor:pointer;'>"+
                    text_show+ 
                  "</a>"
                  ) 
              .appendTo( ul );
          }else{
          
            return $( "<li></li>" )
              .data( "item.autocomplete", item )
              .append(
                  "<a class='ali' style='cursor:pointer;'>"+
                    text_show+
                  "</a>"
                  ) 
              .appendTo( ul );
          }
      };
    });


    //autocomplete2
    var $url_mat = '{{ route("materials.materialst") }}';
    $(document).on('keypress','.material_km', function(){
      $(this).autocomplete({
          source: $url_mat,
          minLength: 1,
          select: function( event, ui ){
            var standard_id = ui.item.id;
            var name = ui.item.name;
            var code = ui.item.code;
            var unity = ui.item.unity;
            if(standard_id != "no_id")
            {
              var content_div = $(this).parent();

              content_div.find('input[name="material_id[]"]').val(standard_id);
              content_div.find('input[name="material[]"]').hide();
              content_div.find('span').html(code+ ' - ' +name+ ' - ' +unity);
              return false;
            }
          }
      }).data( "uiAutocomplete" )._renderItem = function( ul, item ) {
          var text_show = '';
          if(item.id!='no_id'){
            var text_show = item.name;
          
            return $( "<li></li>" )
              .data( "item.autocomplete", item )
              .append(
                  "<a class='ali' style='cursor:pointer;'>"+
                    text_show+ 
                  "</a>"
                  ) 
              .appendTo( ul );
          }else{
          
            return $( "<li></li>" )
              .data( "item.autocomplete", item )
              .append(
                  "<a class='ali' style='cursor:pointer;'>"+
                    text_show+
                  "</a>"
                  ) 
              .appendTo( ul );
          }
      };
    });

  });
</script>

</body>
</html>