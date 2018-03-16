<aside class="sm-side">
      <!-- componente user-head -->
      <div class="user-head">
          <a class="inbox-avatar" href="javascript:;">
              <img  width="64" hieght="60" src="http://bootsnipp.com/img/avatars/ebeb306fd7ec11ab68cbcaa34282158bd80361a7.jpg">
          </a>
          <div class="user-name">
            @guest
              <h5><a href="/login">login</a></h5>
            @else
            <h5><a href="#">{{ Auth::user()->name }}</a></h5>
              <span><a href="#">{{ Auth::user()->email }}</a></span>
            @endguest
          </div>
          <a class="mail-dropdown pull-right" href="javascript:;">
              <i class="fa fa-chevron-down"></i>
          </a>
      </div>
      <!-- end componente user-head -->
      <div class="inbox-body">
        @guest
          <!-- no se muestra nada -->
        @else
          <a href="{{asset('productos/create')}}" title="Compose" class="btn btn-compose">
             crear producto
          </a>
          <a href="{{asset('users/create')}}" title="Compose" class="btn btn-compose">
             crear Usuario
          </a>
        @endguest
          
      </div>
      <!-- componente nav -->
      <ul class="inbox-nav inbox-divider">
          <li class="active">
              <a href="{{asset('/users')}}"><i class="fas fa-users"></i> User <span class="label label-danger pull-right">2</span></a>

          </li>
          <li>
              <a href="{{asset('/enviar')}}"><i class="fas fa-warehouse"></i>Enviar Rublos</a>
          </li>
          <li>
              <a href="{{asset('/proveedores')}}"><i class="fas fa-warehouse"></i>Centros clap</a>
          </li>
          <li>
              <a href="{{asset('/productos')}}"><i class="fas fa-boxes"></i>Productos</a>
          </li>
          <li>
              <a href="{{asset('/reporte')}}"><i class="fas fa-chart-bar"></i>Reporte</a>
          </li>
          <li>
              <a href="{{asset('/logActivity')}}"><i class="far fa-eye-slash"></i> Actividad de Usuario <span class="label label-info pull-right">30</span></a>
          </li>
          <li>
              <a href="#"><i class=" fa fa-trash-o"></i> Trash</a>
          </li>
      </ul>
      <ul class="nav nav-pills nav-stacked labels-info inbox-divider">
          <li> <a href="#"> <i class=" fa fa-sign-blank text-danger"></i> centro de acopio </a> </li>
          <li> <a href="#"> <i class=" fa fa-sign-blank text-success"></i> centro de distribucion </a> </li>
          <li> <a href="#"> <i class=" fa fa-sign-blank text-info "></i> clap </a>
          </li>
      </ul>
      <ul class="nav nav-pills nav-stacked labels-info inbox-divider">
          <li> <h4>Labels</h4> </li>
          <li> <a href="#"> <i class=" fa fa-sign-blank text-danger"></i> Work </a> </li>
          <li> <a href="#"> <i class=" fa fa-sign-blank text-success"></i> Design </a> </li>
          <li> <a href="#"> <i class=" fa fa-sign-blank text-info "></i> Family </a>
          </li><li> <a href="#"> <i class=" fa fa-sign-blank text-warning "></i> Friends </a>
          </li><li> <a href="#"> <i class=" fa fa-sign-blank text-primary "></i> Office </a>
          </li>
      </ul>
      <ul class="nav nav-pills nav-stacked labels-info ">
          <li> <h4>Buddy online</h4> </li>
          <li> <a href="#"> <i class=" fa fa-circle text-success"></i>Alireza Zare <p>I do not think</p></a>  </li>
          <li> <a href="#"> <i class=" fa fa-circle text-danger"></i>Dark Coders<p>Busy with coding</p></a> </li>
          <li> <a href="#"> <i class=" fa fa-circle text-muted "></i>Mentaalist <p>I out of control</p></a>
          </li><li> <a href="#"> <i class=" fa fa-circle text-muted "></i>H3s4m<p>I am not here</p></a>
          </li><li> <a href="#"> <i class=" fa fa-circle text-muted "></i>Dead man<p>I do not think</p></a>
          </li>
      </ul>
      <!-- end componente nav -->
      <div class="inbox-body text-center">
          <div class="btn-group">
              <a class="btn mini btn-primary" href="javascript:;">
                  <i class="fa fa-plus"></i>
              </a>
          </div>
          <div class="btn-group">
              <a class="btn mini btn-success" href="javascript:;">
                  <i class="fa fa-phone"></i>
              </a>
          </div>
          <div class="btn-group">
              <a class="btn mini btn-info" href="javascript:;">
                  <i class="fa fa-cog"></i>
              </a>
          </div>
      </div>

  </aside>