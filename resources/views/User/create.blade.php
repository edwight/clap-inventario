@extends('template.layout')
    @section('title', 'Proveedor Lista')
    @section('content')  
      <!-- componente lista-item -->
      <div class="row">
                    <div class="form-area col-lg-12">  
                      <form role="form" action="/users" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <br style="clear:both">
                            <h3 style="margin-bottom: 25px; text-align: center;">Formulario de Creación</h3>
                            <div class="form-group">
                                <label>Nombre:</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="correo electronico">
                            </div>
                            <div class="form-group">
                                <label>Telefono:</label>
                                <input type="text" class="form-control" id="phone" name="telefono" placeholder="numero de telefono">
                            </div>
                            <div class="form-group">
                                <label>password:</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label>Centro clap:</label>
                                <select id="proveedor" name="proveedor" class="form-control">
                                  <option>selecione un centro de clap</option>
                                  @foreach($proveedores as $proveedors)
                                    <option value="{{$proveedors->id}}">{{$proveedors->nombre}}</option>
                                  @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ubicacion">Selecione la ubicacion del Centro clap:</label>
                                <select class="form-control" id="ubicacion" name="ubicacion" required>
                                  <option> </option>
                                  <option value="1">La Pastora: Casa de cultura. </option>
                                  <option value="2">San Agustín: Urbanismo Tomar Torrijos. </option>
                                </select>
                            </div>
                            <div class="form-group">
                            <textarea class="form-control" type="textarea" id="message" placeholder="Message" maxlength="140" rows="7"></textarea>
                                <span class="help-block"><p id="characterLeft" class="help-block ">You have reached the limit</p></span>   
                            </div>
                            <div class="form-group">
                                <label>Subir Imagen</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <span class="btn btn-default btn-file">
                                            Browse… <input type="file" name="photo" class="custom-file-input" id="imgInp">
                                        </span>
                                    </span>
                                    <input type="text" class="form-control" readonly>
                                </div>
                                <img id='img-upload'/>
                            </div>
                            <button type="submit" id="submit" class="btn btn-primary pull-right">Enviar</button>
                      </form>
                    </div>
                  </div>
                  <!-- end componente lista-item -->
    @endsection
    @section('style')
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>
        .btn-file {
                position: relative;
                overflow: hidden;
            }
         .btn-file input[type=file] {
                position: absolute;
                top: 0;
                right: 0;
                min-width: 100%;
                min-height: 100%;
                font-size: 100px;
                text-align: right;
                filter: alpha(opacity=0);
                opacity: 0;
                outline: none;
                background: white;
                cursor: inherit;
                display: block;
            }
        #img-upload {
                width: 100%;
            }
    </style>
    @endsection
    @section('script')
    <script>
        $(document).ready( function() {
            $(document).on('change', '.btn-file :file', function() {
            var input = $(this),
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [label]);
            });

            $('.btn-file :file').on('fileselect', function(event, label) {
                
                var input = $(this).parents('.input-group').find(':text'),
                    log = label;
                
                if( input.length ) {
                    input.val(log);
                } else {
                    if( log ) alert(log);
                }
            
            });
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    
                    reader.onload = function (e) {
                        $('#img-upload').attr('src', e.target.result);
                    }
                    
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#imgInp").change(function(){
                readURL(this);
            }); 	
        });
    </script>
    @endsection