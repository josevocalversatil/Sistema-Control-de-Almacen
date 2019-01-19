@extends ('layouts.admin')
@section ('contenido')
 
<!-- HACEMOS EL DISEÑO UTILIZANDO BOOTSTRAP  -->
<!-- include es para incluir el buscador  -->
 <style type="text/css">
  
tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }

</style>
<section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            
                            
                            <div class="box">
                                <div class="box-header">
                                    <h3>Listado de Departamentos <a href="departamento/create"><button class="btn btn-success">Nuevo</button></a> Generar PDF <a href="{{url('departamentopdf') }}"><button class="btn btn-danger">PDF</button></a></h3>
                                   <!--@include('almacen.categoria.search')-->
                                                                        
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">


   	    <thead>
   	    
   	    	<th>Nombre</th>
   	    	<th>Descripcion</th>
   	    	<th>Opciones</th>

   	    </thead>

   	    @foreach ($departamentos as $dep)
   	    <tr>
         
       
         <td>{{ $dep->nombre}}</td>
         <td>{{ $dep->descripcion}}</td>
         <td>
         	<a href="{{URL::action('DepartamentoController@edit',$dep->iddepartamento)}}"><button class="btn btn-info">Editar</button></a>
            <a href="" data-target="#modal-delete-{{$dep->iddepartamento}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>

         </td>

   	    </tr>

          <!-- ESTE ES PARA INCLUIR EL MODAL PARA ELIMINAR -->
       @include('almacen.departamento.modal')   	
       @endforeach

       <tfoot>
      
          <th>Nombre</th>
          <th>Descripcion</th>
          <th>Opciones</th>

       </tfoot>
      
      </table> 
      </div>	

      </div>
      {{$departamentos->render()}}
      
   </div>
</div>

</section>
</div>

@endsection 