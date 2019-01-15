<?php

namespace sisAlmacen1;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
        // agregamos la tabla y la llave primaria de la tabla ARTICULOS
    protected $table ='personal';
    protected $primaryKey='idpersonal';

//ponemos la siguiente instruccion para que no se agregen en automatico las 2 columnas en la tabla ademas los campos que se llenaran

    public $timestamps=false;
    protected $fillable =[
    'iddepartamento',
    'nombre',
    'telefono',
    'email',
    'puesto'

    ];

    protected $guarded =[

    ];

}
