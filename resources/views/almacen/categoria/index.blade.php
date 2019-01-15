@extends ('layouts.admin')
@section ('contenido')
 
<!-- HACEMOS EL DISEÑO UTILIZANDO BOOTSTRAP  -->
<!-- include es para incluir el buscador  -->

<!--
<div class="row">
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12"> 

    <h3>Listado de Categorias <a href="categoria/create"><button class="btn btn-success">Nuevo</button></a></h3>
    @include('almacen.categoria.search')

</div>
</div>
-->

<!-- HACEMOS EL DISEÑO AHORA METEMOS UNA TABLA  -->



  <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            
                            
                            <div class="box">
                                <div class="box-header">
                                    <h3>Listado de Categorias <a href="categoria/create"><button class="btn btn-success">Nuevo</button></a> Generar PDF <a href="{{ url('#') }}"><button class="btn btn-danger">PDF</button></a></h3>
 
                                   <!--@include('almacen.categoria.search')-->
                                                                        
                                </div><!-- /.box-header -->
                                <div class="row">
                                <div class="box-body table-responsive">
                                    <table id="example1" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                               
                                               <th>Nombre</th>
                                               <th>Descripcion</th> 
                                            
                                               <th>Opciones</th>
                                            </tr>
                                        </thead>
                                      
                                         
                                          <!-- esta variable es la que tenemos en la funcion del controlador para mandar el articulo  -->
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
                                   
                             
                              </div>

                         
                             {{$categorias->render()}}
                        </div>
                    </div>

  
 


                @endsection 