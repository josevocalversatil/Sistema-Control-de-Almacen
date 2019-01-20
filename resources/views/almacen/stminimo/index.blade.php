@extends ('layouts.admin')
@section ('contenido')
 
<!-- HACEMOS EL DISEÑO UTILIZANDO BOOTSTRAP  -->
<!-- include es para incluir el buscador  -->

 


<!-- HACEMOS EL DISEÑO AHORA METEMOS UNA TABLA  -->

   <style type="text/css">
  
tfoot input {
        width: 20%;
        padding: 3px;
        box-sizing: border-box;
    }

</style>


  <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            
                            
                            <div class="box">
                                <div class="box-header">
                                     <h3>Listado de Articulos Stock Minimo.  </a> Generar PDF <a href="{{ url('stminimopdf') }}"><button class="btn btn-danger">PDF</button></a></h3>                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped" class="table-danger">
                                        <thead>
                                            
                                                <th>Nombre</th>
                                                <th>Codigo</th>
                                                <th>Descripcion</th>
                                                 <th>Stock</th>
                                                <th>Stock minimo</th>
                                                <th>Stock maximo</th>
                                                
                                               
                                        
                                        </thead>
                                    
                                         
                                          <!-- esta variable es la que tenemos en la funcion del controlador para mandar el articulo  -->
        @foreach ($articulos as $art)
        <tr>
         
         
         <td>{{ $art->nombre}}</td>
         <td>{{ $art->codigo}}</td>
        
         <td>{{ $art->descripcion}}</td>
         <td>{{ $art->stock}}</td>
         <td>{{ $art->stock_minimo}}</td>
         <td>{{ $art->stock_maximo}}</td>
      
      
        </tr>

          <!-- ESTE ES PARA INCLUIR EL MODAL PARA ELIMINAR       {{$articulos->render()}} -->
     
       @endforeach
                                        <tfoot>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Codigo</th>
                                                <th>Descripcion</th>
                                                 <th>Stock</th>
                                                <th>Stock minimo</th>
                                                <th>Stock maximo</th>
                                                
                                         
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->

                   
        </div><!-- ./wrapper -->


                @endsection 