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
    {   
        $students = Student::orderBy('id','DESC')->get();
        //dd($types); //funcionara para revisar los datos de la bd
        return view('admin.students.index', compact('students'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentStoreRequest $request)
    {
        $student = Student::create( $request->all() );
        $rut = $student->rut;

        $student->rut = strval(Rut::parse($rut)->number()).strval(Rut::parse($rut)->vn());
        $student->save();
       
        
        
        if (Rut::parse($rut)->quiet()->validate() == false ){//si la validacion es incorrecta borramos el estudiante
            $this->destroy($student->id);
            return redirect()->route('students.create')->with('info','¡ Rut mal ingresado, intente nuevamente !');
        }
        
        $career = $student->career;
        echo $career;
        if($career == "Ingeniería en Computación e Informática"){
            $student->careers()->attach(1);
        }
        if($career == "Ingeniería Ejecución en Computación e Informática"){
            $student->careers()->attach(2);
        }

        if ($career == "Ingeniería Civil en Computación e Informática (Malla-Nueva)"){
            $student->careers()->attach(3);
        }

        if ($career == "Ingeniería Civil en Computación e Informática (Malla-Antigua)"){
            $student->careers()->attach(4);
        }
        

        return redirect()->route('students.index',$student->id)->with('info','Estudiante creado con éxito');
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
        $rut = $student->rut;

        $number = strVal(Rut::parse($rut)->number());
        $vn = strVal(Rut::parse($rut)->vn());

        $rutFormateado = Rut::set()->number($number)->vn($vn)->format();
        
        return view('admin.students.show',compact('student','rutFormateado','careers'));
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