@extends ('layouts.admin3')
@section ('contenido')

     <div class="row">

     	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
     		<h3>Editar Proveedor: {{ $proveedor->nombre}}</h3>

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

            {!! Form::model($proveedor,['method'=>'PATCH','route'=>['proveedor.update',$proveedor->idproveedor]])!!}
            {{Form::token()}}


            <!-- EL NAME DEL INPUT TIENE QUE SER IGUAL AL DEL CONTROLADOR Y AL DE LA VALIDACIONA POR QUE ES EL QUE SE ESTA MANDANDO    -->

            <div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" class="form-control" value="{{$proveedor->nombre}}" placeholder="Nombre...">
            </div> 
            
 

            <div class="form-group">
            	<label for="direccion">Direccion</label>
            	<input type="text" name="direccion" class="form-control" value="{{$proveedor->direccion}}" placeholder="Direccion...">
            </div> 
       
             <div class="form-group">
                <label for="telefono">Telefono</label>
                <input type="text" name="telefono" class="form-control" value="{{$proveedor->telefono}}" placeholder="Telefono...">
            </div> 

             <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" value="{{$proveedor->email}}" placeholder="Email...">
            </div> 

             <div class="form-group">
                <label for="razon_social">Razon_social</label>
                <input type="text" name="razon_social" class="form-control" value="{{$proveedor->razon_social}}" placeholder="Razon_social...">
            </div> 

             <div class="form-group">
                <label for="rfc">RFC</label>
                <input type="text" name="rfc" class="form-control" value="{{$proveedor->rfc}}" placeholder="Rfc...">
            </div> 

            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

            {!! Form::close()!!}              

     	</div>
     	



     </div>




@endsection