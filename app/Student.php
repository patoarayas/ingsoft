<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $fillable = ['rut','name','career','email','phone'];
    /**
     * un trabajo pertenece a muchos estudiantes
     */
    public function work(){
        return $this->belongsTo(Work::class);
    }
}
