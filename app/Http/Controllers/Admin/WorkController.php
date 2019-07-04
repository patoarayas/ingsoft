<?php
/*Controlador Administrar trabajos
*   Muestra todos los trabajos
*   Crear un trabajo
*   Muestra un trabajo en especifico
*
*
*
*/
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Work;
use App\Type;
use App\Student;
use App\Academic;
use App\Http\Requests\WorkStoreRequest;
use App\Http\Requests\WorkUpdateRequest;
class WorkController extends Controller
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
        $works = Work::orderBy('id','DESC')->paginate();
        $types = Type::orderBy('id','ASC')->get();
        $students = Student::orderBy('id','ASC')->get();
        $academics = Academic::orderBy('id','ASC')->get();
        //dd($types); //funcionara para revisar los datos de la bd
        return view('admin.works.index', compact('works','types','students','academics'));
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
        return view('admin.works.create',compact('types','works','students','academics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkStoreRequest $request)
    {
        /*
        //dd($request->all()); //ver #request , #studtens es un array que contiene la id de cada studiante seleccionado, lo mismo para academics
        $title = $request->title;
        //$status = 'INGRESADA';
        $start_date = $request->start_date;
        $finish_date =$request->finish_date;
        $name_ext_org=$request->name_ext_org;
        $tutor_ext_org=$request->tutor_ext_org;
        //$cant_students =count($request->students->get('array'));
        $cant_students = 1;
        $type_id = (int) $request->type_id;
//dd($type_id);

        $work = Work::create(['title'=>$title,
        'start_date'=>$start_date,
        'finish_date'=>$finish_date,
        'name_ext_org'=>$name_ext_org,
        'tutor_ext_org'=>$tutor_ext_org,
        'cant_students'=>$cant_students,
        'type_id'=>2]);
        */
        $work = Work::create($request->all());
        //$work->type_id()->associate($type_id);
        //$work->students()->attach($request->get('students'));
        //$work->academics()->attach($request->get('academics'));

        return redirect()->route('works.index',$work->id)->with('info','ACTIVIDAD DE TITULACIÓN CREADA CON EXITO');

        //return '';
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
        return view('admin.works.show',compact('work','types','students','academics'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $works = Work::orderBy('id','ASC')->get();
        $work=Work::find($id);
        $students = Student::orderBy('id','ASC')->get();
        $academics = Academic::orderBy('id','ASC')->get();
        $types = Type::orderBy('id','ASC')->get();
        return view('admin.works.edit',compact('work','types','students','academics','works'));
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
        $work=Work::find($id);
        $work->fill($request->all())->save();
        return  redirect()->route('works.index',$work->id)->with('info','Actividad de titulación actualizada correctamente');
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
        return view('admin.works.asignarComision',compact('work','academics'));
    }

    public function anular($id)
    {
        //NO funciona la ruta se usa edit de work1
        dd("hola");

        Work::find($id)->fill(array('status'=>'ANULADA'))->save();
        return  redirect()->route('works.index')->with('info','Actividad de titulación ANULADA correctamente');

    }
}
