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
/*
    public function index2($quantity_careers,$student)
    {
        $data['quantity_careers'] = $quantity_careers;
        return view('admin.students.create2',$data,compact('student'));
    }
    */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.students.create');
    }

    /* ELIMINAR ?
    public function create2(Request $request,$student){
        return "hola bb";
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentStoreRequest $request)
    {

        if($request->name == null or $request->email == null or $request->rut == null){
            return redirect()->route('students.create')->with('info','¡ No deje datos en blanco  !');
        }

        $career1 = $request->career1; //cada checkbox y lo comparo con cada carrera, si el checkbox no esta sleccionado sera vacio
        $career2 = $request->career2;
        $career3 = $request->career3;
        $career4 = $request->career4;

        if($career1 =="" and $career2 =="" and $career3 =="" and $career4 ==""){
            return redirect()->route('students.create')->with('info','¡ Debe seleccionar al menos 1 carrera !');
        }

        $student = Student::create($request->all() );
        $rut = $student->rut;

        $student->rut = strval(Rut::parse($rut)->number()).strval(Rut::parse($rut)->vn());
        $student->save();


        if (Rut::parse($rut)->quiet()->validate() == false ){//si la validacion es incorrecta borramos el estudiante
            $this->destroy($student->id);
            return redirect()->route('students.create')->with('info','¡ Rut mal ingresado, intente nuevamente !');
        }



        if($career1 == "Ingeniería en Computación e Informática"){
            $student->careers()->attach(1);
        }
        if($career2 == "Ingeniería Ejecución en Computación e Informática"){
            $student->careers()->attach(2);
        }

        if ($career3 == "Ingeniería Civil en Computación e Informática (Malla-Nueva)"){
            $student->careers()->attach(3);
        }

        if ($career4 == "Ingeniería Civil en Computación e Informática (Malla-Antigua)"){
            $student->careers()->attach(4);
        }


        return redirect()->route('students.index')->with('info','¡ Alumno Creado Con exito !');
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
        $student =Student::find($id);
        $rutconGuion = $student->rut;
        $rutSinGuon=
        $number = strVal(Rut::parse($rutconGuion)->number());
        $vn = strVal(Rut::parse($rutconGuion)->vn());
        $rutSinGuion=$number.$vn;

        $rutFormateado = Rut::set()->number($number)->vn($vn)->format();
        return view('admin.students.edit',compact('student','id','rutFormateado','rutSinGuion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentUpdateRequest $request, $id)
    {
        $student=Student::find($id);
        $rutStudent = $student->rut;
        $request->rut=$rutStudent;
        $student->careers()->detach(1);
        $student->careers()->detach(2);
        $student->careers()->detach(3);
        $student->careers()->detach(4);//quitamos las relaciones viejas y para poner las nuevas
        $student->fill($request->all())->save();


        $career1 = $request->career1; //cada checkbox y lo comparo con cada carrera, si el checkbox no esta sleccionado sera vacio
        $career2 = $request->career2;
        $career3 = $request->career3;
        $career4 = $request->career4;

        if($career1 =="" and $career2 =="" and $career3 =="" and $career4 ==""){
            return redirect()->route('students.edit',$id)->with('info','¡ Debe seleccionar al menos 1 carrera !');
        }

        if($career1 == "Ingeniería en Computación e Informática"){
            $student->careers()->attach(1);
        }
        if($career2 == "Ingeniería Ejecución en Computación e Informática"){
            $student->careers()->attach(2);
        }

        if ($career3 == "Ingeniería Civil en Computación e Informática (Malla-Nueva)"){
            $student->careers()->attach(3);
        }

        if ($career4 == "Ingeniería Civil en Computación e Informática (Malla-Antigua)"){
            $student->careers()->attach(4);
        }
        return  redirect()->route('students.index',$student->id)->with('info',' Datos del Rut '.$rutStudent.' actualizado');

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
