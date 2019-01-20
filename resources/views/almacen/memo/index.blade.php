@extends ('layouts.admin4')
@section ('contenido')
 
<!-- HACEMOS EL DISEÑO UTILIZANDO BOOTSTRAP  -->
<!-- include es para incluir el buscador  -->


 

<!-- HACEMOS EL DISEÑO AHORA METEMOS UNA TABLA  -->

<style type="text/css">
  
tfoot input {
        width: 90%;
        padding: 3px;
        box-sizing: border-box;
    }

</style>
<section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            
                            
                            <div class="box">
                                <div class="box-header">
                                    <h3>Listado Memorandum's <a href="memo/create"><button class="btn btn-success">Nuevo</button></a> Generar PDF <a href="{{ url('#') }}"><button class="btn btn-danger">PDF</button></a></h3>
                                
                                   
            <div class="row">

     <div class=" col-xs-6">
            <div class="panel panel-primary">
                <div class="panel-body">

            <h5>Buscar por Rango (Fechas) </h5>

            <tr>
           <td>Fecha Mim:</td>
            <td><input type="text" id="dammin" name="dammin"></td>
          </tr>
          <tr>
            <td>Fecha Max:</td>
            <td><input type="text" id="dammax" name="dammax"></td>
         </tr>
         </div>
         </div>
          </div>


                <div class=" col-xs-6">
            <div class="panel panel-primary">
                <div class="panel-body">
            

       <h5>Busqueda por Rango (#Folio Memo) </h5>

          <tr>
           <td> Folio Minimo:</td>
            <td><input type="text" id="fomin" name="fomin"></td>
          </tr>
          <tr>
            <td> Folio Maximo:</td>
            <td><input type="text" id="fomax" name="fomax"></td>
         </tr>
    
     
         </div>
          </div>
          </div>

              <div class=" col-xs-6">
            <div class="panel panel-primary">
                <div class="panel-body">
            

       <h5>Busqueda por Rango (# Memo) </h5>

          <tr>
           <td>Memo Min:</td>
            <td><input type="text" id="nummin" name="nummin"></td>
          </tr>
          <tr>
            <td>Memo Max:</td>
            <td><input type="text" id="nummax" name="nummax"></td>
         </tr>
    
     
         </div>
          </div>
          </div>
 

           
          </div>




                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example3" class="table table-bordered table-striped">
   	    <thead>
   	    	
   	    	<th>Fecha</th>
          <th>#Folio memo</th>
   	    	<th># memo</th>
        
          <th>Autoriza</th>
          <th>Recibe</th>
          <th>Departamento</th>  
          <th>Opciones</th>

   	    </thead>

   	    @foreach ($memos as $mem)
   	    <tr>
         
         
         <td>{{ $mem->fecha_hora}}</td>
         <td>{{ $mem->folio_memo}}</td>
         <td>{{ $mem->numero_memo}}</td>
         <td>{{ $mem->personal3}}</td>
         <td>{{ $mem->personal4}}</td>
         <td>{{ $mem->depa}}</td>
     

         <td>
         	<a href="{{URL::action('MemoController@show',$mem->idmemo)}}"><button class="btn btn-primary">Detalles</button></a>
            <a href="" data-target="#modal-delete-{{$mem->idmemo}}" data-toggle="modal"><button class="btn btn-danger">Anular</button></a>

         </td>

   	    </tr>

          <!-- ESTE ES PARA INCLUIR EL MODAL PARA ELIMINAR -->
       @include('almacen.memo.modal')   	
       @endforeach

       <tfoot>
         <th>Fecha</th>
          <th>#Folio memo</th>
          <th># memo</th>
          <th># Memo</th>
          <th>Autoriza</th>
          <th>Recibe</th>
          <th>Opciones</th>

       </tfoot>
      
      </table> 	
    </div>

      </div>
    
      
   </div>
</div>
</section>
</div>



@endsection 