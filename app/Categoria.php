<?php

namespace sisAlmacen1;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //
     // agregamos la tabla y la llave primaria
    protected $table ='categoria';
    protected $primaryKey='idcategoria';

 public $timestamps=false;
    protected $fillable =[
    'nombre',
    'descripcion'
    
    ];

    protected $guarded =[

    ];


}
