@extends ('layouts.admin2')
@section ('contenido')

     <div class="row">

      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Nuevo Ingreso</h3>

        @if(count($errors)>0)
        <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li> 
            @endforeach

        </ul> 
            
            </div>
        @endif

        </div>
    </div>
                  
            

            <!--  ponemos la url de esa ruta para que nos redireccione al controlador  -->

            {!! Form::open(array('url'=>'almacen/ingreso','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}


            <!-- EL NAME DEL INPUT TIENE QUE SER IGUAL AL DEL CONTROLADOR Y AL DE LA VALIDACIONA POR QUE ES EL QUE SE ESTA MANDANDO    -->

         

          <div class="row">
 
               <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
               <div class="form-group">
                <label for="numero_factura">Numero de Factura</label>
                <input type="text" name="numero_factura" required value="{{old('numero_factura')}}"  class="form-control" placeholder="numero_factura">
            </div>
          </div>


           <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
               <div class="form-group">
                <label for="fecha_hora">Fecha</label>
                <input type="date" name="fecha_hora" required value="{{old('fecha_hora')}}"  class="form-control " data-date-formate= "dd-mm-yyyy" >
            </div>
          </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
                <div class="form-group">
                <label for="proveedor">Proveedor</label>
                <select name="idproveedor" id="idproveedor" class="form-control selectpicker" data-live-search="true">
                @foreach($proveedores as $proveedor)
                <option value="{{$proveedor->idproveedor}}">{{$proveedor->nombre}}</option>
                @endforeach
                </select>
            </div> 
            </div>


           

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
                <div class="form-group">
                <label for="memo">Folio Memo</label>
                <select name="idmemo" id="idmemo" class="form-control selectpicker" data-live-search="true">
                @foreach($memos as $memo)
                <option value="{{$memo->idmemo}}">{{$memo->folio_memo}}</option>
                @endforeach
                </select>
            </div> 
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
                <div class="form-group">
                <label for="personal">Autoriza</label>
                <select name="idpersonal" id="idpersonal" class="form-control selectpicker" data-live-search="true">
                @foreach($personales as $personal)
                <option value="{{$personal->idpersonal}}">{{$personal->nombre}}</option>
                @endforeach
                </select>
            </div> 
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
                <div class="form-group">
                <label for="personal">Recibe</label>
                <select name="idpersonal2" id="idpersonal2" class="form-control selectpicker" data-live-search="true">
                @foreach($personales2 as $personal2)
                <option value="{{$personal2->idpersonal}}">{{$personal2->nombre}}</option>
                @endforeach
                </select>
            </div> 
            </div>



             
           
     
        </div>

<!--  DETALLE DE LA VENTA-->

        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-body">
                   <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="form-group">
                      <label>Articulo</label>
                      <select name="pidarticulo" class="form-control selectpicker" id="pidarticulo" data-live-search="true">
                      @foreach($articulos as $articulo)
                      <option value="{{$articulo->idarticulo}}">{{$articulo->articulo}}</option>
                      @endforeach
                      </select>
                  </div>     
                  </div> 

<!-- AGREGAMOS LOS INPUTS PARA LAS CANTIDADES   -->
                
                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                       <input type="number" name="pcantidad" id="pcantidad" class="form-control" placeholder="Cantidad"> 
                    </div>
                </div>


                  <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group">
                        <label for="precio_unitario">Precio Unitario</label>
                       <input type="number" name="pprecio_unitario" id="pprecio_unitario" class="form-control" placeholder="P. Unitario"> 
                    </div>
                </div>

                   <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group">
                        <label for="precio_total">Precio Total</label>
                       <input type="number" name="pprecio_total" id="pprecio_total" value="total" readonly="readonly" class="form-control" placeholder="P. Total"> 
                    </div>
                </div>

            
                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group">
                     <button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
                    </div>
                </div>


<!-- AGREGAMOS LA TABLA PARA EL DETALLE DE VENTA  -->
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                        <thead style="background-color:#A9D0F5">
                          <th>Opciones</th>  
                          <th>Articulo</th>  
                          <th>Cantidad</th>  
                          <th>Precio Unitario</th>  
                          <th>SubTotal</th> 
                          <th>Total</th> 
                        </thead>
                        <tfoot>
                            <th>TOTAL</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th><h4 id="total">s/. 0.0</h4></th>

                        </tfoot>
                        <tbody>
                            
                        </tbody>
                    </table>


                </div>


                </div>
            </div>
      



        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
           <div class="form-group">
            <!-- ESTE ES IMPORTANTE ME PERMITE TRABAJAR CON LAS TRANSACCIONES -->
                <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
  
        </div>
           

     </div>


    

            {!! Form::close()!!}              


@push('scripts')
<script>
  //evento click para agregar en la tabla detalles 
$(document).ready(function(){
    $("#bt_add").click(function(){
        agregar();
    });
});


var cont=0;
total=0;
subtotal=[];
//mientras el boton guardar va a estar oculto
$("#guardar").hide();

function agregar()
{
    idarticulo=$("#pidarticulo").val();
    articulo=$("#pidarticulo option:selected").text();
    cantidad=$("#pcantidad").val();
    precio_unitario=$("#pprecio_unitario").val();
    precio_total=$("#pprecio_total").val();

    if (idarticulo!="" && cantidad!="" && cantidad>0 && precio_unitario!="") 
    {
        subtotal[cont]=(cantidad*precio_unitario);
        precio_total=subtotal[cont];
        total=total+subtotal[cont];


        var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="precio_unitario[]" value="'+precio_unitario+'"></td><td><input type="number" name="precio_total[]" value="'+precio_total+'"></td><td>'+subtotal[cont]+'</td></tr>';
        cont++;
        limpiar();
        $("#total").html("S/. "+total);
        evaluar();
        $('#detalles').append(fila);

    }
else
{
  alert("error al ingresar el detalle del ingreso, revise los datos del articulo");
}


}

 function limpiar()
 {

    //estamos usando los pcantidad por que son los id de los input
    $("#pcantidad").val("");
    $("#pprecio_unitario").val("");
    $("#pprecio_total").val("");
 }   

//para evitar enviar un ingreso que no tenga detalles
function evaluar()
{
    if (total>0)
     {
       $("#guardar").show();
     }
     else
     {
       $("#guardar").hide();
     }
}

function eliminar(index)
{
  total=total-subtotal[index];
  $("#total").html("S/. "+ total);
  $("#fila" + index).remove();
  evaluar();

}


</script>

@endpush

@endsection