<?php

namespace sisAlmacen1\Http\Controllers;

use Illuminate\Http\Request;
use sisAlmacen1\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisAlmacen1\Http\Requests\ArticuloFormRequest;
use sisAlmacen1\Articulo;
use DB;

class ArticuloController extends Controller
{

        // agragamos las finciones 



  //CONTRUCTOR LO UTILIZAREMOS PARA VALIDAR
    public function __construct()
    {


     $this->middleware('auth');

 }

    //objeto que hace referencia al archivo request
 public function index(Request $request)
 {

     $request->user()->authorizeRoles(['admin','user']);
     if ($request) {



     	//COMBERTIMOS ARTICULOS = A para manejarlo como un alias
      $articulos=DB::table('articulo as a')   
        //se hace un join para relacionar el idcategoria de las tablas articulos con categoria 
      ->join('categoria as c','a.idcategoria','=','c.idcategoria')
      ->select('a.idarticulo','a.nombre','a.codigo','a.stock','a.stock_minimo','a.stock_maximo','c.nombre as categoria','a.descripcion','a.estado','a.costo_unitario','a.costo_total')
      ->orderBy('a.idarticulo','desc')
      ->get();


       //###############################3 RUTA DEL INDEX DE CATEGORIA #################################
      return view('almacen.articulo.index',["articulos"=>$articulos]);
  }


}

public function create()
{

    $categorias=DB::table('categoria')->where('condicion','=','1')->get();
    return view("almacen.articulo.create",["categorias"=>$categorias]);

}


//############################ METODO PARA ALMACENAR ####################################################
    //utilizamor el request para validar

public function store(ArticuloFormRequest $request)
{
    $articulo=new Articulo;
    $articulo->idcategoria=$request->get('idcategoria');
    $articulo->codigo=$request->get('codigo');
    $articulo->nombre=$request->get('nombre');
    $articulo->stock=$request->get('stock');
    $articulo->stock_minimo=$request->get('stock_minimo');
    $articulo->stock_maximo=$request->get('stock_maximo');
    $articulo->descripcion=$request->get('descripcion');
    $articulo->estado='Activo';
    $articulo->costo_unitario=$request->get('costo_unitario');
    $articulo->costo_total=$request->get('costo_total');
    $articulo->save();

    //retornamos la vista
    return Redirect::to('almacen/articulo');

}


  //###########################metodo para MOSTRAR  #######################################################
public function show($id)
{

 return view("almacen.articulo.show",["articulo"=>Articulo::findOrFail($id)]);

}

public function edit($id)
{


    $articulo=Articulo::findOrFail($id);
    //ala hora de EDITAR TAMBIEN MANDAMOS EL LISTADO DE CATEGORIAS
    $categorias=DB::table('categoria')->where('condicion','=','1')->get();
    return view("almacen.articulo.edit",["articulo"=>$articulo,"categorias"=>$categorias]);

}

public function update(ArticuloFormRequest $request,$id)
{

 $articulo=Articulo::findOrFail($id);

 $articulo->idcategoria=$request->get('idcategoria');
 $articulo->codigo=$request->get('codigo');
 $articulo->nombre=$request->get('nombre');
 $articulo->stock=$request->get('stock');
 $articulo->stock_minimo=$request->get('stock_minimo');
 $articulo->stock_maximo=$request->get('stock_maximo');
 $articulo->descripcion=$request->get('descripcion');
 $articulo->costo_unitario=$request->get('costo_unitario');
 $articulo->costo_total=$request->get('costo_total');


 $articulo->update();

 return Redirect::to('almacen/articulo');


}

public function destroy($id)
{

    $articulo=Articulo::findOrFail($id);
    $articulo->estado='Inactivo';
    $articulo->update();


    return Redirect::to('almacen/articulo');

}






}
