@extends('layouts.main')
@section('content')

	{{ Form::open(array('url'=>'users/create', 'class'=>'form-signin')) }}
		<h2 class="form-signin-heading">Registro</h2>

		{{ Form::text('nombre', null, array('class'=>'form-control', 'placeholder'=>'Nombre')) }}
		{{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email')) }}
		{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
		{{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Confirmar Password')) }}

		{{ Form::submit('Registrarse', array('class'=>'btn btn-large btn-primary btn-block boton-submit'))}}
	{{ Form::close() }}

@stop