@extends ('layouts.admin3')
@section ('contenido')


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
          <h3>Listado Salida de Articulos <a href="salida/create"><button class="btn btn-success">Nuevo</button></a> Generar PDF<button class="btn btn-danger" id="btnExport" value="Export" onclick="ocultar2();exportar_mostrar2();">PDF</button></h3>

          <!-- BUSQUEDAS -->

          <div class="row">

            <div id="divRangoFechas" class=" col-xs-6">
              <div class="panel panel-primary">
                <div class="panel-body">
                  <form  role="form" action="{{url('/descargarSalidaFecha')}}" method="post" >
                    {{csrf_field()}}

                    <h5>Buscar por Rango (Fechas) </h5>

                    <tr>
                     <td>Fecha Min:</td>
                     <td><input name="fechaMin" type="text" id="dasmin" name="dasmin"></td>
                   </tr>
                   <tr>
                    <td>Fecha Max:</td>
                    <td><input name="fechaMax" type="text" id="dasmax" name="dasmax"></td>
                  </tr>
                  <tr>
                  
                   <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-search"></i></button>
                 </tr>

               </form>
             </div>
           </div>
         </div>



         <div id="divRangoMemos" class=" col-xs-6">
          <div class="panel panel-primary">
            <div class="panel-body">
              <form  role="form" action="{{url('/descargarSalidaMemo')}}" method="post" >
                {{csrf_field()}}
                <h5>Buscar por Rango(#Memo) </h5>

                <tr>
                 <td> Memo Min:</td>
                 <td><input name="memoMinimo" type="text" id="mesmin" name="mesmin"></td>
               </tr>
               <tr>
                <td> Memo Max:</td>
                <td><input name="memoMaximo" type="text" id="mesmax" name="mesmax"></td>
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
  <table id="example2" class="table table-bordered table-striped">
    <thead>

     <th>Fecha</th>
     <th># Memo</th>
     <th>Autoriza</th>
     <th>Recibe</th>
     <th>Departamento</th>
     <th>Estado</th>
     <th class="opciones">Opciones</th>

   </thead>

   @foreach ($salidas as $sa) 
   <tr>


     <td>{{ $sa->fecha_hora}}</td>
     <td>{{ $sa->folio_memo}}</td>
     <td>{{ $sa->personal3}}</td>
     <td>{{ $sa->personal4}}</td>
     <td>{{ $sa->depa}}</td>
     <td>{{ $sa->estado}}</td> 

     <td  class="opciones">
      <a href="{{URL::action('SalidaController@show',$sa->idsalida)}}"><button class="btn btn-primary">Detalles</button></a>
      <a href="" data-target="#modal-delete-{{$sa->idsalida}}" data-toggle="modal"><button class="btn btn-danger">Anular</button></a>

    </td>

  </tr>

  <!-- ESTE ES PARA INCLUIR EL MODAL PARA ELIMINAR -->
  @include('almacen.salida.modal')   	
  @endforeach

  <tfoot>
    <th>Fecha</th>
    <th># Memo</th>
    <th>Autoriza</th>
    <th>Recibe</th>
    <th>Departamento</th>
    <th>Estado</th>
    <th class="opciones">Opciones</th>

  </tfoot>

</table> 	
</div>

</div>


</div>
</div>
</section>
</div>


<script type="text/javascript">

  function dibujarDivRangoFechas() {
    alert("entre");

    document.getElementById('divRangoMemos').style.display= "none";
    document.getElementById('divRangoFechas').style.display= "block";
    
    // body...
  }



  function dibujarDivRangoMemos() {
   alert("entre");
   document.getElementById('divRangoFechas').style.display= "none";
   document.getElementById('divRangoMemos').style.display= "block";

    // body...
  }
</script>


@endsection 