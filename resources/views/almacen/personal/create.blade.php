@extends ('layouts.admin')
@section ('contenido')

     <div class="row">

     	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
     		<h3>Nueva Persona</h3>

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

            {!! Form::open(array('url'=>'almacen/personal','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}


            <!-- EL NAME DEL INPUT TIENE QUE SER IGUAL AL DEL CONTROLADOR Y AL DE LA VALIDACIONA POR QUE ES EL QUE SE ESTA MANDANDO    -->

           <div class="row">
               <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                
                <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" required value="{{old('nombre')}}" class="form-control" placeholder="Nombre...">
            </div>
        </div>


            <!-- ESTE ES EL SELECT PARA CATEGORIAS -->
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
               <div class="form-group">
                   <label>Departamento</label>
                   <select name="iddepartamento" class="form-control">
                       @foreach($departamentos as $dep)
                       <option value="{{$dep->iddepartamento}}">{{$dep->nombre}}</option>
                       @endforeach
                   </select>
               </div>
             </div>


            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
               <div class="form-group">
                <label for="telefono">Telefono</label>
                <input type="text" name="telefono" required value="{{old('telefono')}}" class="form-control" placeholder="Telefono..">
            </div>
          </div>


               <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                 <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" required value="{{old('email')}}" class="form-control" placeholder="Email...">
            </div>
               </div>


               <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                 <div class="form-group">
                <label for="puesto">Puesto</label>
                <input type="text" name="puesto" value="{{old('puesto')}}" class="form-control" placeholder="Puesto...">
            </div>
               </div>

                        
          

           <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
           </div>
            </div>
            {!! Form::close()!!}              


@endsection