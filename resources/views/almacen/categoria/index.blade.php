@extends ('layouts.admin')
@section ('contenido')

<!-- HACEMOS EL DISEÑO UTILIZANDO BOOTSTRAP  -->
<!-- include es para incluir el buscador  -->


<!-- HACEMOS EL DISEÑO AHORA METEMOS UNA TABLA  -->

<section class="content">
  <div class="row">
    <div class="col-xs-12">                          
      <div class="box">

       <div class="box-header">
        <h3>Listado de Categorias <a href="categoria/create"><button class="btn btn-success">Nuevo</button></a> Generar PDF <a href="{{url('categoriapdf') }}"><button class="btn btn-danger">PDF</button></a></h3>

        Generar PDF <a href="{{url('descargarPdfArticulos') }}"><button class="btn btn-danger">PDF</button></a></h3>
        <!--@include('almacen.categoria.search')-->
        
      </div><!-- /.box-header -->


      <div class="box-header">
        <h3 class="box-title">Data Table With Full Features</h3>                                    
      </div><!-- /.box-header -->
      <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
             <tr>
               <th>Nombre</th>
               <th>Descripcion</th> 
               <th>Opciones</th>
             </tr>
           </tr>
         </thead>
         <tbody>
          @foreach ($categorias as $cat)
          <tr>
           
            
            <td>{{ $cat->nombre}}</td>
            <td>{{ $cat->descripcion}}</td>

            <td>
              <a href="{{URL::action('CategoriaController@edit',$cat->idcategoria)}}"><button class="btn btn-info">Editar</button></a>
              <a href="" data-target="#modal-delete-{{$cat->idcategoria}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>

            </td>
          </tr>

          <!-- ESTE ES PARA INCLUIR EL MODAL PARA ELIMINAR     -->
          @include('almacen.categoria.modal')     
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            
            <th>Nombre</th>
            <th>Descripcion</th>  

            <th>Opciones</th>
          </tr>
        </tfoot>
        
      </table>

    </div><!-- /.box-body -->

  </div><!-- /.box -->

</div>

</div>

</section><!-- /.content -->

@endsection 