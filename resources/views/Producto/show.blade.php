@extends('template.layout')
    @section('title', 'Home')
    @section('content')
        <!-- componente lista-item -->
        <div class="row">
            <div class="form-area col-lg-12">  

                <br style="clear:both">
                <h3 style="margin-bottom: 25px; text-align: center;">detalles de producto</h3>
                <div class="form-group">
                    <label>Nombre:</label>
                    <input type="text" class="form-control" id="nombre" value="{{$producto->nombre}}" placeholder="S/N">
                </div>
                <div class="form-group">
                    <label>Precio:</label>
                    <input type="text" class="form-control" id="precio" value="{{$producto->precio}}" placeholder="S/N">
                </div>
                <div class="form-group">
                    <label>cantidad:</label>
                    <input type="text" class="form-control" id="stock" value="{{$producto->stock}}" placeholder="cantidad">
                </div>
                <div class="form-group">
                    <label>Unidad:</label>
                    <input type="text" class="form-control" id="unidad" value="{{$producto->unidad}}" placeholder="Unidad">
                </div>
                <div class="form-group">
                    <label>Catgoria:</label>
                    <input type="text" class="form-control" id="categoria" value="{{$producto->categoria->nombre}}" placeholder="categoria">
                </div>
                <div class="form-group">
                    <label>Marca:</label>
                    <input type="text" class="form-control" id="categoria" value="{{$producto->marca->nombre}}" placeholder="categoria">
                </div>
                <div class="form-group">
                    <textarea class="form-control" type="textarea" id="message" placeholder="Message" maxlength="140" rows="7"></textarea>
                    <span class="help-block"><p id="characterLeft" class="help-block ">You have reached the limit</p></span>                    
                </div>           
            </div>
        </div>
        <!-- end componente lista-item -->

    @endsection
    @section('script')
    <script>
        let elemento = new Vue({
            el: '.app',
            data: {
                
                menu:0
            }
        })
    </script>
    @endsection