<?php

namespace sisAlmacen1\Http\Controllers;

use Illuminate\Http\Request;
use sisAlmacen1\Http\Requests;
use sisAlmacen1\User;
use sisAlmacen1\Role;
use Illuminate\Support\Facades\Redirect;
use sisAlmacen1\Http\Requests\UsuarioFormRequest;
use DB;



class UsuarioController extends Controller
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
     	$usuarios=DB::table('users')->where('name','LIKE','%'.$query.'%')
        ->orderBy('id','desc')
        ->paginate();


       //###############################3 RUTA DEL INDEX DE CATEGORIA #################################
     	return view('almacen.usuario.index',["usuarios"=>$usuarios,"searchText"=>$query]);
     }


    } 


    public function create()
    {
    
    return view("almacen.usuario.create");

    }

    public function store(UsuarioFormRequest $request)
    {

    	//hacemos referencia al modelo USER
      
  $role_user = Role::where('name', 'user')->first();
       $role_admin = Role::where('name', 'admin')->first();

    $usuario=new User;
    $usuario->name=$request->get('name');
    $usuario->email=$request->get('email');
    $usuario->password=bcrypt($request->get('password'));
    $usuario->save();
    $usuario->roles()->attach($role_user);
    //retornamos la vista
    return Redirect::to('almacen/usuario');

    }
         
     public function edit($id)
     {

    return view("almacen.usuario.edit",["usuario"=>User::findOrFail($id)]);

     }

        public function update(UsuarioFormRequest $request,$id)
     {


     $usuario=User::findOrFail($id);
    $usuario->name=$request->get('name');
    $usuario->email=$request->get('email');
    $usuario->password=bcrypt($request->get('password'));
    $usuario->update();

      return Redirect::to('almacen/usuario');


     }

       public function destroy($id)
     {

        $usuario=DB::table('users')->where('id','=',$id)->delete();
        

        return Redirect::to('almacen/usuario');

     }


}
