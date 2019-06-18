<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Work;
use App\Type;
use App\Student;
use App\Academic;
use App\Career;
use App\CareerStudent;
use App\Http\Requests\StudentStoreRequest;
use App\Http\Requests\StudentUpdateRequest;
use Freshwork\ChileanBundle\Rut;

class StudentController extends Controller
{


    /* security verification */
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $careers = Career::orderBy('id','ASC')->get();
        $students = Student::orderBy('id','ASC')->get();
        //dd($types); //funcionara para revisar los datos de la bd
        return view('admin.students.index', compact('students','careers'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::orderBy('id','ASC')->get();
        $careers = Career::orderBy('id','ASC')->get();
        return view('admin.students.create',compact('types','careers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentStoreRequest $request)
    {
        /*
        // Cambios
        $students = Student::orderBy('id','ASC')->get();
        $academics = Academic::orderBy('id','ASC')->get();
        $types = Type::orderBy('id','ASC')->get();

        //Fin Cambios

        $work = Studentcreate($request->all());
        // Mas cambios
        dd($work);
        $type = Type::find($work_id);
        //Mas cambios
        return  redirect()->route('works.index',$work->id)->with('info','Actividad de titulación creada correctamente');
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        $careers = $student->careers; //obtengo todos los registros que relacionan estudiante y carrera 
        $rut = Rut::set($student->rut)->fix()->format(); //usando libreria chileanbundle
        
        //dd($types); //funcionara para revisar los datos de la bd
        return view('admin.students.show',compact('student','rut','careers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /*$works = StudentorderBy('id','ASC')->get();
        $work=Studentfind($id);
        $students = Student::orderBy('id','ASC')->get();
        $academics = Academic::orderBy('id','ASC')->get();
        $types = Type::orderBy('id','ASC')->get();
        return view('admin.works.edit',compact('work','types','students','academics','works'));
        */
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WorkUpdateRequest $request, $id)
    {
        /*$work=Studentfind($id);
        $work->fill($request->all())->save();
        return  redirect()->route('works.index',$work->id)->with('info','Actividad de titulación actualizada correctamente');
        */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Student::find($id)->delete();
       return back()->with('info','Eliminado correctamente');
    }


}