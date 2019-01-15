<?php

namespace sisAlmacen1;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    //

      // agregamos la tabla y la llave primaria
    protected $table ='proveedor';
    protected $primaryKey='idproveedor';

 public $timestamps=false;
    protected $fillable =[
    'nombre',
    'direccion',
    'telefono',
    'email',
    'razon_social',
    'rfc'
    
    ];

    protected $guarded =[

    ];

}
