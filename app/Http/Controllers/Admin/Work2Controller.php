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
class Work2Controller extends Controller
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
        $works = Work::where('status','ACEPTADA')->orderBy('id','DESC')->paginate();
        $types = Type::orderBy('id','ASC')->get();
        $students = Student::orderBy('id','ASC')->get();
        $academics = Academic::orderBy('id','ASC')->get();
        //dd($types); //funcionara para revisar los datos de la bd
        return view('admin.works2.index', compact('works','types','students','academics'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::orderBy('id','ASC')->get();
        $academics = Academic::orderBy('id','ASC')->get();
        $types = Type::orderBy('id','ASC')->get();
        $works = Work::orderBy('id','DESC')->paginate();
        return view('admin.works2.create',compact('types','works','students','academics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkStoreRequest $request)
    {
        // Cambios
        $students = Student::orderBy('id','ASC')->get();
        $academics = Academic::orderBy('id','ASC')->get();
        $types = Type::orderBy('id','ASC')->get();

        //Fin Cambios

        $work = Work::create($request->all());
        // Mas cambios
        dd($work);
        $type = Type::find($work->id_type);
        //Mas cambios
        return  redirect()->route('works2.index',$work->id)->with('info','Actividad de titulación creada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $work=Work::find($id);
        $types = Type::orderBy('id','ASC')->get();
        $students = Student::orderBy('id','ASC')->get();
        $academics = Academic::orderBy('id','ASC')->get();
        //dd($types); //funcionara para revisar los datos de la bd
        return view('admin.works2.show',compact('work','types','students','academics'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $work=Work::find($id);
        return view('admin.works2.edit',compact('work'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $work=Work::find($id);
        if($request->curricular_code <0){
            return  redirect()->route('works2.edit',$work->id)->with('info','El codigo acepta solo valores numericos.');
        }

        if($request->curricular_code==''){
            return  redirect()->route('works2.edit',$work->id)->with('info','El codigo no debe quedar vacío');
        }
        $work->curricular_code = strval($request->curricular_code);
        $work->save();
        //return back()->with('info','Código Curricular Añadido Correctamente');
        return  redirect()->route('works2.index',$work->id)->with('info','Actividad de titulación actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $work=Work::find($id)->delete();
       return back()->with('info','Eliminado correctamente');
    }

    public function asignarComision($id){
        $work=Work::find($id);
        $academics = Academic::orderBy('id','ASC')->get();
        return view('admin.works2.asignarComision',compact('work','academics'));
    }

}