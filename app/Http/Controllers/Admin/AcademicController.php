<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Work;
use App\Type;
use App\Student;
use App\Academic;
use App\Career;
use App\CareerStudent;
use App\Http\Requests\AcademicStoreRequest;
use App\Http\Requests\AcademicUpdateRequest;
use Freshwork\ChileanBundle\Rut;

class AcademicController extends Controller
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
        $academics = Academic::orderBy('id','DESC')->get();
        //dd($types); //funcionara para revisar los datos de la bd
        return view('admin.academics.index', compact('academics'));
    }

    /**
    *public function index2($quantity_careers,$academic)
    *{   
    *    $data['quantity_careers'] = $quantity_careers;
    *    return view('admin.academics.create2',$data,compact('academic'));
    *}
    */
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.academics.create');
    }

    public function create2(Request $request,$academic){
        return "hola bb";
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->name == null or $request->email == null or $request->rut == null){
            return redirect()->route('academics.create')->with('info','¡ No deje datos en blanco  !');
        }
      
        $academic = Academic::create( $request->all() );
        $rut = $academic->rut;

        $academic->rut = strval(Rut::parse($rut)->number()).strval(Rut::parse($rut)->vn());
        $academic->save();

        $userName=$request->name;
        $userEmail = $academic->email;
        $pw = $academic->rut;
        $pw = bcrypt($pw);

        DB::table('users')->insert(
            ['name'=>$userName, 'email' => $userEmail, 'password'=>$pw] //el rol es academico por default
          );
                   
        if (Rut::parse($rut)->quiet()->validate() == false ){//si la validacion es incorrecta borramos el estudiante
            $this->destroy($academic->id);
            return redirect()->route('academics.create')->with('info','¡ Rut mal ingresado, intente nuevamente !');
        }
        
        return redirect()->route('academics.index')->with('info','¡ Académico Creado Con exito -- Usuario : email ingresado , Contraseña: Rut sin puntos y sin guión !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $academic = Academic::find($id);
        $careers = $academic->careers; //obtengo todos los registros que relacionan estudiante y carrera 
        $rut = $academic->rut;

        $number = strVal(Rut::parse($rut)->number());
        $vn = strVal(Rut::parse($rut)->vn());

        $rutFormateado = Rut::set()->number($number)->vn($vn)->format();
        
        return view('admin.academics.show',compact('academic','rutFormateado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $academic =Academic::find($id);
        $rutconGuion = $academic->rut;
        $rutSinGuon=
        $number = strVal(Rut::parse($rutconGuion)->number());
        $vn = strVal(Rut::parse($rutconGuion)->vn());
        $rutSinGuion=$number.$vn;

        $rutFormateado = Rut::set()->number($number)->vn($vn)->format();
        return view('admin.academics.edit',compact('academic','id','rutFormateado','rutSinGuion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AcademicUpdateRequest $request, $id)
    {
        $academic=Academic::find($id);
        $rutAcademic = $academic->rut;
        $request->rut=$rutAcademic;
        $academic->fill($request->all())->save();

        return  redirect()->route('academics.index',$academic->id)->with('info',' Datos del Rut '.$rutAcademic.' actualizado');
        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Academic::find($id)->delete();
       return back()->with('info','Eliminado correctamente');
    }
}