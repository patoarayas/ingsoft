<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $fillable = ['rut','name','email','phone','career'];
    /**
     * Un trabajo pertenece a muchos estudiantes
     */
    public function work(){
        return $this->belongsTo(Work::class);
    }

    public function careers(){
        return $this->belongsToMany(Career::class);
    }
}
