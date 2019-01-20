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
    <div class="col-xs-12">


      <div class="box">
        <div class="box-header">
          <h3> Listado Entrada de Articulos  <i class="glyphicon glyphicon-shopping-cart"></i> <a href="ingreso/create"><button class="btn btn-success">Nuevo</button></a> Generar PDF <a href="{{ url('#') }}"><button class="btn btn-danger" >PDF</button></a></h3>


          <input type="button" id="btnExport" value="Export" onclick="Export()" />


       
     
          <!--@include('almacen.categoria.search')-->
          <div class="row">


            <!--  fecha -->



            <div class=" col-xs-6">
              <div class="panel panel-primary">
                <div class="panel-body">

                  <h5>Buscar por Rango (Fechas) </h5>

                  <tr>
                   <td>F Minimo:</td>
                   <td><input type="text" id="damin" name="damin"></td>
                 </tr>
                 <tr>
                  <td>F Maximo:</td>
                  <td><input type="text" id="damax" name="damax"></td>
                </tr>
              </div>
            </div>
          </div>


          <!--  factura-->
          <div class=" col-xs-6">
            <div class="panel panel-primary">
              <div class="panel-body">


               <h5>Buscar por Rango (# Factura) </h5>

               <tr>
                 <td> Factura Min:</td>
                 <td><input type="text" id="fmin" name="fmin"></td>
               </tr>
               <tr>
                <td> Factura Max:</td>
                <td><input type="text" id="fmax" name="fmax"></td>
              </tr>

            </div>
          </div>
        </div>

        <!--  memo -->
        <div class=" col-xs-6">
          <div class="panel panel-primary">
            <div class="panel-body">


             <h5>Buscar por Rango (# Memo) </h5>

             <tr>
               <td> Memo Min:</td>
               <td><input type="text" id="memin" name="memin"></td>
             </tr>
             <tr>
              <td> Memo Max:</td>
              <td><input type="text" id="memax" name="memax"></td>
            </tr>

          </div>
        </div>
      </div>

      <!--  totales -->
      <div class=" col-xs-6">
        <div class="panel panel-primary">
          <div class="panel-body">


           <h5>Buscar por Rango (Totales) </h5>

           <tr>
             <td> Total Minimo:</td>
             <td><input type="text" id="min" name="min"></td>
           </tr>
           <tr>
            <td> Total Maximo:</td>
            <td><input type="text" id="max" name="max"></td>
          </tr>

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

     <th>Opciones</th>

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


     <td>
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

   <th>Opciones</th>

 </tfoot>

</table> 	

</div>

</div>


</div>
</div>
</section>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script type="text/javascript">
        function Export() {
            html2canvas(document.getElementById('example'), {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("Table.pdf");
                }
            });
        }
    </script>

@endsection 
