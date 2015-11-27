<div class="well sidebar-nav">
  <ul class="nav nav-pills nav-stacked">
    <li class="active"><a href="{{ URL::to('admin/dashboard') }}"><span class="glyphicon glyphicon-home"></span>  Home</a></li>

    @if (Auth::user()->role_id == 1)
        <li><a href="{{ URL::to('admin/users') }}"><span class="glyphicon glyphicon-user"></span> Clientes</a></li>
    @endif

    @if (Auth::user()->role_id == 2)
        <li><a href="{{ URL::to('admin/users') }}"><span class="glyphicon glyphicon-user"></span> Vendedores</a></li>
        <li><a href="{{ URL::to('admin/eventos') }}"><span class="glyphicon glyphicon-list-alt"></span> Eventos</a></li>
        <li><a href="{{ URL::to('admin/rangos') }}"><span class="glyphicon glyphicon-folder-close"></span> Rangos Cartones</a></li>
        <li><a href="{{ URL::to('admin/ventas') }}"><span class="glyphicon glyphicon-usd"></span> Ventas</a></li>
    @endif

    @if (Auth::user()->role_id == 3)
        <li><a href="{{ URL::to('admin/ventas') }}"><span class="glyphicon glyphicon-usd"></span> Ventas</a></li>
    @endif

    <li><a href="{{ URL::to('admin/listados') }}"><span class="glyphicon glyphicon-book"></span> Listados</a></li>

  </ul>
</div><!--/.well -->