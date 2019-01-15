<?php

namespace sisAlmacen1;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
        // agregamos la tabla y la llave primaria de la tabla ARTICULOS
    protected $table ='articulo';
    protected $primaryKey='idarticulo';

//ponemos la siguiente instruccion para que no se agregen en automatico las 2 columnas en la tabla ademas los campos que se llenaran

    public $timestamps=false;
    protected $fillable =[
    'idcategoria',
    'codigo',
    'nombre',
    'stock',
    'stock_minimo',
    'stock_maximo',
    'descripcion',
    'estado',
    'costo_unitario',
    'costo_total'
    ];

    protected $guarded =[

    ];



}
