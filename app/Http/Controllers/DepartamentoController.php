<?php

namespace sisAlmacen1\Http\Controllers;

use Illuminate\Http\Request;
use sisAlmacen1\Http\Requests;
use sisAlmacen1\Departamento;  //MODEL
use Illuminate\Support\Facades\Redirect;
use sisAlmacen1\Http\Requests\DepartamentoFormRequest; //VALIDACION
use DB;
use PDF;


class DepartamentoController extends Controller
{
    
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
     	$departamentos=DB::table('departamento')->where('nombre','LIKE','%'.$query.'%')
     	->where('condicion','=','1')
     	->orderBy('iddepartamento','desc')
     	->paginate();


       //###############################3 RUTA DEL INDEX DE CATEGORIA #################################
     	return view('almacen.departamento.index',["departamentos"=>$departamentos,"searchText"=>$query]);
     }


    }
    
    public function create()
    {
    
    return view("almacen.departamento.create");

    }


//############################ METODO PARA ALMACENAR ####################################################
    //utilizamor el request para validar

    public function store(DepartamentoFormRequest $request)
    {
    $departamento=new Departamento;
    $departamento->nombre=$request->get('nombre');
    $departamento->descripcion=$request->get('descripcion');
    $departamento->condicion='1';
    $departamento->save();

    //retornamos la vista
    return Redirect::to('almacen/departamento');

    }


  //###########################metodo para MOSTRAR  #######################################################
    public function show($id)
    {

    	return view("almacen.departamento.show",["departamento"=>Departamento::findOrFail($id)]);

    }
     
     public function edit($id)
     {

    return view("almacen.departamento.edit",["departamento"=>Departamento::findOrFail($id)]);

     }

     public function update(DepartamentoFormRequest $request,$id)
     {

     $departamento=Departamento::findOrFail($id);
     $departamento->nombre=$request->get('nombre');
     $departamento->descripcion=$request->get('descripcion');
     $departamento->update();

      return Redirect::to('almacen/departamento');


     }

     public function destroy($id)
     {

        $departamento=Departamento::findOrFail($id);
        $departamento->condicion='0';
        $departamento->update();


        return Redirect::to('almacen/departamento');

     }

     public function pdf()
     {
        $departamentos=Departamento::all();

          $pdf = PDF::loadView('almacen.departamento.invoice', compact('departamentos'));

        return $pdf->stream('Departamentos.pdf');


     }





}
