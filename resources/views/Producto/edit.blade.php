@extends('template.layout')
    @section('title', 'Home')
    @section('content')
        <!-- componente lista-item -->
        <div class="row">
        <div class="form-area col-lg-12">  
            <form role="form" action="/productos/{{$producto->id}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                <br style="clear:both">
                <h3 style="margin-bottom: 25px; text-align: center;">Editar Producto</h3>
                <div class="form-group">
                    <label>Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{$producto->nombre}}" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label>Precio:</label>
                    <input type="text" class="form-control" id="precio" name="precio"  value="{{$producto->precio}}" placeholder="Precio">
                </div>
                <div class="form-group">
                    <label>cantidad:</label>
                    <input type="text" class="form-control" id="stock" name="stock"  value="{{$producto->stock}}" placeholder="cantidad">
                </div>
                <div class="form-group">
                    <label>Unidad:</label>
                    <input type="text" class="form-control" id="unidad" name="unidad"  value="{{$producto->stock}}" placeholder="Unidad">
                </div>
                <div class="form-group">
                    <label>Catgoria:</label>
                    <select id="categoria" name="categoria" class="form-control">
                        <option value="{{$producto->categoria->id}}">
                        {{$producto->categoria->nombre}}
                        </option>
                        @foreach($categorias as $categoria)
                        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Marca:</label>
                    <select id="marca" name="marca" class="form-control">
                        <option value="{{$producto->marca->id}}">
                        {{$producto->marca->nombre}}
                        </option>
                        @foreach($marcas as $marca)
                        <option value="{{$marca->id}}">{{$marca->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                <textarea class="form-control" type="textarea" id="message" placeholder="Message" maxlength="140" rows="7"></textarea>
                    <span class="help-block"><p id="characterLeft" class="help-block ">You have reached the limit</p></span>   
                </div>
                <button type="submit" id="submit" class="btn btn-primary pull-right">Submit Form</button>
            </form>
        </div>
        </div>
        <!-- end componente lista-item -->
    </div>
             
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