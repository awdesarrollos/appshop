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

            @if (Auth::user()->role_id == 1)
                 <h2>Listado de Clientes</h2>
            @else
                 <h2>Listado de Vendedores</h2>
            @endif           

            <div class="row-fluid">
                <div class="span5">
                    <!-- will be used to show any messages -->
                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
                </div>
            </div>

            @if (Auth::user()->role_id == 1)
                 <div class="span4 pull-right">
                    <a class="btn btn-small" href="{{ URL::to('admin/users/create') }}">Nuevo Cliente</a>
                </div>
            @else
                 <div class="span4 pull-right">
                    <a class="btn btn-small" href="{{ URL::to('admin/users/create') }}">Nuevo Vendedor</a>
                </div>
            @endif 

            

            @if ($users->count() == 0)
                <p>No hay registros para mostrar.</p>
            @else
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>Alta</td>
                            <td>Nombre</td>
                            <td>Email</td>
                            <td>Acciones</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $key => $value)
                        <tr>
                            <td>{{ date("d/m/Y",strtotime($value->created_at)) }}</td>
                            <td>{{ $value->nombre }}</td>
                            <td>{{ $value->email }}</td>
                            <td>
                                <a class="btn ver" href="{{ URL::to('admin/users/' . $value->id) }}">Ver</a>

                                <a class="btn editar" href="{{ URL::to('admin/users/' . $value->id . '/edit') }}">Editar</a>

                                {{ Form::open(array('route' => array('admin.users.destroy', $value->id), 'method' => 'delete')) }}
                                    <button type="submit" href="{{ URL::route('admin.users.destroy', $value->id) }}" class="btn btn-danger btn-mini" onclick="if(!confirm('Está seguro que desea borrar este registro?')){return false;};">Borrar</button>
                                {{ Form::close() }}

                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
                <div class="pagination">
                    {{ $users -> links(); }}
                </div>
            @endif
        </div>
    </div>
</div>
@stop

