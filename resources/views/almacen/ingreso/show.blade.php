@extends ('layouts.admin')
@section ('contenido')


            <!-- EL NAME DEL INPUT TIENE QUE SER IGUAL AL DEL CONTROLADOR Y AL DE LA VALIDACIONA POR QUE ES EL QUE SE ESTA MANDANDO    -->

          <div class="row">

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
                <div class="form-group">
                <label for="recibe">Numero de Factura</label>
            <p>{{$ingreso->numero_factura}}</p>
            </div> 
        </div >
           
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
                <div class="form-group">
                <label for="proveedor">Proveedor</label>
               <p>{{$ingreso->proveedor}}</p>
            </div> 
            </div>

     
 
         <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
                <div class="form-group">
                <label for="memo">Memo</label>
             <p>{{$ingreso->folio_memo}}</p>
            </div> 
        </div>
 

     <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
                <div class="form-group">
                <label for="personal">Autoriza</label>
             <p>{{$ingreso->personal3}}</p>
            </div> 
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
                <div class="form-group">
                <label for="personal">Recibe</label>
             <p>{{$ingreso->personal4}}</p>
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
                          <th>Precio Unitario</th>  
                          <th>Precio Total</th> 
                          <th>Subtotal</th> 
                        </thead>
                        <tfoot>
                       
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th><h4 id="total">{{$ingreso->total}}</h4></th>

                        </tfoot>
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
                    </table>


                </div>


                </div>
            </div>
    

     </div>

@endsection