@extends ('layouts.admin')
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

            {!! Form::open(array('url'=>'almacen/salida','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}


            <!-- EL NAME DEL INPUT TIENE QUE SER IGUAL AL DEL CONTROLADOR Y AL DE LA VALIDACIONA POR QUE ES EL QUE SE ESTA MANDANDO    -->

         

          <div class="row">
 
              

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
                <div class="form-group">
                <label for="departamento">Departamento</label>
                <select name="iddepartamento" id="iddepartamento" class="form-control selectpicker" data-live-search="true">
                @foreach($departamentos as $departamento)
                <option value="{{$departamento->iddepartamento}}">{{$departamento->nombre}}</option>
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
                          
                        </thead>
                        <tfoot>
                            <th>TOTAL</th>
                            <th></th>
                            <th></th>
                         

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
   

    if (idarticulo!="" && cantidad!="") 
    {
        

        var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td></tr>';
        cont++;
        limpiar();
       
        $('#detalles').append(fila);
        $("#guardar").show();

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
   
 }   

//para evitar enviar un ingreso que no tenga detalles


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