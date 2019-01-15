@extends ('layouts.admin')
@section ('contenido')

     <div class="row">

     	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
     		<h3>Editar Articulo: {{ $articulo->nombre}}</h3>

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

            {!! Form::model($articulo,['method'=>'PATCH','route'=>['articulo.update',$articulo->idarticulo],'files'=>'true'])!!}
            {{Form::token()}}


            <!-- EL NAME DEL INPUT TIENE QUE SER IGUAL AL DEL CONTROLADOR Y AL DE LA VALIDACIONA POR QUE ES EL QUE SE ESTA MANDANDO    -->


            
           <div class="row">
               <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                
                <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" required value="{{$articulo->nombre}}" class="form-control" ">
            </div>
        </div>


            <!-- ESTE ES EL SELECT PARA CATEGORIAS el IF ES PARA DEJAR SELECCIONADA LA CAT EN CASO DE EDITAR-->

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
               <div class="form-group">
                   <label>Categoria</label>
                   <select name="idcategoria" class="form-control">
                       @foreach($categorias as $cat)
                       @if($cat->idcategoria==$articulo->idcategoria)
                       <option value="{{$cat->idcategoria}}"selected>{{$cat->nombre}}</option>
                       @else
                        <option value="{{$cat->idcategoria}}">{{$cat->nombre}}</option>
                        @endif
                       @endforeach
                   </select>
               </div>
             </div>


            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
               <div class="form-group">
                <label for="codigo">Codigo</label>
                <input type="text" name="codigo" required value="{{$articulo->codigo}}" class="form-control" >
            </div>
          </div>


               <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                 <div class="form-group">
                <label for="stock">Stock</label>
                <input type="text" name="stock" required value="{{$articulo->stock}}" class="form-control">
            </div>
               </div>

               <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                 <div class="form-group">
                <label for="stock_minimo">Stock Minimo</label>
                <input type="text" name="stock_minimo" required value="{{$articulo->stock_minimo}}" class="form-control">
            </div>
               </div>

               <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                 <div class="form-group">
                <label for="stock_maximo">Stock Maximo</label>
                <input type="text" name="stock_maximo" required value="{{$articulo->stock_maximo}}" class="form-control">
            </div>
               </div>


               <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                 <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <input type="text" name="descripcion" value="{{$articulo->descripcion}}" class="form-control" placeholder="descripcion del articulo...">
            </div>
               </div>

               <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                 <div class="form-group">
                <label for="costo_unitario">Costo Unitario</label>
                <input type="text" name="costo_unitario" required value="{{$articulo->costo_unitario}}" class="form-control">
            </div>
               </div>

               <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                 <div class="form-group">
                <label for="costo_total">Costo Total</label>
                <input type="text" name="costo_total" required value="{{$articulo->costo_total}}" class="form-control">
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