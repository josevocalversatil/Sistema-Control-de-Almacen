<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
  <title>Memo</title>
</head>


<style>      

footer {
  position: absolute;
  bottom: 0;

}


</style>

<body background="/img/logo13.jpg" style="max-width:100%;width:auto;height:auto;">

 <img src="img/lt1.jpg" style="max-width:100%;width:auto;height:auto;"><br>

 <center><h1>Memorandum</h1></center> 


 <label for="numero_memo">Numero de memo</label>
 <p>{{$memo->numero_memo}}</p>



 <label for="departamento">Departamento</label>
 <p>{{$memo->depa}}</p>


 
 <label for="memo">Memo</label>
 <p>{{$memo->folio_memo}}</p>

 





 <div class="row">
   <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12"> 

    <div class="table-response">
      <table class="table ">
        <thead style="background-color:#A9D0F5">
          <tr>
           <th>Articulo</th>  
           <th>Cantidad</th>  
           <th>Unidad M</th> 
         </tr>
       </thead>

       <tbody>

         @foreach($detalles as $det)

         <tr>
          <td>{{$det->articulo}}</td>
          <td>{{$det->cantidad}}</td>
          <td>{{$det->unidad_medida}}</td

          </tr>

          @endforeach
        </tbody>
      </table>  

    </div>


  </div>
</div>



<div class="form-group">
  <label for="personal">Persona que Autoriza</label>
 <p>{{$memo->personal3}}</p>

  ______________________________________________________
  <h5>Firma</h5>


</div>


<div class="form-group">
  <label for="personal">Persona que Recibe</label>
 <p>{{$memo->personal4}}</p>

  ______________________________________________________
  <h5>Firma</h5>

</div>


<footer >
  <div>

   <img src="img/pie2.jpg" style="max-width:100%;width:auto;height:auto;"><br>
 </div>

</footer>

</body>

</html>