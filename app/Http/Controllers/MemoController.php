<?php

namespace sisAlmacen1\Http\Controllers;

use Illuminate\Http\Request;
use sisAlmacen1\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisAlmacen1\Http\Requests\MemoFormRequest;
use sisAlmacen1\Memo;
use sisAlmacen1\DetalleMemo;
use sisAlmacen1\Ingreso;
use sisAlmacen1\DetalleIngreso;
use DB;

//para usar la fecha 
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class MemoController extends Controller
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
    
     $memos=DB::table('memo as m')
    
    ->join('personal as pe','m.idpersonal','=','pe.idpersonal')
    ->join('personal as per','m.idpersonal2','=','per.idpersonal')
    ->join('detalle_memo as dm','m.idmemo','=','dm.idmemo')
    ->join('departamento as dep','m.iddepartamento','=','dep.iddepartamento')

     ->select('m.idmemo','m.fecha_hora','pe.nombre as personal3','dep.nombre as depa','per.nombre as personal4','m.folio_memo','m.numero_memo')
     ->where('m.idmemo','LIKE','%'.$query.'%')
     ->orderBy('m.idmemo','desc')
     ->groupBy('m.idmemo','m.fecha_hora','pe.nombre','dep.nombre','per.nombre','m.folio_memo','m.numero_memo')
     ->paginate();

     return view('almacen.memo.index',['memos'=>$memos,'searchText'=>$query]);
      
     }


    } 

    public function create()
    {
 
       
        
    	
        $personales=DB::table('personal')->where('condicion','=','1')->get();
         $personales2=DB::table('personal')->where('condicion','=','1')->get();
    
        $departamentos=DB::table('departamento')->get();
        $articulos= DB::table('articulo as art')
        ->select(DB::raw('CONCAT(art.codigo," ",art.nombre) AS articulo'),'art.idarticulo')
        ->where('art.estado','=','Activo')
        ->get();



    return view("almacen.memo.create",["departamentos"=>$departamentos,'personales'=>$personales,'personales2'=>$personales2,"articulos"=>$articulos]);

    }


     public function store (MemoFormRequest $request)
    {

    	
        DB::beginTransaction();
        $memo= new Memo;
        $memo->iddepartamento=$request->get('iddepartamento');
        $memo->idpersonal=$request->get('idpersonal');
        $memo->idpersonal2=$request->get('idpersonal2');
        $memo->numero_memo=$request->get('numero_memo');
        $memo->folio_memo=$request->get('folio_memo');
        $mytime = Carbon::now('America/Mexico_City');
        $memo->fecha_hora=$mytime->toDateTimeString();
       
        $memo->save();

        $idarticulo = $request->get('idarticulo');
        $cantidad=$request->get('cantidad');
        $unidad_medida=$request->get('unidad_medida');


        $cont = 0;
        while($cont <count($idarticulo))
        {
        	$detalle = new DetalleMemo();
        	$detalle->idmemo= $memo->idmemo;
        	$detalle->idarticulo= $idarticulo[$cont];
        	$detalle->cantidad= $cantidad[$cont];
            $detalle->unidad_medida=$unidad_medida[$cont];
        	
            $detalle->save();
       $cont=$cont+1;
        }
     
        DB::commit(); 
       
    	

    	
    	return Redirect::to('almacen/memo');
    }


     public function show($id) 
     {
     
     $memo=DB::table('memo as m')
    
    ->join('personal as pe','m.idpersonal','=','pe.idpersonal')
    ->join('personal as per','m.idpersonal2','=','per.idpersonal')
    ->join('detalle_memo as dm','m.idmemo','=','dm.idmemo')
     ->join('departamento as dep','m.iddepartamento','=','dep.iddepartamento')
     ->select('m.idmemo','m.fecha_hora','pe.nombre as personal3','dep.nombre as depa','per.nombre as personal4','m.folio_memo','m.numero_memo')
     ->where('m.idmemo','=',$id)
     ->groupBy('m.idmemo','m.fecha_hora','pe.nombre','dep.nombre','per.nombre','m.folio_memo','m.numero_memo')
     ->first();

     $detalles=DB::table('detalle_memo as d')
     ->join('articulo as a','d.idarticulo','=','a.idarticulo' )
     ->select('a.nombre as articulo','d.cantidad','d.unidad_medida')
     ->where('d.idmemo','=',$id)
     ->get();
     return view('almacen.memo.show',['memo'=>$memo,"detalles"=>$detalles]);

     }



public function destroy($id)
{
	$memo=Memo::findOrFail($id);
	$memo->Estado='C';
	$memo->update();
	return Redirect::to('almacen/memo');
} 




}
