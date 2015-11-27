@extends('layouts.main')
@section('content')
	<div class="container">
    <div class="espacio"></div>
    <div class="row">

        <div class="wrap-404">
           <div class="logo-404">
           <h1>404</h1>
            <p>Ocurrió un Error! - Archivo no Encontrado</p>
              <div class="sub-404">
                <p><a href="{{{ URL::to('admin/dashboard') }}}">Volver</a></p>
              </div>
            </div>
        </div>
        
        
    </div>
</div>
@stop