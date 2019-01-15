<?php

namespace sisAlmacen1;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    
      // agregamos la tabla y la llave primaria
    protected $table ='departamento';
    protected $primaryKey='iddepartamento';

 public $timestamps=false;
    protected $fillable =[
    'nombre',
    'descripcion'
    
    ];

    protected $guarded =[

    ];

}
