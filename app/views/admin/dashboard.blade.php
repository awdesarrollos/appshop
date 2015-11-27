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

                <h2>Ultimos Clientes ingresados</h2>
                @if ($users->count() == 0)
                    <p>No hay registros para mostrar.</p>
                @else
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <td>Alta</td>
                                <td>Nombre</td>
                                <td>Email</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $key => $value)
                            <tr>
                                <td>{{ date("d/m/Y",strtotime($value->created_at)) }}</td>
                                <td>{{ $value->nombre }}</td>
                                <td>{{ $value->email }}</td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                     {{ HTML::link('admin/users', 'Ver Listado Completo', array('class' => 'pull-right')) }}
                @endif
            @endif

            @if (Auth::user()->role_id == 2)

                <h2>Ultimos Eventos ingresados</h2>
                @if ($eventos->count() == 0)
                    <p>No hay eventos para mostrar.</p>
                @else
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <td>Id</td>
                                <td>Nombre</td>
                                <td>Fecha</td>
                                <td>Ciudad</td>
                                <td>Provincia</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($eventos as $key => $value)
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->nombre }}</td>
                                <td>{{ date("d/m/Y",strtotime($value->fecha)) }}</td>
                                <td>{{ $value->localidade->localidad }}</td>
                                <td>{{ $value->provincia->provincia }}</td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                    {{ HTML::link('admin/eventos', 'Ver Listado Completo', array('class' => 'pull-right')) }}
                @endif
                <br/><br/>

                <h2>Ultimos Vendedores ingresados</h2>
                @if ($users->count() == 0)
                    <p>No hay registros para mostrar.</p>
                @else
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <td>Alta</td>
                                <td>Nombre</td>
                                <td>Email</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $key => $value)
                            <tr>
                                <td>{{ date("d/m/Y",strtotime($value->created_at)) }}</td>
                                <td>{{ $value->nombre }}</td>
                                <td>{{ $value->email }}</td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                    {{ HTML::link('admin/users', 'Ver Listado Completo', array('class' => 'pull-right')) }}
                @endif

                
            @endif

            @if (Auth::user()->role_id == 3)
                <h2>Ultimos Ventas ingresadas</h2>
                @if ($ventas->count() == 0)
                    <p>No hay ventas para mostrar.</p>
                @else
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <td>Evento</td>
                                <td>Nro.Cartón</td>
                                <td>Comprador</td>
                                <td>Estado</td>
                                <td>Precio</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($ventas as $key => $value)
                            <tr>
                                <td>{{ $value->evento->nombre }}</td>
                                <td>{{ $value->nro_carton }}</td>
                                <td>{{ $value->nombre_comprador }}</td>
                                <td>{{ $value->estado }}</td>
                                <td>$ {{ $value->precio }}</td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                    {{ HTML::link('admin/ventas', 'Ver Listado Completo', array('class' => 'pull-right')) }}
                @endif
            @endif
        </div>
    </div>
</div>
@stop