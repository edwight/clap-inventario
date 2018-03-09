@extends('template.layout')
    @section('title', 'Home')
    @section('content')
        <!-- componente lista-item -->
        <div class="row">
            <div class="form-area col-lg-12">  

                <br style="clear:both">
                <h3 style="margin-bottom: 25px; text-align: center;">detalles de Usuario</h3>
                <div class="form-group">
                    <label>Nombre:</label>
                    <input type="text" class="form-control" id="nombre" value="{{$user->name}}" placeholder="S/N">
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="text" class="form-control" id="precio" value="{{$user->email}}" placeholder="S/N">
                </div>           
            </div>
        </div>
        <!-- end componente lista-item -->
        <table class="table table-inbox table-hover">
        <tbody>
          <h1>log de Usuario</h1>

              <tr class="">
                <td class="inbox-small-cells">
                   
                </td>
                <td class="view-message dont-show"></td>
                <td class="view-message"></td>
                <td class="view-message inbox-small-cells"></td>
                <td class="view-message text-right">March 15</td>
                <td class="view-message text-right">
                  <a href="#" class="btn btn-success">Detalles</a>
                 </td>
              </tr>
         
     
        </tbody>
      </table>

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