@extends('template.layout')
    @section('title', 'Home')
    @section('content')
        <!-- componente lista-item -->
        <div class="col-lg-12 col-sm-12">
            <div class="card hovercard">
                <div class="card-background">
                    <img class="card-bkimg" alt="" width="760" src="{{asset('img/Banner_clap.jpg')}}">
                    <!-- http://lorempixel.com/850/280/people/9/ -->
                </div>
                <div class="useravatar">
                    <img alt="" src="http://lorempixel.com/100/100/people/9/">
                </div>
                <div class="card-info"> <span class="card-title">producto nombre</span>

                </div>
            </div>
            <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
                <div class="btn-group" role="group">
                    <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                        <div class="hidden-xs">Lista de Producto</div>
                    </button>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                        <div class="hidden-xs">Graficos</div>
                    </button>
                </div>
                
            </div>
            <div class="well">
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="tab1">
                       
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
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>cantidad</th>
                                    <th class="text-center">Categoria</th>
                                    <th class="text-center">Marca</th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
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
                                        <strong>{{$producto->stock}}</strong>
                                        </td>
                                        <td class="col-sm-1 col-md-1 text-center"><strong>{{$producto->categoria->nombre}}</td>
                                        <td class="col-sm-1 col-md-1 text-center"><strong>{{$producto->marca->nombre}}</strong></td>
                                        <td class="col-sm-1 col-md-1">
                                        <button type="button" class="btn btn-danger">
                                            <span class="glyphicon glyphicon-remove"></span> Remove
                                        </button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade in" id="tab2">
                        <h3>This is tab 2</h3>
                        <div id="highcharts"></div>
                    </div>
                </div>
            </div>
            
        <!-- end componente lista-item -->

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
      <style>
        .fa.fa-arrow-circle-down{
          color:red;
        }
        .fa.fa-arrow-circle-up{
          color:green;
        }
      </style>
    @endsection
    @section('script')
    <script>
      $(document).ready(function() {
      $(".container .lg-side .btn-pref .btn").click(function () {
          $(".container .lg-side .btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
          // $(".tab").addClass("active"); // instead of this do the below 
          $(this).removeClass("btn-default").addClass("btn-primary");   
      });
      });
    </script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script type="text/javascript">
      Highcharts.chart('highcharts', {

        title: {
            text: 'Solar Employment Growth by Sector, 2010-2016'
        },

        subtitle: {
            text: 'Source: thesolarfoundation.com'
        },

        yAxis: {
            title: {
                text: 'Number of Employees'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 2010
            }
        },

        series: [{
            name: 'Installation',
            data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
        }, {
            name: 'Manufacturing',
            data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
        }, {
            name: 'Sales & Distribution',
            data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
        }, {
            name: 'Project Development',
            data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
        }, {
            name: 'Other',
            data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
        }],

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }

    });
    </script>
    @endsection