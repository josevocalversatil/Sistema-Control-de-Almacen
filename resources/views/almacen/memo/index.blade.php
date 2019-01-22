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
        <h3>Listado Memorandum's <a href="memo/create"><button class="btn btn-success">Nuevo</button></a> Generar PDF <button class="btn btn-danger"  id="btnExport" value="Export" onclick="ocultar1();exportar_mostrar1();" >PDF</button></h3>


          <div class="row">

             <div id="divRangoFechas" class=" col-xs-6">
              <div class="panel panel-primary">
                <div class="panel-body">
                  <form  role="form" action="{{url('/descargarMemoFecha')}}" method="post" >
                    {{csrf_field()}}

                    <h5>Buscar por Rango (Fechas) </h5>

                    <tr>
                     <td>Fecha Min:</td>
                     <td><input name="fechaMin" type="text" id="dammin" name="dammin"></td>
                   </tr>
                   <tr>
                    <td>Fecha Max:</td>
                    <td><input name="fechaMax" type="text" id="dammax" name="dammax"></td>
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
                  <form  role="form" action="{{url('/descargarMemoFoliome')}}" method="post" >
                    {{csrf_field()}}

                    <h5>Buscar por Rango (Folio Memo) </h5>

                    <tr>
                     <td>Folio Min:</td>
                     <td><input name="folioMin" type="text" id="fomin" name="fomin"></td>
                   </tr>
                   <tr>
                    <td>Folio Max:</td>
                    <td><input name="folioMax" type="text" id="fomax" name="fomax"></td>
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
                  <form  role="form" action="{{url('/descargarMemoNumerome')}}" method="post" >
                    {{csrf_field()}}

                    <h5>Buscar por Rango (# Memo) </h5>

                    <tr>
                     <td>Fecha Min:</td>
                     <td><input name="memoMin" type="text" id="nummin" name="nummin"></td>
                   </tr>
                   <tr>
                    <td>Fecha Max:</td>
                    <td><input name="memoMax" type="text" id="nummax" name="nummax"></td>
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
  <table id="example3" class="table table-bordered table-striped">
    <thead>

     <th>Fecha</th>
     <th>#Folio memo</th>
     <th># memo</th>

     <th>Autoriza</th>
     <th>Recibe</th>
     <th>Departamento</th>  
     <th class="opciones">Opciones</th>

   </thead>

   @foreach ($memos as $mem)
   <tr>


     <td>{{ $mem->fecha_hora}}</td>
     <td>{{ $mem->folio_memo}}</td>
     <td>{{ $mem->numero_memo}}</td>
     <td>{{ $mem->personal3}}</td>
     <td>{{ $mem->personal4}}</td>
     <td>{{ $mem->depa}}</td>
     

     <td class="opciones">
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