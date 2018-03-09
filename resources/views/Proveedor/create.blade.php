@extends('template.layout')
@section('title', 'Proveedor Create')
    @section('content')
            <!-- componente lista-item -->
            <div class="row">
            <div class="form-area col-lg-12">  
                <form role="form" action="/proveedores" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <br style="clear:both">
                    <h3 style="margin-bottom: 25px; text-align: center;">Formulario de Creación</h3>
                    <div class="form-group">
                        <label>Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                    </div>
                    <button type="submit" id="submit" class="btn btn-primary pull-right">Submit Form</button>
                </form>
            </div>
            </div>
            <!-- end componente lista-item -->
    @endsection
 