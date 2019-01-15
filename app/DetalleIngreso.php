<?php

namespace sisAlmacen1;

use Illuminate\Database\Eloquent\Model;

class DetalleIngreso extends Model
{
     // agregamos la tabla y la llave primaria
    protected $table ='detalle_ingreso';
    protected $primaryKey='iddetalle_ingreso';

 public $timestamps=false;
    protected $fillable =[
    'idingreso',
    'idarticulo',
    'cantidad',
    'precio_unitario',
    'precio_total'
    ];

    protected $guarded =[

    ];
}
