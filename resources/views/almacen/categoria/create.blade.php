@extends ('layouts.admin')
@section ('contenido')

     <div class="row">

     	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
     		<h3>Nueva categoria</h3>

     		@if(count($errors)>0)
     		<div class="alert alert-danger">
     		<ul>
     		@foreach($errors->all() as $error)
     		<li>{{$error}}</li>	
            @endforeach

     		</ul>	
            
           	</div>
     		@endif
                  
            

            <!--  ponemos la url de esa ruta para que nos redireccione al controlador  -->

            {!! Form::open(array('url'=>'almacen/categoria','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}


            <!-- EL NAME DEL INPUT TIENE QUE SER IGUAL AL DEL CONTROLADOR Y AL DE LA VALIDACIONA POR QUE ES EL QUE SE ESTA MANDANDO    -->

            <div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" class="form-control" onchange="mayus(this);" placeholder="Nombre...">
            </div> 
            


            <div class="form-group">
            	<label for="descripcion">Descripcion</label>
            	<input type="text" name="descripcion" class="form-control" onchange="mayus(this);" placeholder="Descripcion...">
            </div> 

            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

            {!! Form::close()!!}              

     	</div>
     	



     </div>




@endsection