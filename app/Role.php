<?php

namespace sisAlmacen1;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //


 protected $table ='roles';
    protected $primaryKey='id';

    public $timestamps=false;
    protected $fillable =[
   
    
    'name',
    'description',
    'created_at',
    'updat_at'
    
    ];

    protected $guarded =[

    ];




    public function users()
{
    return $this
        ->belongsToMany('sisAlmacen1\User')
        ->withTimestamps();
}


}
