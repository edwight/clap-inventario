
  <form method="post" action="/enviar" id="formulario">
    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
    <div class="inbox-body">
        <!-- formulario -->
        <h3 style="margin-bottom: 25px; text-align: center;">Formulario de Envio </h3>
        <button class="mybutton btn btn-primary" type="submit">Enviar</button>

        <div class="form-group">
          <label for="proveedor">Selecione un Centro clap:</label>
          <select class="form-control" id="proveedor" name="proveedor" required>
            <option> </option>
            @foreach($proveedores as $proveedor)
              <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="ubicacion">Selecione la ubicacion del Centro clap:</label>
          <select class="form-control" id="ubicacion" name="ubicacion" required>
            <option value=""> seleccione </option>
          </select>
        </div>
        <div class="form-group">
          <label for="user">Selecione un usuario :</label>
          <select class="form-control" id="users" name="user" required>
            <option> </option> 
              
          </select>
        </div>
        <div class="form-group">
          <textarea class="form-control" type="textarea" name="observacion" id="observacion" placeholder="Observacion" maxlength="140" rows="7"></textarea>
            <span class="help-block"><p id="characterLeft" class="help-block ">You have reached the limit</p></span>                    
        </div>
        <table class="table table-inbox table-hover">
            <!-- input search -->
              <div class="row">
                  <div class="col-sm-6 col-sm-offset-3">
                      <div id="imaginary_container"> 
                          <div class="input-group stylish-input-group">
                              <input type="text" class="form-control"  placeholder="Search" >
                              <span class="input-group-addon">
                                  <button type="submit">
                                      <span class="glyphicon glyphicon-search"></span>
                                  </button>  
                              </span>
                          </div>
                      </div>
                  </div>
              </div>
            <!-- end input search -->
          <tbody>
            @if(Auth::user()->proveedor_id == '1')
            
              @foreach($productos as $producto)
                <tr>
                    <td class="col-sm-8 col-md-6">
                    <div class="media">
                        <a class="thumbnail pull-left" style="margin-right: 6px" href="#"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"> </a>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="#">{{$producto->nombre}}</a></h4>
                            <h5 class="media-heading"> por <a href="#">{{$producto->unidad}}</a></h5>
                            <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                        </div>
                    </div></td>
                    <td class="col-sm-1 col-md-1" style="text-align: center">
                    <input type="number" name="stock[]" min="0" max="{{$producto->stock}}" value="0">
                    </td>
                    <td class="col-sm-1 col-md-1 text-center"><strong>{{$producto->categoria->nombre}}</td>
                    <td class="col-sm-1 col-md-1 text-center"><strong>{{$producto->marca->nombre}}</strong></td>
                    <td class="col-sm-1 col-md-1">
                      <span class="badge badge-info">
                        <input type="checkbox" name="productos_ids[]" value="{{$producto->id}}" class="mail-checkbox">
                      </span>
                    </td>
                </tr>
            @endforeach         
            @else
              @foreach($proveedor->productos as $producto)
                <tr class="">
                  <td class="inbox-small-cells">
                      <input type="checkbox" name="productos_ids[]" value="{{$producto->id}}" class="mail-checkbox">
                  </td>
                  <td class="view-message dont-show">{{$producto->nombre}}</td>
                  <td class="view-message"><input type="number" name="stock[]" min="0" max="{{$producto->pivot->stock_pivot}}" value="0"></td>
                  <td class="view-message inbox-small-cells"></td>
                  <td class="view-message text-right">March 15</td>
                  <td class="view-message text-right">
                    <a href="{{asset('detalles/'.$producto->id)}}" class="btn btn-success">Detalles</a>
                   </td>
                </tr>
              @endforeach
            @endif
          </tbody>
        </table>
        <!-- end componente lista-item -->
    </div>
  </form>
