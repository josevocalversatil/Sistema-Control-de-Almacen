@extends ('layouts.admin')
@section ('contenido')
 
<!-- HACEMOS EL DISEÑO UTILIZANDO BOOTSTRAP  -->
<!-- include es para incluir el buscador  -->

  

<section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            
                            
                            <div class="box">
                                <div class="box-header">
                                    <h3>Listado de Articulos en Stock Maximo</h3>
                                   <!--@include('almacen.categoria.search')-->
                                                                        
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped" border="0" cellpadding="0" cellspacing="0" >

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
         
          <th>Nombre</th>
          <th>Codigo</th>
     
          <th>Descripcion</th>
          <th>Stock</th>
          <th>Stock minimo</th>
          <th>Stock maximo</th>
         


       </tfoot>

      </table> 	

      </div>
</div>
      
   </div>
</div>
</section>
</div>


@endsection 