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
          <h3>Listado de Articulos 
            <i class="glyphicon glyphicon-shopping-cart"></i>
            <a href="articulo/create"><button class="btn btn-success">Nuevo</button></a></h3>

            Generar PDF <a href="{{url('descargarPdfArticulos') }}"><button class="btn btn-danger">PDF</button></a></h3>



            <!--@include('almacen.categoria.search')-->

          </div><!-- /.box-header -->
          <div class="box-body table-responsive">
            <table id="example1" class="table table-bordered table-striped">

              <thead>

               <th>Nombre</th>
               <th>Codigo</th>
               <th>Categoria</th>
               <th>Descripcion</th>
               <th>Stock(Exis)</th>
               <th>Stock minimo</th>
               <th>Stock maximo</th>
               <th>Costo Promedio</th>
               <th>Costo Total</th>


               <th>Opciones</th>

             </thead>


             <!-- esta variable es la que tenemos en la funcion del controlador para mandar el articulo  -->
             @foreach ($articulos as $art)
             <tr>


               <td>{{ $art->nombre}}</td>
               <td>{{ $art->codigo}}</td>
               <td>{{ $art->categoria}}</td>
               <td>{{ $art->descripcion}}</td>
               <td>{{ $art->stock}}</td>
               <td>{{ $art->stock_minimo}}</td>
               <td>{{ $art->stock_maximo}}</td>
               <td>{{ $art->costo_unitario}}</td>
               <td>{{ $art->costo_total}}</td>



               <td>


                <a href="{{URL::action('ArticuloController@edit',$art->idarticulo)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                <a href="" data-target="#modal-delete-{{$art->idarticulo}}" data-toggle="modal" class="btn btn-danger btn-sm"><i class="fa fa-eraser"></i></a>

              </td>

            </tr>

            <!-- ESTE ES PARA INCLUIR EL MODAL PARA ELIMINAR -->
            @include('almacen.articulo.modal')   	
            @endforeach
            <tfoot>

              <th>Nombre</th>
              <th>Codigo</th>
              <th>Categoria</th>
              <th>Descripcion</th>
              <th>Stock</th>
              <th>Stock minimo</th>
              <th>Stock maximo</th>
              <th>Costo Promedio</th>
              <th>Costo Total</th>


              <th>Opciones</th>

            </tfoot>


          </table> 	
        </div>

      </div>
      {{$articulos->render()}}
      
    </div>
  </div>

</section>
</div>



@endsection 