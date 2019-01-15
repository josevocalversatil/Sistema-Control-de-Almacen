<?php

namespace sisAlmacen1\Http\Controllers;

use Illuminate\Http\Request;
use sisAlmacen1\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisAlmacen1\Http\Requests\ProveedorFormRequest;
use sisAlmacen1\Proveedor;
use DB;

class ProveedorController extends Controller
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
     $request->user()->authorizeRoles('admin');
     if ($request) {
     	
     	$query=trim($request->get('searchText'));
     	$proveedores=DB::table('proveedor')->where('nombre','LIKE','%'.$query.'%')
     	->select('idproveedor','nombre','direccion','telefono','email','razon_social','rfc')
     	->where('condicion','=','1')
     	->orderBy('idproveedor','desc')
     	->paginate();


       //###############################3 RUTA DEL INDEX DE CATEGORIA #################################
     	return view('almacen.proveedor.index',["proveedores"=>$proveedores,"searchText"=>$query]);
     }


    }
    
    public function create()
    {
    
    return view("almacen.proveedor.create");

    }


//############################ METODO PARA ALMACENAR ####################################################
    //utilizamor el request para validar

    public function store(ProveedorFormRequest $request)
    {
    $proveedor=new Proveedor;
    $proveedor->nombre=$request->get('nombre');
    $proveedor->direccion=$request->get('direccion');
    $proveedor->telefono=$request->get('telefono');
    $proveedor->email=$request->get('email');
    $proveedor->razon_social=$request->get('razon_social');
    $proveedor->rfc=$request->get('rfc');
    $proveedor->condicion='1';
    $proveedor->save();

    //retornamos la vista
    return Redirect::to('almacen/proveedor');

    }


  //###########################metodo para MOSTRAR  #######################################################
    public function show($id)
    {

    	return view("almacen.proveedor.show",["proveedor"=>Proveedor::findOrFail($id)]);

    }
     
     public function edit($id)
     {

    return view("almacen.proveedor.edit",["proveedor"=>Proveedor::findOrFail($id)]);

     }

     public function update(ProveedorFormRequest $request,$id)
     {

     $proveedor=Proveedor::findOrFail($id);
     $proveedor->nombre=$request->get('nombre');
     $proveedor->direccion=$request->get('direccion');
     $proveedor->telefono=$request->get('telefono');
     $proveedor->email=$request->get('email');
     $proveedor->razon_social=$request->get('razon_social');
     $proveedor->rfc=$request->get('rfc');
      $proveedor->update();

      return Redirect::to('almacen/proveedor');


     }

     public function destroy($id)
     {

        $proveedor=Proveedor::findOrFail($id);
        $proveedor->condicion='0';
        $proveedor->update();


        return Redirect::to('almacen/proveedor');

     }





}
