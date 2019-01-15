@extends ('layouts.admin')
@section ('contenido')

     <div class="row"> 

     	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
     		<h3>Nuevo Usuario</h3>

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

            {!! Form::open(array('url'=>'almacen/usuario','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}


            <!-- EL NAME DEL INPUT TIENE QUE SER IGUAL AL DEL CONTROLADOR Y AL DE LA VALIDACIONA POR QUE ES EL QUE SE ESTA MANDANDO    -->
      <div class="row">

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" >Nombre</label>

                         
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="Nombre...">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            
                        </div>
                    </div>
    
                      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" >E-Mail </label>

                          
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="E-Mail">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            
                        </div>
                    </div>


                      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">Password</label>

                           
                                <input id="password" type="password" class="form-control" name="password" required placeholder="Password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                           
                        </div>
                    </div>
                        

                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="password-confirm">Confirmar Password</label>

                            
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirma Password">
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