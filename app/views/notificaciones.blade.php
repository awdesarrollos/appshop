@if (count($errors->all()) > 0)
<div class="alert alert-error alert-block">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4>Errores</h4>
	<!--Por favor verifique los datos ingresados. -->
	{{ implode('', $errors->all('<li class="error">:message</li>')) }}
</div>
@endif


@if ($message = Session::get('success'))
<div class="alert alert-success">
	<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
	<strong>Listo:</strong>
	@if(Session::get('success') == 'active-account')
		Su cuenta ha sido activada.
	@else
		{{{ $message }}}
	@endif
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger">
	<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
	<strong>Errores:</strong>
	@if(Session::get('error') == 'unactive-account')
		Ha habido un error al activar su cuenta. Vuelva a intentarlo.
	@else
		{{{ $message }}}
	@endif
</div>
@endif

@if ($message = Session::get('warning'))
<div class="alert alert-warning">
	<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
	<strong>Aviso:</strong>
	{{{ $message }}}
</div>
@endif

@if ($message = Session::get('info'))
<div class="alert alert-info">
	<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
	<strong>Informacion:</strong>
	{{{ $message }}}
</div>
@endif
