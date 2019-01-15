<?php

namespace sisAlmacen1\Http\Controllers;

use Illuminate\Http\Request;
use sisAlmacen1\Http\Requests;
use sisAlmacen1\Categoria;  //MODEL
use Illuminate\Support\Facades\Redirect;
use sisAlmacen1\Http\Requests\CategoriaFormRequest; //VALIDACION
use DB;

class CategoriaController extends Controller
{
    //

 // agragamos las finciones 



  //CONTRUCTOR LO UTILIZAREMOS PARA VALIDAR
    public function __construct()
    {

    $this->middleware('auth');
    }
    
    //objeto que hace referencia al archivo request
    public function index(Request $request)
    {

        $request->user()->authorizeRoles('admin');
     
     if ($request) {
     	
     	$query=trim($request->get('searchText'));
     	$categorias=DB::table('categoria')->where('nombre','LIKE','%'.$query.'%')
     	->where('condicion','=','1')
     	->orderBy('idcategoria','desc')
     	->paginate();


       //###############################3 RUTA DEL INDEX DE CATEGORIA #################################
     	return view('almacen.categoria.index',["categorias"=>$categorias,"searchText"=>$query]);
     }


    }
    
    public function create()
    {
    
    return view("almacen.categoria.create");

    }


//############################ METODO PARA ALMACENAR ####################################################
    //utilizamor el request para validar

    public function store(CategoriaFormRequest $request)
    {
    $categoria=new Categoria;
    $categoria->nombre=$request->get('nombre');
    $categoria->descripcion=$request->get('descripcion');
    $categoria->condicion='1';
    $categoria->save();

    //retornamos la vista
    return Redirect::to('almacen/categoria');

    }


  //###########################metodo para MOSTRAR  #######################################################
    public function show($id)
    {

    	return view("almacen.categoria.show",["categoria"=>Categoria::findOrFail($id)]);

    }
     
     public function edit($id)
     {

    return view("almacen.categoria.edit",["categoria"=>Categoria::findOrFail($id)]);

     }

     public function update(CategoriaFormRequest $request,$id)
     {

     $categoria=Categoria::findOrFail($id);
     $categoria->nombre=$request->get('nombre');
     $categoria->descripcion=$request->get('descripcion');
      $categoria->update();

      return Redirect::to('almacen/categoria');


     }

     public function destroy($id)
     {

        $categoria=Categoria::findOrFail($id);
        $categoria->condicion='0';
        $categoria->update();


        return Redirect::to('almacen/categoria');

     }



}
