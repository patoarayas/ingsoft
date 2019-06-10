<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{

    protected $fillable = ['title','status','start_date','finish_date',
                           'name_ext_org','tutor_ext_org','cant_students',
                           'year_reg','semester_reg','graduation_date',
                           'grade','curricular_code'];

    /**
     * Un trabajo pertenece a muchos estudiantes
     */
    public function Students(){
        return $this->hasMany(Student::class);
    }

    /**
     * Un trabajo pertenece a muchos estudiantes
     */
    public function types(){
        return $this->belongsTo(Type::class);
    }

    /**
     *  Un trabajo pertenece a muchos academicos
     */
    public function academics(){
        return $this->belongsToMany(Academic::class);
    }

}
