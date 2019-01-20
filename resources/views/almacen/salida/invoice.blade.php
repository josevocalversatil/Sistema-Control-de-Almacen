<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
  <title>Salida</title>
</head>


<style>      

  footer {
    position: absolute;
    bottom: 0;

  }


</style>

<body background="/img/logo13.jpg" style="max-width:100%;width:auto;height:auto;">

 <img src="img/lt1.jpg" style="max-width:100%;width:auto;height:auto;"><br>

 <center><h1>Salida de Articulos</h1></center> 

 <label for="departamento">Departamento</label>
 <p>{{$salida->depa}}</p>


 <label for="memo">Folio Memorandum</label>
 <p>{{$salida->folio_memo}}</p>

 <label for="fecha">Fecha de Salida</label>
 <p>{{$fecha}}</p>



 <div class="row">
   <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12"> 

    <div class="table-response">
      <table class="table ">
      <thead style="background-color:#A9D0F5">
          <tr>
            <th>Articulo</th>  
            <th>Cantidad</th> 
          </tr>
        </thead>

        <tbody>

         @foreach($detalles as $det)

         <tr>
          <td>{{$det->articulo}}</td>
          <td>{{$det->cantidad}}</td>

        </tr>

        @endforeach
      </tbody>
    </table>  

  </div>


</div>
</div>



<div class="form-group">
  <label for="personal">Persona que Autoriza</label>
  <p>{{$salida->personal3}}</p>

  ______________________________________________________
  <h5>Firma</h5>


</div>


<div class="form-group">
  <label for="personal">Persona que Recibe</label>
  <p>{{$salida->personal4}}</p>

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