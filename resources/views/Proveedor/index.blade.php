@extends('template.layout')
    @section('title', 'Proveedor Lista')
    @section('content')   
               <div class="mail-option">
                   <div class="chk-all">
                       <input type="checkbox" class="mail-checkbox mail-group-checkbox">
                       <div class="btn-group">
                           <a data-toggle="dropdown" href="#" class="btn mini all" aria-expanded="false">
                               All
                               <i class="fa fa-angle-down "></i>
                           </a>
                           <ul class="dropdown-menu">
                               <li><a href="#"> None</a></li>
                               <li><a href="#"> Read</a></li>
                               <li><a href="#"> Unread</a></li>
                           </ul>
                       </div>
                   </div>

                   <div class="btn-group">
                       <a data-original-title="Refresh" data-placement="top" data-toggle="dropdown" href="#" class="btn mini tooltips">
                           <i class=" fa fa-refresh"></i>
                       </a>
                   </div>
                   <div class="btn-group hidden-phone">
                       <a data-toggle="dropdown" href="#" class="btn mini blue" aria-expanded="false">
                           More
                           <i class="fa fa-angle-down "></i>
                       </a>
                       <ul class="dropdown-menu">
                           <li><a href="#"><i class="fa fa-pencil"></i> Mark as Read</a></li>
                           <li><a href="#"><i class="fa fa-ban"></i> Spam</a></li>
                           <li class="divider"></li>
                           <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
                       </ul>
                   </div>
                   <div class="btn-group">
                       <a data-toggle="dropdown" href="#" class="btn mini blue">
                           Move to
                           <i class="fa fa-angle-down "></i>
                       </a>
                       <ul class="dropdown-menu">
                           <li><a href="#"><i class="fa fa-pencil"></i> Mark as Read</a></li>
                           <li><a href="#"><i class="fa fa-ban"></i> Spam</a></li>
                           <li class="divider"></li>
                           <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
                       </ul>
                   </div>
                   
                   <ul class="unstyled inbox-pagination">
                       <li><span>1-50 of 234</span></li>
                       <li>
                           <a class="np-btn" href="#"><i class="fa fa-angle-left  pagination-left"></i></a>
                       </li>
                       <li>
                           <a class="np-btn" href="#"><i class="fa fa-angle-right pagination-right"></i></a>
                       </li>
                   </ul>
               </div>
               <!-- componente lista-item -->
               
                    <table class="table table-inbox table-hover">
                      <tbody>
                        @foreach($proveedores as $proveedor)
                        <tr class="">
                            <td class="inbox-small-cells">
                                <input type="checkbox" name="productos_ids[]" value="{{$proveedor->id}}" class="mail-checkbox">
                            </td>
                            <td class="view-message dont-show">{{$proveedor->nombre}}</td>
                            <td class="view-message">usuarios 34</td>
                            <td class="view-message">enviados 25</td>
                            <td class="view-message">recibido 15</td>
                            <td class="view-message text-right">
                              <a href="{{asset('proveedores/'.$proveedor->id)}}" class="btn btn-success">Detalles</a>
                              <a href="{{asset('proveedores/'.$proveedor->id.'/edit')}}" class="btn btn-info">Editar</a>
                               <a href="{{asset('proveedores/'.$proveedor->id)}}" class="btn btn-danger">Eliminar</a>
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