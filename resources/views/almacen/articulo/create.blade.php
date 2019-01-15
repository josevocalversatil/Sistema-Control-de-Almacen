@extends ('layouts.admin')
@section ('contenido')

     <div class="row">

     	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
     		<h3>Registrar Nuevo Articulo</h3>

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

            {!! Form::open(array('url'=>'almacen/articulo','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
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
                   <label>Categoria</label>
                   <select name="idcategoria" class="form-control">
                       @foreach($categorias as $cat)
                       <option value="{{$cat->idcategoria}}">{{$cat->nombre}}</option>
                       @endforeach
                   </select>
               </div>
             </div>


            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
               <div class="form-group">
                <label for="codigo">Codigo</label>
                <input type="text" name="codigo" required value="{{old('codigo')}}" class="form-control" placeholder="Codigo del articolo..">
            </div>
          </div>


               <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                 <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" name="stock" required value="{{old('stock')}}" class="form-control" placeholder="Stock del articulo...">
            </div>
               </div>

                 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                 <div class="form-group">
                <label for="stock_minimo">Stock Minimo</label>
                <input type="number" name="stock_minimo" required value="{{old('stock_minimo')}}" class="form-control" placeholder="Stock Minimo del articulo...">
            </div>
               </div>

                 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                 <div class="form-group">
                <label for="stock_maximo">Stock Maximo</label>
                <input type="number" name="stock_maximo" required value="{{old('stock_maximo')}}" class="form-control" placeholder="Stock Maximo del articulo...">
            </div>
               </div>


               <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                 <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <input type="text" name="descripcion" value="{{old('descripcion')}}" class="form-control" placeholder="descripcion del articulo...">
            </div>
               </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                 <div class="form-group">
                <label for="costo_unitario">Costo Unitario</label>
                <input type="text" name="costo_unitario" required value="{{old('costo_unitario')}}" class="form-control" placeholder="Costo Unitario del articulo...">
            </div>
               </div>

                 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                 <div class="form-group">
                <label for="costo_total">Costo Total</label>
                <input type="text" name="costo_total" required value="{{old('costo_total')}}" class="form-control" placeholder="Costo Total del articulo...">
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