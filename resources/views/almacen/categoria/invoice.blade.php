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

       <center><h1>Listado de categorias</h1>
</center> 


<div class="row">
   <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12"> 

      <div class="table-response">
      <table class="table ">
        <thead>
          <tr>
          <th>Id</th>
          <th>Nombre</th>
          <th>Descripcion</th>
          </tr>

        </thead>

        <tbody>

        @foreach ($categorias as $cat)
        <tr>
         
         <td>{{ $cat->idcategoria}}</td>
         <td>{{ $cat->nombre}}</td>
         <td>{{ $cat->descripcion}}</td>
        

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