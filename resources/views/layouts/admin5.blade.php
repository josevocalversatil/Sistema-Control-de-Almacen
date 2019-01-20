<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>AdminLTE | Data Tables</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="{{asset('css/ionicons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <link href="{{asset('css/datatables/dataTables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{asset('css/AdminLTE.css')}}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
          <![endif]-->
      </head>
      <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="../../index.html" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                AdminLTE
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
                        <!-- Messages: style can be found in dropdown.less-->

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
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- NAV TODO BN   -->


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
                            p>Bienvenido</p>
                            <p>{{ Auth::user()->name }}</p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Conectado</a>
                        </div>
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
                        Data Tables
                        <small>advanced tables</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Tables</a></li>
                        <li class="active">Data tables</li>
                    </ol>
                </section>

                <!-- Main content -->

                @yield('contenido')

            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="{{asset('js/jquery.min.js')}}"></script>


        <!-- Bootstrap -->
        <script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="{{asset('js/plugins/datatables/jquery.dataTables.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/plugins/datatables/dataTables.bootstrap.js')}}" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('js/AdminLTE/app.js')}}" type="text/javascript"></script>



        <!--PDF-->
        <script src="{{asset('js/pdfmake.min.js')}}" type="text/javascript"></script>

        <script src="{{asset('js/html2canvas.min.js')}}" type="text/javascript"></script>


        <script src="{{asset('js/script.js')}}" type="text/javascript"></script>



        

        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });



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
</script>

</body>
</html>