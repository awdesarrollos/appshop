@extends('layouts.main')
@section('content')
	<div class="container">
	<div class="espacio"></div>
    <div class="row">
        <div class="col-md-3">
            <!-- Barnav -->
              @include('barnav')
            <!-- End Barnav -->
        </div>
        <div class="col-md-9">
            
        	<h2>Nuevo Usuario</h2>

			{{ Form::open(array('url' => 'admin/users', 'class' => 'form form-horizontal')) }}

				<div class="form-group">
					<div class="col-md-5">
					{{ Form::label('nombre', 'Nombre y Apellido') }}
					{{ Form::text('nombre', Input::old('nombre'), array('class' => 'form-control')) }}
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-5">
					{{ Form::label('email', 'E-mail') }}
					{{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
					</div>
				</div>

				@if (Auth::user()->role_id == 1)
					<div class="form-group">
						<div class="col-md-5">
						{{ Form::label('role_id', 'Rol') }}
						{{ Form::select('role_id', array(
							'1' => 'Admin',
						   	'2' => 'Cliente'), null, array('class' => 'form-control')) }}
						</div>
					</div>
				@endif

				@if (Auth::user()->role_id == 2)
					<div class="form-group">
						<div class="col-md-5">
						{{ Form::label('role_id', 'Rol') }}
						{{ Form::select('role_id', array(
						   '3' => 'Usuario'), null, array('class' => 'form-control')) }}
						</div>
					</div>
				@endif

				<br/>
				
				{{ Form::submit('Crear Usuario', array('class' => 'btn btn-primary')) }}
				{{ HTML::link('admin/users/', 'Volver al Listado', array('class' => 'btn btn-info')) }}
				
			{{ Form::close() }}


        </div>
    </div>
</div>
@stop