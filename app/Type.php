<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = ['activity_name','students_number','duration','req_external_org'];
    /***
     * Un tipo de trabajo tiene muchos trabajos
     */
    public function works(){
        return $this->hasMany(Work::class);
    }
}
