<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
  <title>Ingreso</title>
</head>


<style>      

footer {
  position: absolute;
  bottom: 0;

}


</style>

<body background="/img/logo13.jpg" style="max-width:100%;width:auto;height:auto;">

 <img src="img/lt1.jpg" style="max-width:100%;width:auto;height:auto;"><br>

 <center><h1>Listado Ingreso de Articulos</h1></center>
  <center><h4>Busqueda por Rango de Facturas</h4>
 </center> 


 <div class="row">
   <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12"> 

    <div class="table-response">
      <table class="table ">
        <thead>
          <tr>
            <th>Fecha</th>
            <th># Factura</th>
            <th>Proveedor</th>
            <th>#Memo</th>
            <th>Autoriza</th>
            <th>Recibe</th>
            <th>Total</th>
          </tr>
        </thead>

        <tbody>

          @foreach ($ingreso as $ing)
         <tr>
           <td>{{ $ing->fecha_hora}}</td>
           <td>{{ $ing->numero_factura}}</td>
           <td>{{ $ing->proveedor}}</td>
           <td>   {{ $ing->folio_memo}} </td> 
           <td>{{ $ing->personal3}}</td>
           <td>{{ $ing->personal4}}</td>
           <td>{{ $ing->total}}</td>
         </tr>

         <!-- ESTE ES PARA INCLUIR EL MODAL PARA ELIMINAR -->

         @endforeach
       </tbody>
     </table>  

   </div>


 </div>
</div>



<footer >
  <div>

   <img src="img/pie2.jpg" style="max-width:100%;width:auto;height:auto;"><br>
 </div>

</footer>

</body>

</html>