<?php

namespace sisAlmacen1;

use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
       // agregamos la tabla y la llave primaria
    protected $table ='memo';
    protected $primaryKey='idmemo';

    public $timestamps=false;
    protected $fillable =[
   
    
    'idpersonal',
    'idpersonal2',
    'iddepartamento',
    'fecha_hora',
    'folio_memo',
    'numero_memo'
    
    ];

    protected $guarded =[

    ];
}
