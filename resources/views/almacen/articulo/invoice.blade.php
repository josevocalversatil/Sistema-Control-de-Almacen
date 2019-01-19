<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
  <title>Categorias</title>
</head>


<style>      

  footer {
    position: absolute;
    bottom: 0;

  }


</style>

<body background="/img/logo13.jpg" style="max-width:100%;width:auto;height:auto;">

 <img src="img/lt1.jpg" style="max-width:100%;width:auto;height:auto;"><br>

 <center><h1>Listado de articulos</h1>
 </center> 


 <div class="row">
   <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12"> 

    <div class="table-response">
      <table class="table ">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Categoria</th>
            <th>Codigo</th>
            <th>Stock</th>
            <th>Stock Minimo</th>
            <th>Stock Maximo</th>
            <th>Descripcion</th>       
            <th><center>Costo Unitario<br></center></th>
            <th><center>Costo<br>Maximo</center></th>
          </tr>
        </thead>

        <tbody>

          @foreach ($articulos as $articulo)
          <tr>
            <td>{{ $articulo->idarticulo}}</td>
            <td>{{ $articulo->nombre}}</td>
            <td>{{ $articulo->categoria}}</td>
            <td>{{ $articulo->codigo}}</td>
            <td>{{ $articulo->stock}}</td>
            <td>{{ $articulo->stock_minimo}}</td>
            <td>{{ $articulo->stock_maximo}}</td>
            <td> {{ $articulo->descripcion}}</td>
            <td> {{ $articulo->costo_unitario}}</td>
            <td> {{ $articulo->costo_total}}</td>
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