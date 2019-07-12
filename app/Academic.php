<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Academic extends Model
{
    protected $fillable = ['rut','name','email'];

    /*
    * Un academico tiene muchos trabajos asociados
    */
    public function works(){
        return $this->belongsToMany(Work::class)->withPivot('academic_role')
    	->withTimestamps();;
    }

}
