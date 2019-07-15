<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
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

class WorkAcademicsController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $works = Work::where('status','INGRESADA')->orderBy('id','DESC')->paginate();
        $students = Student::orderBy('id','ASC')->get();
        $academics = Academic::orderBy('id','ASC')->get();
        $types = Type::orderBy('id','ASC')->get();
        //dd($types); //funcionara para revisar los datos de la bd
        return view('admin.worksAcademics.index', compact('works','types','students','academics'));
    }
    public function show($id)
    {
        $work=Work::find($id);
        $types = Type::orderBy('id','ASC')->get();
        $students = Student::orderBy('id','ASC')->get();
        $academics = Academic::orderBy('id','ASC')->get();
        $type = Type::find($work->type_id);

        return view('admin.worksAcademics.show',compact('work','type','types','students','academics'));
    }
    public function edit($id)
    {
        $work=Work::find($id);
        $guides = $work->academics()->where('academic_role','GUIA')->get();

        $students = Student::orderBy('id','ASC')->get();
        $academics = Academic::orderBy('id','ASC')->whereNotIn('id',$guides->pluck('id')->toArray())->get();
        $types = Type::orderBy('id','ASC')->get();
        $type = Type::find($work->type_id);

        $max = $guides->count();
        if($type->req_external_org){
            $max += 1;
        }

        $max = 3 - $max;


        return view('admin.worksAcademics.edit',compact('types','type','work','guides','students','academics','max'));
    }
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $max = $request->max;



        $work=Work::find($id);
        $comisionId;
        for ($i=0; $i <$max ; $i++) {
            $comisionId[$i] = $request->all()['name'.$i];
        }

        //dd($comisionId);
        for ($i=0; $i <$max ; $i++) {
            if($comisionId != null){
            $work->academics()->attach($comisionId[$i], ['academic_role' => 'CORRECTOR']);
            }
        }
        $work->status = 'ACEPTADA';
        $work->save();
        
        return  redirect()->route('works.index')->with('info','Actividad de titulación autorizada correctamente');

    }
}
