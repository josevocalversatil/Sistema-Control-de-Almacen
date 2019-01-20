@extends ('layouts.admin')
@section ('contenido')
 
<!-- HACEMOS EL DISEÑO UTILIZANDO BOOTSTRAP  -->
<!-- include es para incluir el buscador  -->


<!-- HACEMOS EL DISEÑO AHORA METEMOS UNA TABLA  -->
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
                                    <h3>Listado de Usuarios <a href="usuario/create"><button class="btn btn-success">Nuevo</button></a> </a> Generar PDF <a href="{{ url('usuariospdf') }}"><button class="btn btn-danger">PDF</button></a></h3>
                                   <!--@include('almacen.categoria.search')-->
                                                                        
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">

   	    <thead>
   	  
   	    	<th>Nombre</th>
   	    	<th>Email</th>
   	    	<th>Opciones</th>

   	    </thead>

   	    @foreach ($usuarios as $usu)
   	    <tr>
         
      
         <td>{{ $usu->name}}</td>
         <td>{{ $usu->email}}</td>
         <td>
         	<a href="{{URL::action('UsuarioController@edit',$usu->id)}}"><button class="btn btn-info">Editar</button></a>
            <a href="" data-target="#modal-delete-{{$usu->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>

         </td>

   	    </tr>

          <!-- ESTE ES PARA INCLUIR EL MODAL PARA ELIMINAR -->
       @include('almacen.usuario.modal')   	
       @endforeach

       <tfoot>
      
          <th>Nombre</th>
          <th>Email</th>
          <th>Opciones</th>

       </tfoot>
      
      </table> 	
    </div>

      </div>
      {{$usuarios->render()}}
      
   </div>
</div>
</section>
</div>



@endsection 