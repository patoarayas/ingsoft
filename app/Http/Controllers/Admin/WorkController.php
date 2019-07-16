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
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Work;
use App\Type;
use App\Student;
use App\Academic;
use App\AcademicWork;
use App\Http\Requests\WorkStoreRequest;
use App\Http\Requests\WorkUpdateRequest;
use Carbon\Carbon;
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

        //dd($request);
        $title = $request->title;
        $status = 'INGRESADA';
        $start_date=$request->start_date;
        $finish_date=$request->finish_date;
        $name_ext_org=$request->name_ext_org;
        $tutor_ext_org=$request->tutor_ext_org;
        $cant_students = sizeof($request->students);
        $semester_reg = '';
        $academics =$request->academics;
        $students = $request->students;
        $type_id = $request->type_id;


        $list = Carbon::parse($start_date);
        $month =$list->month;
        $year = $list->year;
        $day = $list->day;

        $list2 =Carbon::parse($finish_date);
        $month2 =$list2->month;
        $year2 = $list2->year;
        $day2 = $list2->day;

        if($year2<$year){
            return redirect()->route('works.create')->with('info','¡ Año de termino menor que Año de inicio !');
        }

        else{
            if(($month2<$month) and ($year2 == $year) ){
                return redirect()->route('works.create')->with('info','¡ Mes de termino menor que Mes de inicio !');
            }
            else{
                if(($day2<$day) and($month2==$month) ){
                    return redirect()->route('works.create')->with('info','¡ Dia de termino menor que Dia de inicio !');
                }
            }
        }

        if($month <7){
            $semester_reg='PRIMERO';
        }
        else{
            $semester_reg='SEGUNDO';
        }

        if(sizeof($students)==0){
            return redirect()->route('works.create')->with('info','¡ Debe seleccionar al menos 1 estudiante !');
        }
        //dd($students);
        if(sizeof($academics)==0){
            return redirect()->route('works.create')->with('info','¡ Debe seleccionar al menos 1 academico como profesor guia !');
        }

        $work = Work::create(['title'=>$title,'status'=>$status,'start_date'=>$start_date,'finish_date'=>$finish_date,'name_ext_org'=>$name_ext_org,'tutor_ext_org'=>$tutor_ext_org,'cant_students'=>$cant_students,'year'=>$year,'semester_reg'=>$semester_reg,'type_id'=>$type_id]);



        foreach($academics as $academic){
            $work->academics()->attach($academic);
            $name_academic = Academic::find($academic)->get('name');

            DB::table('academic_work')->where('work_id',$work->id)->update(['academic_role'=>'GUIA']);
            $work->save();
        }
        $students = $request->students;
        foreach($students as $id){
            $student =Student::find($id);
            $student->work_id = $work->id;
            $student->save();
        }

        return redirect()->route('works.index')->with('info','Actividad Creada Con Éxito');


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
        $types=DB::table('types')->where('id',$work->type_id)->get('activity_name');
        $academics= $work->academics();
        $students = DB::table('students')->where('work_id',$id)->get('name');
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
        $type = Type::find($work->type_id);

        $guides = $work->academics()->get();
        //dd($guides[3]->pivot->academic_role);


        return view('admin.works.edit',compact('work','type','types','students','academics','works','guides'));
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
        //dd($request->all());
        $work=Work::find($id);
        $type = Type::find($work->type_id);

        $cantGuias = 0;
        $cantMiembros = 0;
        for ($i=0; $i < 3 -$type->req_external_org ; $i++) {
            if($request->name[$i] != null){
                $cantMiembros++;
            }
            if($request->role[$i] == 'GUIA'){
                $cantGuias++;
            }
        }
        if($cantGuias == 0){
            return  redirect()->route('works.edit',$work->id)->with('info','¡Debe ingresar al menos 1 profesor guia!');
        }
        if($cantMiembros == 0){
            return  redirect()->route('works.edit',$work->id)->with('info','¡Debe ingresar al menos 1 profesor guia!');
        }


        //Comision CORRECTORA
        $work->academics()->detach();
        for ($i=0; $i < 3 -$type->req_external_org ; $i++) {
            $work->academics()->attach($request->name[$i], ['academic_role' => $request->role[$i]]);
        }

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
