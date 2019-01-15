@extends ('layouts.admin')
@section ('contenido')

     <div class="row">

     	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
     		<h3>Editar Articulo: {{ $personal->nombre}}</h3>

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

            {!! Form::model($personal,['method'=>'PATCH','route'=>['personal.update',$personal->idpersonal],'files'=>'true'])!!}
            {{Form::token()}}


            <!-- EL NAME DEL INPUT TIENE QUE SER IGUAL AL DEL CONTROLADOR Y AL DE LA VALIDACIONA POR QUE ES EL QUE SE ESTA MANDANDO    -->


            
           <div class="row">
               <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                
                <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" required value="{{$personal->nombre}}" class="form-control" ">
            </div>
        </div>


            <!-- ESTE ES EL SELECT PARA CATEGORIAS el IF ES PARA DEJAR SELECCIONADA LA CAT EN CASO DE EDITAR-->

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
               <div class="form-group">
                   <label>Departamento</label>
                   <select name="iddepartamento" class="form-control">
                       @foreach($departamentos as $dep)
                       @if($dep->iddepartamento==$personal->iddepartamento)
                       <option value="{{$dep->iddepartamento}}"selected>{{$dep->nombre}}</option>
                       @else
                        <option value="{{$dep->iddepartamento}}">{{$dep->nombre}}</option>
                        @endif
                       @endforeach
                   </select>
               </div>
             </div>


            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
               <div class="form-group">
                <label for="telefono">Telefono</label>
                <input type="text" name="telefono" required value="{{$personal->telefono}}" class="form-control" >
            </div>
          </div>


               <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                 <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" required value="{{$personal->email}}" class="form-control">
            </div>
               </div>


               <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                 <div class="form-group">
                <label for="puesto">Puesto</label>
                <input type="text" name="puesto" value="{{$personal->puesto}}" class="form-control">
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