@extends ('layouts.admin3')
@section ('contenido')


            <!-- EL NAME DEL INPUT TIENE QUE SER IGUAL AL DEL CONTROLADOR Y AL DE LA VALIDACIONA POR QUE ES EL QUE SE ESTA MANDANDO    -->
  <h3>Generar PDF <a href="{{URL::action('SalidaController@pdf',$salida->idsalida)}}"><button class="btn btn-danger">PDF</button></a></h3>
        
           <div class="row"> 
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
                <div class="form-group">
                <label for="departamento">Departamento</label>
               <p>{{$salida->depa}}</p>
            </div> 
            </div>

     
 
         <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
                <div class="form-group">
                <label for="memo">Memo</label>
             <p>{{$salida->folio_memo}}</p>
            </div> 
        </div>
 

     <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
                <div class="form-group">
                <label for="personal">Autoriza</label>
             <p>{{$salida->personal3}}</p>
            </div> 
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
                <div class="form-group">
                <label for="personal">Recibe</label>
             <p>{{$salida->personal4}}</p>
            </div> 
        </div>
   

        </div>

<!--  DETALLE DE LA VENTA-->

        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-body">
                   
<!-- AGREGAMOS LA TABLA PARA EL DETALLE DE VENTA  -->
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                        <thead style="background-color:#A9D0F5">
                         
                          <th>Articulo</th>  
                          <th>Cantidad</th>  
                          
                        </thead>
                        <tfoot>
                       
                            <th></th>
                            <th></th>
                           

                        </tfoot>
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
    

     </div>

@endsection