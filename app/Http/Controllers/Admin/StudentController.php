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


    public function check($rut) {

        $cleanedRut = $this->clean($rut);

        if (! $cleanedRut)
            return false;

        list($numero, $digitoVerificador) = explode('-', $cleanedRut);

        //Validamos requisitos m?nimos
        if ((($digitoVerificador != 'K') && (! is_numeric($digitoVerificador))) || (count(str_split($numero)) > 11))
            return false;

        //Validamos que todos los caracteres del n?mero sean d?gitos
        foreach(str_split($numero) as $chr) {
            if (! is_numeric($chr))
                return false;
        }

        //Calculamos el digito verificador
        $digit = $this->digitoVerificador($numero);

        //Comparamos el digito verificador calculado con el entregado
        if($digit == $digitoVerificador)
            return true;

        return false;
    }

    public function clean($originalRut, $incluyeDigitoVerificador = true) {

        //Eliminamos espacios al principio y final
        $originalRut = trim($originalRut);
        //En caso de existir, eliminamos ceros ("0") a la izquierda
        $originalRut = ltrim($originalRut, '0');
        $input		= str_split($originalRut);
        $cleanedRut	= '';
        foreach ($input as $key => $chr) {
            //Digito Verificador
            if ((($key + 1) == count($input)) && ($incluyeDigitoVerificador)){
                if (is_numeric($chr) || ($chr == 'k') || ($chr == 'K'))
                    $cleanedRut .= '-'.strtoupper($chr);
                else
                    return false;
            }
            //N?meros del RUT
            elseif (is_numeric($chr))
                $cleanedRut .= $chr;
        }

        if (strlen($cleanedRut) < 3)
            return false;

        return $cleanedRut;
    }

    public function digitoVerificador($rut) {
        //Preparamos el RUT recibido
        $numero = $this->clean($rut, false);
        //Calculamos el d?gito verificador
        $txt		= array_reverse(str_split($numero));
        $sum		= 0;
        $factors	= array(2,3,4,5,6,7,2,3,4,5,6,7);
        foreach($txt as $key => $chr) {
            $sum += $chr * $factors[$key];
        }

        $a			= $sum % 11;
        $b			= 11-$a;

        if($b == 11)
            $digitoVerificador	= 0;
        elseif($b == 10)
            $digitoVerificador	= 'K';
        else
            $digitoVerificador = $b;
        //Convertimos el n?mero a cadena para efectos de poder comparar
        $digitoVerificador = (string)$digitoVerificador;
        return $digitoVerificador;
    }

}