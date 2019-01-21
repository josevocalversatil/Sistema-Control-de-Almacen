@extends ('layouts.admin2')
@section ('contenido')

<!-- HACEMOS EL DISEÑO UTILIZANDO BOOTSTRAP  -->
<!-- include es para incluir el buscador  -->




<!-- HACEMOS EL DISEÑO AHORA METEMOS UNA TABLA 


 
-->


<style type="text/css">

  tfoot input {
    width: 85%;
    padding: 3px;
    box-sizing: border-box;
  }

</style>

<section class="content">


  <div class="row">




    <div class="box">
      <div class="box-header">
        <h3> Listado Entrada de Articulos  <i class="glyphicon glyphicon-shopping-cart"></i> <a href="ingreso/create"><button class="btn btn-success">Nuevo</button></a> Generar PDF <a href="{{ url('#') }}"><button class="btn btn-danger"  id="btnExport" value="Export" onclick="ocultar();exportar_mostrar();" >PDF</button></a></h3>


       

        
        
     
        <div class="row">


          <!--  fecha -->

            <div id="divRangoFechas" class=" col-xs-6">
              <div class="panel panel-primary">
                <div class="panel-body">
                  <form  role="form" action="{{url('/descargarIngresoFecha')}}" method="post" >
                    {{csrf_field()}}

                    <h5>Buscar por Rango (Fechas) </h5>

                    <tr>
                     <td>Fecha Min:</td>
                     <td><input name="fechaMin" type="text" id="damin" name="damin"></td>
                   </tr>
                   <tr>
                    <td>Fecha Max:</td>
                    <td><input name="fechaMax" type="text" id="damax" name="damax"></td>
                  </tr>
                  <tr>
                  
                   <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-search"></i></button>
                 </tr>

               </form>
             </div>
           </div>
         </div>


        <div id="divRangoFactura" class=" col-xs-6">
              <div class="panel panel-primary">
                <div class="panel-body">
                  <form  role="form" action="{{url('/descargarIngresoFactura')}}" method="post" >
                    {{csrf_field()}}

                    <h5>Buscar por Rango (# Factura) </h5>

                    <tr>
                     <td>Factura Min:</td>
                     <td><input name="facturaMinimo" type="text" id="fmin" name="fmin"></td>
                   </tr>
                   <tr>
                    <td>Factura Max:</td>
                    <td><input name="facturaMaximo" type="text" id="fmax" name="fmax"></td>
                  </tr>
                  <tr>
                  
                   <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-search"></i></button>
                 </tr>

               </form>
             </div>
           </div>
         </div>


       <div id="divRangoFechas" class=" col-xs-6">
              <div class="panel panel-primary">
                <div class="panel-body">
                  <form  role="form" action="{{url('/descargarIngresoMemo')}}" method="post" >
                    {{csrf_field()}}

                    <h5>Buscar por Rango (# Memo) </h5>

                    <tr>
                     <td>Memo Min:</td>
                     <td><input name="memoMinimo" type="text" id="memin" name="memin"></td>
                   </tr>
                   <tr>
                    <td>Memo Max:</td>
                    <td><input name="memoMaximo" type="text" id="memax" name="memax"></td>
                  </tr>
                  <tr>
                  
                   <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-search"></i></button>
                 </tr>

               </form>
             </div>
           </div>
         </div>


         <div id="divRangoFechas" class=" col-xs-6">
              <div class="panel panel-primary">
                <div class="panel-body">
                  <form  role="form" action="{{url('/descargarIngresoTotal')}}" method="post" >
                    {{csrf_field()}}

                    <h5>Buscar por Rango (Totales) </h5>

                    <tr>
                     <td>Total Min:</td>
                     <td><input name="totalMin" type="text" id="min" name="min"></td>
                   </tr>
                   <tr>
                    <td>Total Max:</td>
                    <td><input name="totalMax" type="text" id="max" name="max"></td>
                  </tr>
                  <tr>
                  
                   <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-search"></i></button>
                 </tr>

               </form>
             </div>
           </div>
         </div>



</div>

</div><!-- /.box-header -->
<div class="box-body table-responsive">




  <table  id="example" class="table table-bordered table-striped">
    <thead> 

     <th>Fecha</th>
     <th># Factura</th>
     <th>Proveedor</th>
     <th>#Memo</th>
     <th>Autoriza</th>
     <th>Recibe</th>
     <th>Total</th>

     <th class="opciones">Opciones</th>

   </thead>


   @foreach ($ingresos as $ing)

   <tr>


     <td>{{ $ing->fecha_hora}}</td>
     <td>{{ $ing->numero_factura}}</td>
     <td>{{ $ing->proveedor}}</td>
     <td>   {{ $ing->folio_memo}} </td> 
     <td>{{ $ing->personal3}}</td>
     <td>{{ $ing->personal4}}</td>
     <td>{{ $ing->total}}</td>


     <td class="opciones">
      <a href="{{URL::action('IngresoController@show',$ing->idingreso)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
      <a href="" data-target="#modal-delete-{{$ing->idingreso}}" data-toggle="modal" class="btn btn-danger btn-sm"><i class="fa fa-eraser"></i></a>


    </td>

  </tr>






  <!-- ESTE ES PARA INCLUIR EL MODAL PARA ELIMINAR -->
  @include('almacen.ingreso.modal')   	

  @endforeach


  <tfoot>
   <th>Fecha</th>
   <th># Factura</th>
   <th>Proveedor</th>
   <th># Memo</th>
   <th>Autoriza</th>
   <th>Recibe</th>
   <th>Total</th>

   <th class="opciones">Opciones</th>

 </tfoot>

</table> 	

</div>

</div>


</div>
</div>
</section>
</div>



@endsection 
