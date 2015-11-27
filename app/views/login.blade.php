@extends('layouts.main')
@section('content')

	{{ Form::open(array('url'=>'login', 'class'=>'form-signin')) }}
		<h2 class="form-signin-heading">Entrar</h2>

		{{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email')) }}
		{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}

		{{ Form::submit('Entrar', array('class'=>'btn btn-large btn-primary btn-block boton-submit'))}}
	{{ Form::close() }}

@stop