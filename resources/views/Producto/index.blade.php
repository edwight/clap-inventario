@extends('template.layout')
    @section('title', 'Home')
    @section('content')
        <!-- componente lista-item -->
        
            <table class="table table-inbox table-hover">
            <tbody>
                @foreach($productos as $producto)
                <tr class="unread">
                    <td class="inbox-small-cells">
                        <input type="checkbox" name="productos_ids[]" value="{{$producto->id}}" class="mail-checkbox">
                    </td>
                    <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
                    <td class="view-message dont-show">{{$producto->nombre}}</td>
                    <td class="view-message">{{$producto->stock}}</td>
                    <td class="view-message inbox-small-cells"></td>
                    <td class="view-message text-right">
                    <a href="{{asset('productos/'.$producto->id)}}" class="btn btn-success">Detalles</a>
                    <a href="{{asset('productos/'.$producto->id.'/edit')}}" class="btn btn-info">Editar</a>
                        <a href="{{asset('productos/'.$producto->id)}}" class="btn btn-danger">Eliminar</a>
                    </td>
                    <td class="view-message text-right">March 15</td>
                </tr>
                @endforeach
            </tbody>
            </table>
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