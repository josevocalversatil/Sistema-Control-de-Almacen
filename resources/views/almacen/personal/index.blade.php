@extends ('layouts.admin')
@section ('contenido')
 
<!-- HACEMOS EL DISEÑO UTILIZANDO BOOTSTRAP  -->
<!-- include es para incluir el buscador  -->

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
                                    <h3>Listado de Personal <a href="personal/create"><button class="btn btn-success">Nuevo</button></a></a> Generar PDF <a href="{{ url('personalpdf') }}"><button class="btn btn-danger">PDF</button></a></h3>
                                   <!--@include('almacen.categoria.search')-->
                                                                        
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
   	    <thead>
   	    
   	    	<th>Nombre</th>
   	    	<th>Telefono</th>
          <th>Email</th>
          <th>Departamento</th>
   	      <th>Puesto</th>
          <th>Opciones</th>

   	    </thead>


        <!-- esta variable es la que tenemos en la funcion del controlador para mandar el articulo  -->
   	    @foreach ($personales as $per)
   	    <tr>
         
   
         <td>{{ $per->nombre}}</td>
         <td>{{ $per->telefono}}</td>
         <td>{{ $per->email}}</td>
         <td>{{ $per->departamento}}</td>
         <td>{{$per->puesto}}</td>


         <td>
         	<a href="{{URL::action('PersonalController@edit',$per->idpersonal)}}"><button class="btn btn-info">Editar</button></a>

          <a href="" data-target="#modal-delete-{{$per->idpersonal}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>

         </td>

   	    </tr>

          <!-- ESTE ES PARA INCLUIR EL MODAL PARA ELIMINAR -->
       @include('almacen.personal.modal')   	
       @endforeach

       <tfoot>
     
          <th>Nombre</th>
          <th>Telefono</th>
          <th>Email</th>
          <th>Departamento</th>
          <th>Puesto</th>
          <th>Opciones</th>
       </tfoot>
      
      </table> 	
    </div>

      </div>
      {{$personales->render()}}
      
   </div>
</div>
</section>
</div>



@endsection 