@extends ('layouts.admin')
@section ('contenido')
 

  <aside class="right-side">                
                <!-- Content Header (Page header) -->
              

                <!-- Main content -->
                <section class="content">
                 
                    <div class="error-page">
                       
                        	<img src="/img/icon1.png" align="left">
                        <div class="error-content">

                            <h3><i class="fa fa-warning text-yellow"></i> Oops! Lo Sentimos..!!</h3>
                            <h3>
                                Permiso Denegado. Solo Administradores pueden acceder a este modulo.<a href='/home'>Regresar a Inicio</a>
                            </h3>
                           
                        </div>
                    </div><!-- /.error-page -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->

@endsection 