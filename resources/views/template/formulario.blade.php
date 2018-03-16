
  <form method="post" action="/detalles" id="formulario">
    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
    <div class="inbox-body">
        <!-- formulario -->
        <h3 style="margin-bottom: 25px; text-align: center;">Formulario de Envio </h3>
        <button class="mybutton btn btn-primary" type="submit">Enviar</button>

        <div class="form-group">
            <label for="user">Selecione un usuario :</label>
            <select class="form-control" id="user" name="user_recibido" required>
              <option> </option> 
                @foreach($enviarProveedor->users as $user)
                  <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="proveedor">Selecione un Centro clap:</label>
            <select class="form-control" id="proveedor" name="proveedor" required>
              <option> </option>
                <option value="{{$enviarProveedor->id}}">{{$enviarProveedor->nombre}}</option>
            </select>
        </div>
        <div class="form-group">
            <label for="ubicacion">Selecione la ubicacion del Centro clap:</label>
            <select class="form-control" id="ubicacion" name="ubicacion" required>
              <option> </option>
              @foreach($enviarProveedor->localizaciones as $ubiacion)
                <option value="{{$ubiacion->id}}">{{$ubiacion->nombre}} </option>
              @endforeach
            </select>
        </div>
        
        <div class="form-group">
          <textarea class="form-control" type="textarea" name="observacion" id="message" placeholder="Observacion" maxlength="140" rows="7"></textarea>
            <span class="help-block"><p id="characterLeft" class="help-block ">You have reached the limit</p></span>                    
        </div>
      <table class="table table-inbox table-hover">
        <tbody>
          @if(Auth::user()->proveedor_id == '1')
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
            @foreach($productos as $producto)
              <tr class="">
                <td class="inbox-small-cells">
                    <input type="checkbox" name="productos_ids[]" value="{{$producto->id}}" class="mail-checkbox">
                </td>
                <td class="view-message dont-show">{{$producto->nombre}}</td>
                <td class="view-message"><input type="number" name="stock[]" min="0" max="{{$producto->stock}}" value="0"></td>
                <td class="view-message inbox-small-cells"></td>
                <td class="view-message text-right">March 15</td>
                <td class="view-message text-right">
                  <a href="{{asset('detalles/'.$producto->id)}}" class="btn btn-success">Detalles</a>
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
