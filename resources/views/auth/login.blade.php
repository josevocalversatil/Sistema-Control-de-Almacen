@extends('layouts.app')

@section('content')
  

<div class="container" >


    <div class="row" >

    
<div class="table-response">
      <div align="center">
 <img src="img/logot.png"  style="max-width:100%;width:110%;height:20%;">
</div>

      </div>
       
        <div class="col-md-8 col-md-offset-2 ">
            <div class="panel panel-success" >
                <div class="panel-heading" align="center" style="color: #44D711; font-weight: 800">Iniciar Sesion</div>

                <div class="panel-body" >
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}" style="color: #44D711; font-weight: 800">
                        {{ csrf_field() }}

 

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo Electronico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" style="background-color:#44D711 ; border: none; ">
                                    Iniciar Sesion
                                </button>

                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
