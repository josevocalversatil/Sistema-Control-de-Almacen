@extends ('layouts.admin')
@section ('contenido')

     <div class="row">

     	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
     		<h3>Nuevo Proveedor</h3>

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

            {!! Form::open(array('url'=>'almacen/proveedor','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}


            <!-- EL NAME DEL INPUT TIENE QUE SER IGUAL AL DEL CONTROLADOR Y AL DE LA VALIDACIONA POR QUE ES EL QUE SE ESTA MANDANDO    -->
  <div class="row">

               <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control"  placeholder="Nombre...">
            </div> 
            </div>
 
   
               <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                 <div class="form-group">
                <label for="direccion">Direccion</label>
                <input type="text" name="direccion" class="form-control"  placeholder="Direccion...">
            </div> 
         </div>

               <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                 <div class="form-group">
                <label for="telefono">Telefono</label>
                <input type="text" name="telefono" class="form-control"  placeholder="Telefono...">
            </div> 
            </div>

               <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                 <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Email...">
            </div> 
            </div>


               <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                 <div class="form-group">
                <label for="razon_social">Razon_social</label>
                <input type="text" name="razon_social" class="form-control"  placeholder="Razon_social...">
            </div> 
             </div>


               <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                 <div class="form-group">
                <label for="rfc">RFC</label>
                <input type="text" name="rfc" class="form-control"  placeholder="Rfc...">
            </div> 
          </div>
       

               <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
        </div>

            {!! Form::close()!!}              

     	</div>
     	



     </div>




@endsection