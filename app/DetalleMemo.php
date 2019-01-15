<?php

namespace sisAlmacen1;

use Illuminate\Database\Eloquent\Model;

class DetalleMemo extends Model
{
     protected $table='detalle_memo';
   protected $primaryKey='iddetalle_memo';
   

   public $timestamps=false;
   protected $fillable=[
   'idmemo',
   'idarticulo',
   'cantidad',
   'unidad_medida'
   ];


protected $guarded =[

    ];
}
