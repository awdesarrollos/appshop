<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width" />
<meta name="csrf-token" content="{{{ csrf_token() }}}">
<title>
	@section('title')
		Bingo Integral - Aplicación Web
	@show
</title>

<!-- Style -->
<link rel="stylesheet" href="{{{ asset('css/bootstrap.min.css') }}}">
<link rel="stylesheet" href="{{{ asset('css/bootstrap-theme.min.css') }}}">
<link rel="stylesheet" href="{{{ asset('css/styles.css') }}}">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="{{{ asset('css/bootstrap.icon-large.min.css') }}}">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">

<!-- Javascripts -->
<script src="{{{ asset('js/jquery.min.js') }}}"></script>
<script src="{{{ asset('js/bootstrap.min.js') }}}"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<script src="{{{ asset('js/functions.js') }}}"></script>


<script type="text/javascript">
	
	$(document).ready(function(){
		
		$("#email").blur(function(){
			$("#email").css('border-color', '');
			var value = $("#email").val();
			if(email.length >= 10){
				$.ajax({
					url: urlBase+'/account/check',
					type: 'POST',
					dataType: 'JSON',
					data: {value:value,type:'m'},
					success: function(data){
						if(data.value === true){
							$("#email").css('border-color', 'green');
						} else {
							$("#email").css('border-color', 'red');
						}
					},
					error: function(xhr, textStatus, error){
						$("#email").css('border-color', 'yellow');
					}
				});
			}
			return false;
		});
	});
</script>

<script>
      $(function() {
        $.datepicker.regional['es'] = {
          closeText: 'Cerrar',
          prevText: '<Ant',
          nextText: 'Sig>',
          currentText: 'Hoy',
          monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
          monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
          dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
          dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
          dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
          weekHeader: 'Sm',
          dateFormat: 'dd/mm/yy',
          firstDay: 1,
          isRTL: false,
          showMonthAfterYear: false,
          yearSuffix: ''
        };
        $.datepicker.setDefaults($.datepicker.regional['es']); 
        $.datepicker.setDefaults({ dateFormat: 'dd/mm/yy' });
        $('#fecha').datepicker();  
      });	

    </script>

    <script>
        
    </script>

</head>

<body>
	<!-- Menu -->
		@include('menu')
	<!-- End menu -->
	<div class="container wrap">
		
		<!-- Notifications -->
			@include('notificaciones')
		<!-- End notifications -->

		<!-- Content -->
			@yield('content')
		<!-- End content -->

		<!-- Footer -->
			@include('footer')
		<!-- End Footer -->
	</div>
</body>
</html>