<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{

    protected $fillable = ['title','status','start_date','finish_date',
                           'name_ext_org','tutor_ext_org','cant_students',
                           'year_reg','semester_reg','graduation_date',
                           'grade','curricular_code','type_id'];

     // Atributos por default
    protected $attributes = [
                    'status'=>'INGRESADA',
                    'cant_students'=>0,
                    'year_reg'=>'2019',
                    'semester_reg'=>'SEGUNDO',
    ];
    /**
     * Un trabajo pertenece a muchos estudiantes
     */
    public function students(){
        return $this->hasMany(Student::class);
    }

    /**
     * Un trabajo pertenece a muchos estudiantes
     */
    public function type(){
        return $this->hasOne(Type::class);
    }

    /**
     *  Un trabajo pertenece a muchos academicos
     */
    public function academics(){
        return $this->belongsToMany(Academic::class)->withPivot('academic_role')
    	->withTimestamps();
    }

}
