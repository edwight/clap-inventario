@extends('template.layout')
    @section('title', 'Proveedor Detalles')
    @section('content')
    	<!-- componente show-->
        <div class="col-lg-12 col-sm-12">
            <div class="card hovercard">
                <div class="card-background">
                    <img class="card-bkimg" alt="" width="760" src="{{asset('img/Banner_clap.jpg')}}">
                    <!-- http://lorempixel.com/850/280/people/9/ -->
                </div>
                <div class="useravatar">
                    <img alt="" src="http://lorempixel.com/100/100/people/9/">
                </div>
                <div class="card-info"> <span class="card-title">nombre </span>

                </div>
            </div>
            <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
                <div class="btn-group" role="group">
                    <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                        <div class="hidden-xs">Formulario</div>
                    </button>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                        <div class="hidden-xs">enviados</div>
                    </button>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" id="favorites" class="btn btn-default" href="#tab3" data-toggle="tab"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                        <div class="hidden-xs">Recibido</div>
                    </button>
                </div>
                
            </div>

            <div class="well">
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="tab1">
                        @include('template.formularios.enviar_rublos')
                    </div>
                    <div class="tab-pane fade in" id="tab2">
                        <h3>detalles enviado</h3>
                        @foreach($detalles as $detalle)
                        	{{$detalle->id}} - {{$detalle->titulo}}-> centro clap:{{$detalle->proveedor->nombre}} 
                        @endforeach
                    </div>

                    <div class="tab-pane fade in" id="tab3">
                        <h3>This is tab 2</h3>
                        <div id="highcharts"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end componente show -->            
        
    @endsection
    @section('style')
    	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      	<style type="text/css">
	        /* USER PROFILE PAGE */
	        #imaginary_container{
	            margin-top:10%; /* Don't copy this */
	            margin-bottom: 10%;
	        }
	        .stylish-input-group .input-group-addon{
	            background: white !important; 
	        }
	        .stylish-input-group .form-control{
	            border-right:0; 
	            box-shadow:0 0 0; 
	            border-color:#ccc;
	        }
	        .stylish-input-group button{
	            border:0;
	            background:transparent;
	        }
	        
	         .card {
	            margin-top: 20px;
	            padding: 30px;
	            background-color: rgba(214, 224, 226, 0.2);
	            -webkit-border-top-left-radius:5px;
	            -moz-border-top-left-radius:5px;
	            border-top-left-radius:5px;
	            -webkit-border-top-right-radius:5px;
	            -moz-border-top-right-radius:5px;
	            border-top-right-radius:5px;
	            -webkit-box-sizing: border-box;
	            -moz-box-sizing: border-box;
	            box-sizing: border-box;
	        }
	        .card.hovercard {
	            position: relative;
	            padding-top: 0;
	            overflow: hidden;
	            text-align: center;
	            background-color: #fff;
	            background-color: rgba(255, 255, 255, 1);
	        }
	        .card.hovercard .card-background {
	            height: 130px;
	        }
	        .card-background img {
	            -webkit-filter: blur(25px);
	            -moz-filter: blur(25px);
	            -o-filter: blur(25px);
	            -ms-filter: blur(25px);
	            filter: blur(25px);
	            margin-left: -100px;
	            margin-top: -200px;
	            min-width: 130%;
	        }
	        .card.hovercard .useravatar {
	            position: absolute;
	            top: 15px;
	            left: 0;
	            right: 0;
	        }
	        .card.hovercard .useravatar img {
	            width: 100px;
	            height: 100px;
	            max-width: 100px;
	            max-height: 100px;
	            -webkit-border-radius: 50%;
	            -moz-border-radius: 50%;
	            border-radius: 50%;
	            border: 5px solid rgba(255, 255, 255, 0.5);
	        }
	        .card.hovercard .card-info {
	            position: absolute;
	            bottom: 14px;
	            left: 0;
	            right: 0;
	        }
	        .card.hovercard .card-info .card-title {
	            padding:0 5px;
	            font-size: 20px;
	            line-height: 1;
	            color: #262626;
	            background-color: rgba(255, 255, 255, 0.1);
	            -webkit-border-radius: 4px;
	            -moz-border-radius: 4px;
	            border-radius: 4px;
	        }
	        .card.hovercard .card-info {
	            overflow: hidden;
	            font-size: 12px;
	            line-height: 20px;
	            color: #737373;
	            text-overflow: ellipsis;
	        }
	        .card.hovercard .bottom {
	            padding: 0 20px;
	            margin-bottom: 17px;
	        }
	        .btn-pref .btn {
	            -webkit-border-radius:0 !important;
	        }
      </style>
    @endsection
    @section('script')
    <script type="text/javascript">
    	$(document).ready(function() {
	      $(".container .lg-side .btn-pref .btn").click(function () {
	          $(".container .lg-side .btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
	          // $(".tab").addClass("active"); // instead of this do the below 
	          $(this).removeClass("btn-default").addClass("btn-primary");   
	      });
      	});
    	jQuery(document).ready(function($){
		    $('#proveedor').change(function(){
		      $.get("{{ url('api/dropdown/localizacion')}}", 
		        { option: $(this).val() }, 
		        function(data) {
		          var parroquia = $('#ubicacion');
		          parroquia.empty();
		 
		          $.each(data, function(index, element) {
		                  parroquia.append("<option value='"+ index +"'>" + element + "</option>");
		            });
		        });
		    });
		  });
    	jQuery(document).ready(function($){
		    $('#ubicacion').change(function(){
		      $.get("{{ url('api/dropdown/users')}}", 
		        { option: $(this).val() }, 
		        function(data) {
		        	console.log(data);
		          var users = $('#users');
		          users.empty();
		 			
		          $.each(data, function(index, element) {
		          	console.log(data)
		                  users.append("<option value='"+ index +"'>" + element + "</option>");
		              });
		        });
		    });
		  });</script>
    @endsection


      