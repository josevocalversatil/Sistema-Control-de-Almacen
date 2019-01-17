<?php

namespace sisAlmacen1\Http\Controllers;

use Illuminate\Http\Request;
use sisAlmacen1\Http\Requests;
use sisAlmacen1\Categoria;  //MODEL
use Illuminate\Support\Facades\Redirect;
use sisAlmacen1\Http\Requests\CategoriaFormRequest; //VALIDACION
use DB;
use PDF;
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
        ->orderBy('idcategoria','desc')->get();

       //###############################3 RUTA DEL INDEX DE CATEGORIA #################################
     	return view('almacen.categoria.index',["categorias"=>$categorias,"searchText"=>$query]);
     }


    }
    
    public function create()
    {
    
    return view("almacen.categoria.create");

    }

       public function pdf()
    {        
        /**
         * toma en cuenta que para ver los mismos 
         * datos debemos hacer la misma consulta
        **/
        $categorias = Categoria::all(); 

        $pdf = PDF::loadView('almacen.categoria.invoice', compact('categorias'));

        return $pdf->download('listado.pdf');
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
