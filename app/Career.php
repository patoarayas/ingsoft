<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    //
    protected $fillable = [
        'career'
    ];
    /**
     * Una carrera tiene muchos estudiantes
     */
    public function students(){
        return $this->hasMany(Student::class);
    }
}
