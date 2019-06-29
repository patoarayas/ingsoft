<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    //
    protected $fillable = [
        'career'
    ];
    
    public function students(){
        return $this->belongsToMany(Student::class);
    }
}
