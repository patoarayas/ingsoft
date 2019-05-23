<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    
    protected $fillable = ['title','status','start_date','finish_date',
                           'name_ext_org','tutor_ext_org','students_number',
                           'year_reg','semester_reg','certification_date',
                           'qualification','curricular_code'];

    /**
     * un trabajo pertenece a muchos estudiantes
     */
    public function Students(){
        return $this->hasMany(Student::class);
    }

    /**
     * un trabajo pertenece a muchos estudiantes
     */
    public function type(){
        return $this->belongsTo(Type::class);
    }
    
    /**
     *  un trabajo pertenece a muchos academicos
     */
    public function academics(){
        return $this->belongsToMany(Academic::class);
    }
    
}
