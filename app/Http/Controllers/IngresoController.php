<?php

namespace sisAlmacen1\Http\Controllers;

use Illuminate\Http\Request;


use sisAlmacen1\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisAlmacen1\Http\Requests\IngresoFormRequest;
use sisAlmacen1\Ingreso;
use sisAlmacen1\DetalleIngreso;
use sisAlmacen1\Memo;
use sisAlmacen1\DetalleMemo;
use DB;
use PDF;

//para usar la fecha 
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;


class IngresoController extends Controller
{
      //CONTRUCTOR LO UTILIZAREMOS PARA VALIDAR
  public function __construct()
  {

   $this->middleware('auth');
 }

    //objeto que hace referencia al archivo request
 public function index(Request $request)
 {

   if ($request)
   {

     $query=trim($request->get('searchText'));
     $memos=DB::table('memo')->get();
     $ingresos=DB::table('ingreso as i')

     ->join('proveedor as p','i.idproveedor','=','p.idproveedor')
     ->join('personal as pe','i.idpersonal','=','pe.idpersonal')
     ->join('personal as per','i.idpersonal2','=','per.idpersonal')
     ->join('memo as m','i.idmemo','=','m.idmemo')
     ->join('detalle_ingreso as di','i.idingreso','=','di.idingreso')

     ->select('i.idingreso','i.fecha_hora','i.numero_factura','p.nombre as proveedor','pe.nombre as personal3','per.nombre as personal4','m.folio_memo','i.estado',DB::raw('sum(di.cantidad*precio_unitario) as total'))
     ->where('i.idingreso','LIKE','%'.$query.'%')
     ->orderBy('i.idingreso','desc')
     ->groupBy('i.idingreso','i.fecha_hora','i.numero_factura','p.nombre','pe.nombre','per.nombre','m.folio_memo','i.estado')
     ->get();
     return view('almacen.ingreso.index',['memos'=>$memos,'ingresos'=>$ingresos,'searchText'=>$query]);

   }


 }


 public function create()
 {



   $proveedores=DB::table('proveedor')->where('condicion','=','1')->get();
   $personales=DB::table('personal')->where('condicion','=','1')->get();
   $personales2=DB::table('personal')->where('condicion','=','1')->get();
   $memos=DB::table('memo')->get();

   $articulos= DB::table('articulo as art')
   ->select(DB::raw('CONCAT(art.codigo," ",art.nombre) AS articulo'),'art.idarticulo')
   ->where('art.estado','=','Activo')
   ->get();



   return view("almacen.ingreso.create",["proveedores"=>$proveedores,'memos'=>$memos,'personales'=>$personales,'personales2'=>$personales2,"articulos"=>$articulos]);

 }

 public function store (IngresoFormRequest $request)
 {


  DB::beginTransaction();
  $ingreso= new Ingreso;
  $ingreso->idproveedor=$request->get('idproveedor');
  $ingreso->idmemo=$request->get('idmemo');
  $ingreso->idpersonal=$request->get('idpersonal');
  $ingreso->idpersonal2=$request->get('idpersonal2');







  $ingreso->fecha_hora=$request->get('fecha_hora');


  $ingreso->numero_factura=$request->get('numero_factura');
  $ingreso->estado='A';
  $ingreso->save();

  $idarticulo = $request->get('idarticulo');
  $cantidad=$request->get('cantidad');
  $precio_unitario=$request->get('precio_unitario');
  $precio_total=$request->get('precio_total');


  $cont = 0;
  while($cont <count($idarticulo))
  {
   $detalle = new DetalleIngreso();
   $detalle->idingreso= $ingreso->idingreso;
   $detalle->idarticulo= $idarticulo[$cont];
   $detalle->cantidad= $cantidad[$cont];
   $detalle->precio_unitario= $precio_unitario[$cont];
   $detalle->precio_total= $precio_total[$cont];
   $detalle->save();
   $cont=$cont+1;
 }

 DB::commit(); 




 return Redirect::to('almacen/ingreso');
}


public function show($id)
{

  $memos=DB::table('memo')->get();
  $ingreso=DB::table('ingreso as i')


  ->join('proveedor as p','i.idproveedor','=','p.idproveedor')
  ->join('detalle_ingreso as di','i.idingreso','=','di.idingreso')
  ->join('personal as pe','i.idpersonal','=','pe.idpersonal')
  ->join('personal as per','i.idpersonal2','=','per.idpersonal')
  ->join('memo as m','i.idmemo','=','m.idmemo')

  ->select('i.idingreso','i.fecha_hora','i.numero_factura','p.nombre as proveedor','pe.nombre as personal3','per.nombre as personal4','m.folio_memo','i.estado',DB::raw('sum(di.cantidad*precio_unitario) as total'))
  ->where('i.idingreso','=',$id)
  ->groupBy('i.idingreso','i.fecha_hora','i.numero_factura','p.nombre','pe.nombre','per.nombre','m.folio_memo','i.estado')
  ->first();

  $detalles=DB::table('detalle_ingreso as d')
  ->join('articulo as a','d.idarticulo','=','a.idarticulo' )
  ->select('a.nombre as articulo','d.cantidad','d.precio_unitario','d.precio_total')
  ->where('d.idingreso','=',$id)
  ->get();
  return view('almacen.ingreso.show',['memos'=>$memos,'ingreso'=>$ingreso,"detalles"=>$detalles]);

}

public function destroy($id)
{
	$ingreso=Ingreso::findOrFail($id);
	$ingreso->Estado='C';
	$ingreso->update();
	return Redirect::to('almacen/ingreso');
} 



public function pdf($id)
{
  $memos=DB::table('memo')->get();
  $ingreso=DB::table('ingreso as i')


  ->join('proveedor as p','i.idproveedor','=','p.idproveedor')
  ->join('detalle_ingreso as di','i.idingreso','=','di.idingreso')
  ->join('personal as pe','i.idpersonal','=','pe.idpersonal')
  ->join('personal as per','i.idpersonal2','=','per.idpersonal')
  ->join('memo as m','i.idmemo','=','m.idmemo')

  ->select('i.idingreso','i.fecha_hora','i.numero_factura','p.nombre as proveedor','pe.nombre as personal3','per.nombre as personal4','m.folio_memo','i.estado',DB::raw('sum(di.cantidad*precio_unitario) as total'))
  ->where('i.idingreso','=',$id)
  ->groupBy('i.idingreso','i.fecha_hora','i.numero_factura','p.nombre','pe.nombre','per.nombre','m.folio_memo','i.estado')
  ->first();

  $detalles=DB::table('detalle_ingreso as d')
  ->join('articulo as a','d.idarticulo','=','a.idarticulo' )
  ->select('a.nombre as articulo','d.cantidad','d.precio_unitario','d.precio_total')
  ->where('d.idingreso','=',$id)
  ->get();


  $pdf=PDF::loadView("almacen.ingreso.invoice",['memos'=>$memos,'ingreso'=>$ingreso,"detalles"=>$detalles]);
  return $pdf->stream("Ingreso.pdf"); 
}


public function pdfFechas(Request $request)

{


 $fechaMin=strtotime($request->get('fechaMin'));
 $fechaMin= date('Y-m-d',$fechaMin);
 $fechaMax=strtotime($request->get('fechaMax'));
 $fechaMax= date('Y-m-d',$fechaMax);
 $memos=DB::table('memo')->get();
 $ingreso=DB::table('ingreso as i')
 ->join('proveedor as p','i.idproveedor','=','p.idproveedor')
 ->join('detalle_ingreso as di','i.idingreso','=','di.idingreso')
 ->join('personal as pe','i.idpersonal','=','pe.idpersonal')
 ->join('personal as per','i.idpersonal2','=','per.idpersonal')
 ->join('memo as m','i.idmemo','=','m.idmemo')
 ->select('i.idingreso','i.fecha_hora','i.numero_factura','p.nombre as proveedor','pe.nombre as personal3','per.nombre as personal4','m.folio_memo','i.estado',DB::raw('sum(di.cantidad*precio_unitario) as total'))
 ->whereBetween('i.fecha_hora',[$fechaMin, $fechaMax])
 ->orderBy('i.idingreso','desc')
 ->groupBy('i.idingreso','i.fecha_hora','i.numero_factura','p.nombre','pe.nombre','per.nombre','m.folio_memo','i.estado')
 ->get();


  $pdf=PDF::loadView("almacen.ingreso.invoiceIngresoFecha",['memos'=>$memos,'ingreso'=>$ingreso]);
  return $pdf->stream("Ingreso.pdf");

}

public function pdfFactura(Request $request)
{

  $facturaMinimo=$request->get('facturaMinimo');
  $facturaMaximo=$request->get('facturaMaximo');

  $ingreso=DB::table('ingreso as i')
 ->join('proveedor as p','i.idproveedor','=','p.idproveedor')
 ->join('detalle_ingreso as di','i.idingreso','=','di.idingreso')
 ->join('personal as pe','i.idpersonal','=','pe.idpersonal')
 ->join('personal as per','i.idpersonal2','=','per.idpersonal')
 ->join('memo as m','i.idmemo','=','m.idmemo')
 ->select('i.idingreso','i.fecha_hora','i.numero_factura','p.nombre as proveedor','pe.nombre as personal3','per.nombre as personal4','m.folio_memo','i.estado',DB::raw('sum(di.cantidad*precio_unitario) as total'))
  ->where('i.numero_factura', '>=',$facturaMinimo)
  ->where('i.numero_factura', '<=',$facturaMaximo)
  ->orderBy('i.idingreso','desc')
 ->groupBy('i.idingreso','i.fecha_hora','i.numero_factura','p.nombre','pe.nombre','per.nombre','m.folio_memo','i.estado')
 ->get();

   $pdf=PDF::loadView("almacen.ingreso.invoiceIngresoFactura",['ingreso'=>$ingreso]);
  return $pdf->stream("Ingreso.pdf");
}



public function pdfMemo(Request $request)
{

  $memoMinimo=$request->get('memoMinimo');
  $memoMaximo=$request->get('memoMaximo');

  $ingreso=DB::table('ingreso as i')
 ->join('proveedor as p','i.idproveedor','=','p.idproveedor')
 ->join('detalle_ingreso as di','i.idingreso','=','di.idingreso')
 ->join('personal as pe','i.idpersonal','=','pe.idpersonal')
 ->join('personal as per','i.idpersonal2','=','per.idpersonal')
 ->join('memo as m','i.idmemo','=','m.idmemo')
 ->select('i.idingreso','i.fecha_hora','i.numero_factura','p.nombre as proveedor','pe.nombre as personal3','per.nombre as personal4','m.folio_memo','i.estado',DB::raw('sum(di.cantidad*precio_unitario) as total'))
  ->where('m.folio_memo', '>=',$memoMinimo)
  ->where('m.folio_memo', '<=',$memoMaximo)
  ->orderBy('i.idingreso','desc')
 ->groupBy('i.idingreso','i.fecha_hora','i.numero_factura','p.nombre','pe.nombre','per.nombre','m.folio_memo','i.estado')
 ->get();

   $pdf=PDF::loadView("almacen.ingreso.invoiceIngresoMemo",['ingreso'=>$ingreso]);
  return $pdf->stream("Ingreso.pdf");
}


public function pdfTotal(Request $request)
{

  $totalMinimo=$request->get('totalMin');
  $totalMaximo=$request->get('totalMax');

  $ingreso=DB::table('ingreso as i')
 ->join('proveedor as p','i.idproveedor','=','p.idproveedor')
 ->join('detalle_ingreso as di','i.idingreso','=','di.idingreso')
 ->join('personal as pe','i.idpersonal','=','pe.idpersonal')
 ->join('personal as per','i.idpersonal2','=','per.idpersonal')
 ->join('memo as m','i.idmemo','=','m.idmemo')
 ->select('i.idingreso','i.fecha_hora','i.numero_factura','p.nombre as proveedor','pe.nombre as personal3','per.nombre as personal4','m.folio_memo','i.estado',DB::raw('sum(di.cantidad*precio_unitario) as total'))

  ->having('SUM(di.cantidad*precio_unitario)','>=',$totalMinimo)
  ->having('SUM(di.cantidad*precio_unitario)','<=',$totalMaximo)
  ->orderBy('i.idingreso','desc')
 ->groupBy('i.idingreso','i.fecha_hora','i.numero_factura','p.nombre','pe.nombre','per.nombre','m.folio_memo','i.estado')
 ->get();

   $pdf=PDF::loadView("almacen.ingreso.invoiceIngresoTotal",['ingreso'=>$ingreso]);
  return $pdf->stream("Ingreso.pdf");
}

}
