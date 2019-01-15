<?php

namespace sisAlmacen1;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Ingreso extends Model
{
      //
     // agregamos la tabla y la llave primaria
    protected $table ='ingreso';
    protected $primaryKey='idingreso';

 public $timestamps=false;
    protected $fillable =[
    'idproveedor',
    'idmemo',
    'idpersonal',
    'idpersonal2',
    'fecha_hora',
    'numero_factura',
    'estado'
    
    ];

    protected $guarded =[

    ];

   
}
