<?php

namespace sisAlmacen1\Http\Controllers;

use Illuminate\Http\Request;
use sisAlmacen1\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisAlmacen1\Http\Requests\SalidaFormRequest;
use sisAlmacen1\Salida;
use sisAlmacen1\DetalleSalida;
use sisAlmacen1\Departamento;
use DB;

//para usar la fecha 
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;



class SalidaController extends Controller
{
    
     public function __construct()
    {

     $this->middleware('auth');
    }

     public function index(Request $request)
    {
     
     if ($request)
      {
     	
     $query=trim($request->get('searchText'));
    
     $salidas=DB::table('salida as s')
    
    ->join('personal as pe','s.idpersonal','=','pe.idpersonal')
    ->join('personal as per','s.idpersonal2','=','per.idpersonal')
     ->join('memo as m','s.idmemo','=','m.idmemo')
     ->join('detalle_salida as ds','s.idsalida','=','ds.idsalida')
     ->join('departamento as dep','s.iddepartamento','=','dep.iddepartamento')

     ->select('s.idsalida','s.fecha_hora','pe.nombre as personal3','dep.nombre as depa','per.nombre as personal4','m.folio_memo','s.estado')
     ->where('s.idsalida','LIKE','%'.$query.'%')
     ->orderBy('s.idsalida','desc')
     ->groupBy('s.idsalida','s.fecha_hora','pe.nombre','dep.nombre','per.nombre','m.folio_memo','s.estado')
     ->paginate();

     return view('almacen.salida.index',['salidas'=>$salidas,'searchText'=>$query]);
      
     }


    } 

    public function create()
    {
 
       
        
    	
        $personales=DB::table('personal')->where('condicion','=','1')->get();
         $personales2=DB::table('personal')->where('condicion','=','1')->get();
        $memos=DB::table('memo')->get();
        $departamentos=DB::table('departamento')->get();
        $articulos= DB::table('articulo as art')
        ->select(DB::raw('CONCAT(art.codigo," ",art.nombre) AS articulo'),'art.idarticulo')
        ->where('art.estado','=','Activo')
        ->get();



    return view("almacen.salida.create",["departamentos"=>$departamentos,'memos'=>$memos,'personales'=>$personales,'personales2'=>$personales2,"articulos"=>$articulos]);

    }


     public function store (SalidaFormRequest $request)
    {

    	
        DB::beginTransaction();
        $salida= new Salida;
        $salida->iddepartamento=$request->get('iddepartamento');
        $salida->idmemo=$request->get('idmemo');
        $salida->idpersonal=$request->get('idpersonal');
        $salida->idpersonal2=$request->get('idpersonal2');
      
        $mytime = Carbon::now('America/Mexico_City');
        $salida->fecha_hora=$mytime->toDateTimeString();
        $salida->estado='A';
        $salida->save();

        $idarticulo = $request->get('idarticulo');
        $cantidad=$request->get('cantidad');
     


        $cont = 0;
        while($cont <count($idarticulo))
        {
        	$detalle = new DetalleSalida();
        	$detalle->idsalida= $salida->idsalida;
        	$detalle->idarticulo= $idarticulo[$cont];
        	$detalle->cantidad= $cantidad[$cont];
        	
            $detalle->save();
       $cont=$cont+1;
        }
     
        DB::commit(); 
       
    	

    	
    	return Redirect::to('almacen/salida');
    }


     public function show($id) 
     {
     
     $salida=DB::table('salida as s')
    
    ->join('personal as pe','s.idpersonal','=','pe.idpersonal')
    ->join('personal as per','s.idpersonal2','=','per.idpersonal')
     ->join('memo as m','s.idmemo','=','m.idmemo')
     ->join('detalle_salida as ds','s.idsalida','=','ds.idsalida')
     ->join('departamento as dep','s.iddepartamento','=','dep.iddepartamento')

   ->select('s.idsalida','s.fecha_hora','pe.nombre as personal3','dep.nombre as depa','per.nombre as personal4','m.folio_memo','s.estado')
     ->where('s.idsalida','=',$id)
     ->groupBy('s.idsalida','s.fecha_hora','pe.nombre','dep.nombre','per.nombre','m.folio_memo','s.estado')
     ->first();

     $detalles=DB::table('detalle_salida as d')
     ->join('articulo as a','d.idarticulo','=','a.idarticulo' )
     ->select('a.nombre as articulo','d.cantidad')
     ->where('d.idsalida','=',$id)
     ->get();
     return view('almacen.salida.show',['salida'=>$salida,"detalles"=>$detalles]);

     }



public function destroy($id)
{
	$salida=Salida::findOrFail($id);
	$salida->Estado='C';
	$salida->update();
	return Redirect::to('almacen/salida');
} 


}
