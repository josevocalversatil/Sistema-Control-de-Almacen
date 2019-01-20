<?php

namespace sisAlmacen1\Http\Controllers;

use Illuminate\Http\Request;
use sisAlmacen1\Http\Requests;
use sisAlmacen1\Personal;
use Illuminate\Support\Facades\Redirect;
use sisAlmacen1\Http\Requests\PersonalFormRequest;
use DB;
use PDF;

class PersonalController extends Controller
{
   
    public function __construct()
    {

    $this->middleware('auth');
    }


    public function index(Request $request)
    {
     $request->user()->authorizeRoles('admin');
     if ($request) {
     	
     $query=trim($request->get('searchText'));
        $personales=DB::table('personal as p')
        ->join('departamento as dep','p.iddepartamento','=','dep.iddepartamento')
        ->select('p.idpersonal','p.nombre','p.telefono','p.email','dep.nombre as departamento','p.puesto') 
         ->where('p.nombre','LIKE','%'.$query.'%')
         ->orderBy('p.idpersonal','desc')
        ->paginate();


       //###############################3 RUTA DEL INDEX DE personal #################################
     	return view("almacen.personal.index",["personales"=>$personales,"searchText"=>$query]);
     }

    }


   public function create()
    {
    
    $departamentos=DB::table('departamento')->where('condicion','=','1')->get();
    return view("almacen.personal.create",["departamentos"=>$departamentos]);

    }

     public function store(PersonalFormRequest $request)
    {
    $personal=new Personal;
    $personal->iddepartamento=$request->get('iddepartamento');
    $personal->nombre=$request->get('nombre');
    $personal->telefono=$request->get('telefono');
    $personal->email=$request->get('email');
    $personal->puesto=$request->get('puesto');
    $personal->condicion='1';
    $personal->save();

    //retornamos la vista
    return Redirect::to('almacen/personal');

    }

      public function show($id)
    {

    	return view("almacen.personal.show",["personal"=>Personal::findOrFail($id)]);

    }


     public function edit($id)
     {


    $personal=Personal::findOrFail($id);
    //ala hora de EDITAR TAMBIEN MANDAMOS EL LISTADO DE CATEGORIAS
    $departamentos=DB::table('departamento')->where('condicion','=','1')->get();
    return view("almacen.personal.edit",["personal"=>$personal,"departamentos"=>$departamentos]);

     }

     
      public function update(PersonalFormRequest $request,$id)
     {

     $personal=Personal::findOrFail($id);
   $personal->iddepartamento=$request->get('iddepartamento');
    $personal->nombre=$request->get('nombre');
    $personal->telefono=$request->get('telefono');
    $personal->email=$request->get('email');
    $personal->puesto=$request->get('puesto');
  
    $personal->update();


      return Redirect::to('almacen/personal');


     }


      public function destroy($id)
     {

        $personal=Personal::findOrFail($id);
        $personal->condicion='0';
        $personal->update();


        return Redirect::to('almacen/personal');

     }

   
     public function pdf()
{ 

     $personales= Personal::
        join('departamento as dep','personal.iddepartamento','=','dep.iddepartamento')
        ->select('personal.idpersonal','personal.nombre','personal.telefono','personal.email','dep.nombre as departamento','personal.puesto') 
        ->orderBy('personal.idpersonal','desc')
    ->get();

  $pdf=PDF::loadView("almacen.personal.invoice",["personales"=>$personales]);
  return $pdf->stream("Personal.pdf");
        


}







}

