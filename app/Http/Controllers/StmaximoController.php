<?php

namespace sisAlmacen1\Http\Controllers;

use Illuminate\Http\Request;
use sisAlmacen1\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisAlmacen1\Http\Requests\ArticuloFormRequest;
use sisAlmacen1\Articulo;
use DB;
use PDF;
class StmaximoController extends Controller
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
      

      $articulos=DB::table('articulo')->whereColumn('stock','>=','stock_maximo')
       ->where('nombre','LIKE','%'.$query.'%')
    ->where('codigo','LIKE','%'.$query.'%')
      ->orderBy('idarticulo','desc')
      ->paginate();
           
     	



       //###############################3 RUTA DEL INDEX DE CATEGORIA #################################
     
 return view("almacen.stmaximo.index",["articulos"=>$articulos,"searchText"=>$query]);
     	
     }


    }

    public function pdf()

    {
      
       $articulos=DB::table('articulo')->whereColumn('stock','>=','stock_maximo')
    
      ->orderBy('idarticulo','desc')
      ->paginate();

       $pdf=PDF::loadView("almacen.stmaximo.invoice",["articulos"=>$articulos]);
  return $pdf->stream("stock Max.pdf");

    }




}
