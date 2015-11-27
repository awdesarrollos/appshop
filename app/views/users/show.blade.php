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
            
        	<h2>Ver Usuario</h2>

			@if ($user == NULL)
				<p>El usuario buscado no existe o no se puede mostrar.</p>
			@else
				<strong>Id:</strong> {{$user->id}}<br/>
				<strong>Nombre:</strong> {{$user->nombre}}<br/>
				<strong>Email:</strong> {{$user->email}}<br/>
				<strong>Rol:</strong> 
				@if ($user->role_id == 1)
					Administrador<br/>
				@elseif ($user->role_id == 2)
					Cliente<br/>
				@else
					Usuario<br/>
				@endif
			@endif
			<br/>
			{{ HTML::link('admin/users/', 'Volver al Listado', array('class' => 'btn btn-info')) }}

        </div>
    </div>
</div>
@stop