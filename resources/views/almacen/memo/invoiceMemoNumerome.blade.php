<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
  <title>Memorandum</title>
</head>


<style>      

footer {
  position: absolute;
  bottom: 0;

}


</style>

<body background="/img/logo13.jpg" style="max-width:100%;width:auto;height:auto;">

 <img src="img/lt1.jpg" style="max-width:100%;width:auto;height:auto;"><br>

 <center><h1>Listado Memorandums</h1></center>
  <center><h4>Busqueda por Rango de Numero de Memo</h4>
 </center> 


 <div class="row">
   <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12"> 

    <div class="table-response">
      <table class="table ">
        <thead>
          <tr>
            
     <th>Fecha</th>
     <th>#Folio memo</th>
     <th># memo</th>

     <th>Autoriza</th>
     <th>Recibe</th>
     <th>Departamento</th> 
          </tr>
        </thead>

        <tbody>

          @foreach ($memo as $mem)
         <tr>
           <td>{{ $mem->fecha_hora}}</td>
     <td>{{ $mem->folio_memo}}</td>
     <td>{{ $mem->numero_memo}}</td>
     <td>{{ $mem->personal3}}</td>
     <td>{{ $mem->personal4}}</td>
     <td>{{ $mem->depa}}</td>
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