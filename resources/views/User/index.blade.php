@extends('template.layout')
    @section('title', 'Proveedor Lista')
    @section('content')  

        <!-- componente lista-item -->
        
            <table class="table table-inbox table-hover">
                <tbody>
                    @foreach($users as $user)
                    <tr class="">
                        <td class="inbox-small-cells">
                        <img class="user-icon" src="{{asset('img/users/default.png')}}"/> 
                        </td>
                        <td class="view-message dont-show">{{$user->name}}</td>
                        <td class="view-message">{{$user->name}}</td>
                        <td class="view-message">enviados 25</td>
                        <td class="view-message">recibido 15</td>
                        <td class="view-message text-right">
                            <a href="{{asset('users/'.$user->id)}}" class="btn btn-success">Detalles</a>
                            <a href="{{asset('users/'.$user->id.'/edit')}}" class="btn btn-info">Editar</a>
                            <a href="{{asset('users/'.$user->id)}}" class="btn btn-danger">Eliminar</a>
                            </td>
                        <td class="view-message text-right">March 15</td>
                    </tr>
                    @endforeach
                
                </tbody>
            </table>
        <!-- end componente lista-item -->
    
    @endsection
    @section('style')
        <style>
            .user-icon{
                width:100px;
                height:100px;
            }
        </style>
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