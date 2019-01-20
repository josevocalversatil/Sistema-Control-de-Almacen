@extends ('layouts.admin')
@section ('contenido')
 
<!-- HACEMOS EL DISEÑO UTILIZANDO BOOTSTRAP  -->
<!-- include es para incluir el buscador  -->



<!-- HACEMOS EL DISEÑO AHORA METEMOS UNA TABLA  -->

<style type="text/css">
  
tfoot input {
        width: 80%;
        padding: 3px;
        box-sizing: border-box;
    }

</style>
<section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            
                            
                            <div class="box">
                                <div class="box-header">
                                    <h3>Listado de Proveedores <a href="proveedor/create"><button class="btn btn-success">Nuevo</button></a>
                                    Generar PDF <a href="{{url('proveedorpdf') }}"><button class="btn btn-danger">PDF</button></a></h3>
                           
                                                                        
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
   	    <thead>
   	   
   	    	<th>Nombre</th>
   	    	<th>Direccion</th>
          <th>Telefono</th>
          <th>Email</th>
          <th>Razon Social</th>
          <th>Rfc</th>
   	    	<th>Opciones</th>

   	    </thead>

   	    @foreach ($proveedores as $prov)
   	    <tr>
         
      
         <td>{{ $prov->nombre}}</td>
         <td>{{ $prov->direccion}}</td>
         <td>{{ $prov->telefono}}</td>
         <td>{{ $prov->email}}</td>
         <td>{{ $prov->razon_social}}</td>
         <td>{{ $prov->rfc}}</td>
         <td>
        <a href="{{URL::action('ProveedorController@edit',$prov->idproveedor)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
            <a href="" data-target="#modal-delete-{{$prov->idproveedor}}" data-toggle="modal" class="btn btn-danger btn-sm"><i class="fa fa-eraser"></i></a>
         </td>

   	    </tr>

          <!-- ESTE ES PARA INCLUIR EL MODAL PARA ELIMINAR -->
       @include('almacen.proveedor.modal')   	
       @endforeach


       <tfoot>
     
          <th>Nombre</th>
          <th>Direccion</th>
          <th>Telefono</th>
          <th>Email</th>
          <th>Razon Social</th>
          <th>Rfc</th>
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