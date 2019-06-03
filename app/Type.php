<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = ['activity_name','max_students','duration','req_external_org'];
    /***
     * Un tipo de trabajo tiene muchos trabajos
     */
    public function works(){
        return $this->hasMany(Work::class);
    }
}
