<!DOCTYPE html>
<html>
<head> 
  <meta charset="UTF-8">
  <title>SISCA</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- bootstrap 3.0.2 -->

  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('css/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css" />
  <!-- font Awesome -->
  <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
  <!-- Ionicons -->
  <link href="{{asset('css/ionicons.min.css')}}" rel="stylesheet" type="text/css" />

  <link href="{{asset('css/datatables/dataTables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link href="{{asset('css/AdminLTE.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />



  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
          <![endif]-->

          <!-- Morris chart -->
          <link href="{{asset('css/morris/morris.css')}}" rel="stylesheet" type="text/css" />
          <!-- jvectormap -->
          <link href="{{asset('css/jvectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />
          <!-- fullCalendar -->
          <link href="{{asset('css/fullcalendar/fullcalendar.css')}}" rel="stylesheet" type="text/css" />
          <!-- Daterange picker -->
          <link href="{{asset('css/daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet" type="text/css" />
          <!-- bootstrap wysihtml5 - text editor -->
          <link href="{{asset('css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}" rel="stylesheet" type="text/css" />
          <!-- Theme style -->

          <script type="text/javascript">

          </script>     

        </head>
        <body class="skin-blue">
          <!-- header logo: style can be found in header.less -->
          <header class="header">
            <a href="#" class="logo">
              <!-- Add the class icon to your logo image or logo icon to add the margining -->
              Almacen
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
              <!-- Sidebar toggle button-->
              <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </a>
              <div class="navbar-right">
                <ul class="nav navbar-nav">



                  <!-- User Account: style can be found in dropdown.less -->
                  <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="glyphicon glyphicon-user"></i>
                      <span>{{ Auth::user()->name }}<i class="caret"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                      <!-- User image -->
                      <li class="user-header bg-light-blue">
                        <img src="{{asset('img/logo1.jpg')}}" class="img-circle" alt="User Image" />
                        <p>
                          {{ Auth::user()->name }}

                        </p>
                      </li>

                      <!-- Menu Footer-->
                      <li class="user-footer">

                        <div class="pull-right">
                         <center><a  href="{{url('/logout')}}" class="btn btn-default btn-flat" >Salir</a></center>   
                       </div>
                     </li>
                   </ul>
                 </li>
               </ul>
             </div>
           </nav>
         </header>

         <div class="wrapper row-offcanvas row-offcanvas-left">
          <!-- Left side column. contains the logo and sidebar -->
          <aside class="left-side sidebar-offcanvas">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
              <!-- Sidebar user panel -->
              <div class="user-panel">
                <div class="pull-left image">
                  <img src="{{asset('img/logo1.jpg')}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                  <p>Bienvenido</p>
                  <p>{{ Auth::user()->name }}</p>


                  <a href="#"><i class="fa fa-circle text-success"></i>Conectado</a>
                </div>
              </div>
              <!-- search form -->


              <!-- search form -->
              <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                  <input type="text" name="q" class="form-control" placeholder="Search..."/>
                  <span class="input-group-btn">
                    <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                  </span>
                </div>
              </form>
              <!-- /.search form -->
              <!-- sidebar menu: : style can be found in sidebar.less -->
              <ul class="sidebar-menu">
                <li class="active">
                  <a href="{{'/home'}}">
                    <i class="fa fa-home"></i> <span>Inicio</span>
                  </a>
                </li>
                <li>
                  <a href="{{url('almacen/articulo')}}">
                    <i class="fa fa-bar-chart-o"></i> <span>Inventario Gral.</span> <small class="badge pull-right bg-green">new</small>
                  </a>
                </li>
                
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-edit"></i>
                    <span>Registrar</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="{{url('almacen/categoria')}}"><i class="fa fa-angle-double-right"></i>Categoria</a></li>
                    <li><a href="{{url('almacen/departamento')}}"><i class="fa fa-angle-double-right"></i>Departamento</a></li>
                    <li><a href="{{url('almacen/usuario')}}"><i class="fa fa-angle-double-right"></i>Usuarios</a></li>
                    <li><a href="{{url('almacen/proveedor')}}"><i class="fa fa-angle-double-right"></i>Proveedores</a></li>
                    <li><a href="{{url('almacen/personal')}}"><i class="fa fa-angle-double-right"></i>Personal</a></li>
                  </ul>
                </li>

                
                

                <li class="treeview">
                  <a href="#">
                    <i class="glyphicon glyphicon-shopping-cart"></i>
                    <span>Stok's</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="{{url('almacen/stminimo')}}"><i class="fa fa-angle-double-right"></i>Stock Minimo</a></li>
                    <li><a href="{{url('almacen/stmaximo')}}"><i class="fa fa-angle-double-right"></i>Stock Maximo</a></li>
                    
                  </ul>
                </li>

                
                <li class="treeview">
                  <a href="#">
                    <i class="glyphicon glyphicon-shopping-cart"></i>
                    <span>Gestion Articulos</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="{{url('almacen/ingreso')}}"><i class="glyphicon glyphicon-circle-arrow-down"></i>Entrada Articulos</a></li>
                    <li><a href="{{url('almacen/salida')}}"><i class="glyphicon glyphicon-circle-arrow-up"></i>Salida Articulos</a></li>
                    <li><a href="{{url('almacen/memo')}}"><i class="glyphicon glyphicon-list-alt"></i>Memorandum</a></li>
                    
                    
                  </ul>
                </li>

                <li>
                  <a href="#">
                    <i class="fa fa-question-circle"></i> <span>Ayuda. ?</span> 
                  </a>
                </li>

                <li>
                  <a href="{{url('almacen/acerca')}}">
                    <i class="fa fa-info-circle"></i> <span>Acerca De..</span> 
                  </a>
                </li>
                
                
                
              </ul>
            </section>
            <!-- /.sidebar -->
          </aside>

          <!-- Right side column. Contains the navbar and content of the page -->
          <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <h1>
                BIENVENIDO
                <small>SISTEMA CONTROL DE ALMACEN (SISCA)</small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
              </ol>
            </section>

            <!-- Main content -->
            <section class="content">

              
              @yield('contenido')
              

            </section><!-- /.content -->
          </aside><!-- /.right-side -->
          

          <!-- add new calendar event modal -->


          
          <!-- jQuery 2.0.2 -->
          
          <!-- Bootstrap -->
          <script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
          <!-- AdminLTE App -->
          <script src="{{asset('js/AdminLTE/app.js')}}" type="text/javascript"></script>
          
          <script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
          <!--   <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script> -->
          <!-- jQuery UI 1.10.3 -->
          <script src="{{asset('js/jquery-ui-1.10.3.min.js')}}" type="text/javascript"></script>

        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search..."/>
            <span class="input-group-btn">
              <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
            </span>
          </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="active">
            <a href="{{'/home'}}">
              <i class="fa fa-home"></i> <span>Inicio</span>
            </a>
          </li>
          <li>
            <a href="{{url('almacen/articulo')}}">
              <i class="fa fa-bar-chart-o"></i> <span>Inventario Gral.</span> <small class="badge pull-right bg-green">new</small>
            </a>
          </li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-edit"></i>
              <span>Registrar</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{url('almacen/categoria')}}"><i class="fa fa-angle-double-right"></i>Categoria</a></li>
              <li><a href="{{url('almacen/departamento')}}"><i class="fa fa-angle-double-right"></i>Departamento</a></li>
              <li><a href="{{url('almacen/usuario')}}"><i class="fa fa-angle-double-right"></i>Usuarios</a></li>
              <li><a href="{{url('almacen/proveedor')}}"><i class="fa fa-angle-double-right"></i>Proveedores</a></li>
              <li><a href="{{url('almacen/personal')}}"><i class="fa fa-angle-double-right"></i>Personal</a></li>
            </ul>
          </li>




          <li class="treeview">
            <a href="#">
              <i class="glyphicon glyphicon-shopping-cart"></i>
              <span>Stok's</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{url('almacen/stminimo')}}"><i class="fa fa-angle-double-right"></i>Stock Minimo</a></li>
              <li><a href="{{url('almacen/stmaximo')}}"><i class="fa fa-angle-double-right"></i>Stock Maximo</a></li>

            </ul>
          </li>


          <li class="treeview">
            <a href="#">
              <i class="glyphicon glyphicon-shopping-cart"></i>
              <span>Gestion Articulos</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{url('almacen/ingreso')}}"><i class="glyphicon glyphicon-circle-arrow-down"></i>Entrada Articulos</a></li>
              <li><a href="{{url('almacen/salida')}}"><i class="glyphicon glyphicon-circle-arrow-up"></i>Salida Articulos</a></li>
              <li><a href="{{url('almacen/memo')}}"><i class="glyphicon glyphicon-list-alt"></i>Memorandum</a></li>


            </ul>
          </li>

          <li>
            <a href="#">
              <i class="fa fa-question-circle"></i> <span>Ayuda. ?</span> 
            </a>
          </li>

          <li>
            <a href="#">
              <i class="fa fa-info-circle"></i> <span>Acerca De..</span> 
            </a>
          </li>



        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          BIENVENIDO
          <small>SISTEMA CONTROL DE ALMACEN (SISCA)</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">


        @yield('contenido')


      </section><!-- /.content -->
    </aside><!-- /.right-side -->


    <!-- add new calendar event modal -->



    <!-- jQuery 2.0.2 -->

    <!-- Bootstrap -->
    <script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('js/AdminLTE/app.js')}}" type="text/javascript"></script>

    <script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
    <!--   <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script> -->
    <!-- jQuery UI 1.10.3 -->
    <script src="{{asset('js/jquery-ui-1.10.3.min.js')}}" type="text/javascript"></script>


          <!-- TABLES JQUERY

           <script src="{{asset('js/jquery-3.3.1.js')}}" type="text/javascript"></script>

         -->
         <script src="{{asset('js/plugins/datatables/jquery.dataTables.min.js')}}" type="text/javascript"></script>


         <script src="{{asset('js/plugins/datatables/jquery.dataTables.js')}}" type="text/javascript"></script>


         <script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
         <script src="{{asset('js/plugins/daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>
         <script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>


         <script src="{{asset('js/AdminLTE/app.js')}}" type="text/javascript"></script>



         <!--PDF-->
         <script src="{{asset('js/pdfmake.min.js')}}" type="text/javascript"></script>

         <script src="{{asset('js/html2canvas.min.js')}}" type="text/javascript"></script>


         <script src="{{asset('js/script.js')}}" type="text/javascript"></script>

















         <script type="text/javascript">






         //*******************BUSQUEDA POR COLUMNA GENERAL TODAS LAS COLUMNAS**************************************************************************************



         $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example1 tfoot th').each( function () {
      var title = $(this).text();
      $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );

    // DataTable
    var table = $('#example1').DataTable();

    // Apply the search
    table.columns().every( function () {
      var that = this;

      $( 'input', this.footer() ).on( 'keyup change', function () {
        if ( that.search() !== this.value ) {
          that
          .search( this.value )
          .draw();
        }
      } );
    } );

  } );









         function mayus(e) {
          e.value = e.value.toUpperCase();
        }
      </script>


      

      

      <!-- Bootstrap -->
      


      

      <script src="{{asset('js/bootstrap-select.min.js')}}" type="text/javascript"></script>
      <!-- Morris.js charts -->
      <script src="{{asset('js/raphael-min.js')}}"></script>
      <script src="{{asset('js/plugins/morris/morris.min.js')}}" type="text/javascript"></script>
      <!-- Sparkline -->
      <script src="{{asset('js/plugins/sparkline/jquery.sparkline.min.js')}}" type="text/javascript"></script>
      <!-- jvectormap -->
      <script src="{{asset('js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}" type="text/javascript"></script>
      <script src="{{asset('js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}" type="text/javascript"></script>
      <!-- fullCalendar -->
      <script src="{{asset('js/plugins/fullcalendar/fullcalendar.min.js')}}" type="text/javascript"></script>
      <!-- jQuery Knob Chart -->
      <script src="{{asset('js/plugins/jqueryKnob/jquery.knob.js')}}" type="text/javascript"></script>
      <!-- daterangepicker -->
      <script src="{{asset('js/plugins/daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>
      <!-- Bootstrap WYSIHTML5 -->
      <script src="{{asset('js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}" type="text/javascript"></script>
      <!-- iCheck -->
      <script src="{{asset('js/plugins/iCheck/icheck.min.js')}}" type="text/javascript"></script>

      <!-- AdminLTE App -->
      <script src="{{asset('js/AdminLTE/app.js')}}" type="text/javascript"></script>
      
      <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
      <script src="{{asset('js/AdminLTE/dashboard.js')}}" type="text/javascript"></script>  

      
      @stack('scripts')

    </body>



    <!-- Bootstrap -->





    <script src="{{asset('js/bootstrap-select.min.js')}}" type="text/javascript"></script>
    <!-- Morris.js charts -->
    <script src="{{asset('js/raphael-min.js')}}"></script>
    <script src="{{asset('js/plugins/morris/morris.min.js')}}" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="{{asset('js/plugins/sparkline/jquery.sparkline.min.js')}}" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="{{asset('js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}" type="text/javascript"></script>
    <!-- fullCalendar -->
    <script src="{{asset('js/plugins/fullcalendar/fullcalendar.min.js')}}" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('js/plugins/jqueryKnob/jquery.knob.js')}}" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="{{asset('js/plugins/daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{asset('js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="{{asset('js/plugins/iCheck/icheck.min.js')}}" type="text/javascript"></script>

    <!-- AdminLTE App -->
    <script src="{{asset('js/AdminLTE/app.js')}}" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('js/AdminLTE/dashboard.js')}}" type="text/javascript"></script>  




    @stack('scripts')

  </body>

  </html>