<?php

namespace sisAlmacen1\Http\Controllers;

use Illuminate\Http\Request;
use sisAlmacen1\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisAlmacen1\Http\Requests\ArticuloFormRequest;
use sisAlmacen1\Articulo;
use DB;


class StminimoController extends Controller
{
     public function __construct()
    {
  

     $this->middleware('auth');
     
    }
    
    //objeto que hace referencia al archivo request
    public function index(Request $request)
    {
     
     if ($request) {
     	
     	$query=trim($request->get('searchText'));

     	//COMBERTIMOS ARTICULOS = A para manejarlo como un alias
      

      $articulos=DB::table('articulo')->whereColumn('stock','<=','stock_minimo')
 
       ->where('nombre','LIKE','%'.$query.'%')
    ->where('codigo','LIKE','%'.$query.'%')
      ->orderBy('idarticulo','desc')
    
     
      ->paginate();
           
     	



       //###############################3 RUTA DEL INDEX DE CATEGORIA #################################
     
 return view("almacen.stminimo.index",["articulos"=>$articulos,"searchText"=>$query]);
     	
     }


    }
}


