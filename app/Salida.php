<?php

namespace sisAlmacen1;

use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    
       // agregamos la tabla y la llave primaria
    protected $table ='salida';
    protected $primaryKey='idsalida';

    public $timestamps=false;
    protected $fillable =[
   
    'idmemo',
    'idpersonal',
    'idpersonal2',
    'iddepartamento',
    'fecha_hora',
    'estado'
    
    ];

    protected $guarded =[

    ];




}
