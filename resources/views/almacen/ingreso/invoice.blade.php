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

 <center><h1>Ingreso de Articulos</h1></center> 

    
         
                <label for="recibe">Numero de Factura</label>
            <p>{{$ingreso->numero_factura}}</p>
         
           
            
                <label for="proveedor">Proveedor</label>
               <p>{{$ingreso->proveedor}}</p>
            

     
 
         
                <label for="memo">Memo</label>
             <p>{{$ingreso->folio_memo}}</p>
          

           
          
   





 <div class="row">
   <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12"> 

    <div class="table-response">
      <table class="table ">
      <thead style="background-color:#A9D0F5">
          <tr>
              <th>Articulo</th>  
              <th>Cantidad</th>  
              <th>Precio Unitario</th>  
              <th>Precio Total</th> 
              <th>Subtotal</th> 
          </tr>
        </thead>
       
        <tbody>

         @foreach($detalles as $det)

         <tr>
          <td>{{$det->articulo}}</td>
          <td>{{$det->cantidad}}</td>
          <td>{{$det->precio_unitario}}</td>
          <td>{{$det->precio_total}}</td>
          <td>{{$det->cantidad*$det->precio_unitario}}</td>

        </tr>

        @endforeach
      </tbody>

        <tfoot>
                       
           <th></th>
           <th></th>
           <th></th>
           <th></th>
           <th><h4 id="total">{{$ingreso->total}}</h4></th>
         </tfoot>
    </table>  

  </div>


</div>
</div>



<div class="form-group">
  <label for="personal">Persona que Autoriza</label>
  <p>{{$ingreso->personal3}}</p>


  ______________________________________________________
  <h5>Firma</h5>


</div>


<div class="form-group">
  <label for="personal">Persona que Recibe</label>
  <p>{{$ingreso->personal4}}</p>

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