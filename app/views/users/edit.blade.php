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
            
        	<h2>Editar Usuario</h2>

        	@if ($user == NULL)
				
				<p>El usuario buscado no existe o no se puede mostrar.</p>

				{{ HTML::link('admin/users/', 'Volver al Listado', array('class' => 'btn btn-info')) }}
			@else

        	{{ Form::model($user, array('route' => array('admin.users.update', $user->id), 'method' => 'PUT', 'class' => 'form form-horizontal')) }}

				<div class="form-group">
					<div class="col-md-5">
					{{ Form::label('nombre', 'Nombre') }}
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
						{{ Form::select('role_id', $roles, Input::old('role', $user->role_id), array('class'=>'form-control')) }}
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

				<div class="form-group">
					<div class="col-md-5">
					{{ Form::label('password', 'Nueva Contraseña') }}
					<input type="password" id="password" name="password" class="form-control inputs" value="" />
					</div>
				</div>
				
				<br/>
				
				{{ Form::submit('Editar Usuario', array('class' => 'btn btn-primary')) }}
				{{ HTML::link('admin/users/', 'Volver al Listado', array('class' => 'btn btn-info')) }}
				
			{{ Form::close() }}

			@endif


        </div>
    </div>
</div>
@stop