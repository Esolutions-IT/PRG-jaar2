<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\App;
use Dompdf\Options;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        Permission::create(['name'=>'Student list']);
//        Role::create(['name'=>'Student']);

//        $role = Role::findbyId(2);

//        $permission = Permission::findById(1);

//        $role->givePermissionTo($permission);

//        auth()->user()->assignRole('Bestuur');

//        return auth()->user()->roles;

        $students = Student::all();
        $data = DB::table('users')
            ->join('classes','classes.user_id', '=', 'users.id')
            ->select('*')
            ->get();

        return view('student',['students'=>$students, 'data'=>$data, 'layout'=>'index']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::all();

        $data = DB::table('users')
            ->join('classes','classes.user_id', '=', 'users.id')
            ->select('*')
            ->get();

        return view('student',['students'=>$students, 'data'=>$data,'layout'=>'create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new Student();
        $student->studentnumber = $request->input('studentnumber');
        $student->first_name = $request->input('first_name');
        $student->last_name = $request->input('last_name');
        $student->age = $request->input('age');
        $student->save();

        return redirect('/home');
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
        $students = Student::all();

        return view('student',['students'=>$students,'student'=>$student, 'layout'=>'show']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        $students = Student::all();

        $data = DB::table('users')
            ->join('classes','classes.user_id', '=', 'users.id')
            ->select('*')
            ->get();

        return view('student',['students'=>$students,'student'=>$student, 'data' => $data, 'layout'=>'edit']);
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
        $student = Student::find($id);

        $student->studentnumber = $request->input('studentnumber');
        $student->first_name = $request->input('first_name');
        $student->last_name = $request->input('last_name');
        $student->age = $request->input('age');
        $student->status = $request->input('active');
        $student->save();

        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();

        return redirect('/home');
    }

    public function pdf($id)
    {
        $student = Student::find($id);
        $students = Student::all();

        $data = DB::table('students')
            ->join('vakken','vakken.student_id', '=', 'students.id')
            ->select('*')
            ->where('students.id', $id)
            ->get();

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML(view('student_pdf',['students'=>$students,'student'=>$student, 'data'=>$data, 'layout'=>'edit']));

//        $pdf->setOption('enable-javascript', true);
//        $pdf->setOption('images', true);
//        $pdf->setOption('javascript-delay', 13000); // page load is quick but even a high number doesn't help
//        $pdf->setOption('enable-smart-shrinking', true);
//        $pdf->setOption('no-stop-slow-scripts', true);

        return $pdf->stream();

//        return view('invoice';
    }

    public function studiegeld()
    {
        $students = Student::all();
        $data = DB::table('users')
            ->join('invoices','invoices.user_id', '=', 'users.id')
            ->select('*')
            ->get();

        return view('student',['students'=>$students, 'data'=>$data, 'layout'=>'studiegeld']);
    }

    public function pdf_invoice($id)
    {
        $student = Student::find($id);
        $students = Student::all();

        $data = DB::table('users')
            ->join('invoices','invoices.user_id', '=', 'users.id')
            ->select('*')
            ->where('invoices.invoice_id', $id)
            ->get();

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML(view('student_pdf_invoices',['students'=>$students,'student'=>$student, 'data'=>$data, 'layout'=>'edit']));

//        $pdf->setOption('enable-javascript', true);
//        $pdf->setOption('images', true);
//        $pdf->setOption('javascript-delay', 13000); // page load is quick but even a high number doesn't help
//        $pdf->setOption('enable-smart-shrinking', true);
//        $pdf->setOption('no-stop-slow-scripts', true);

        return $pdf->stream();

//        return view('invoice';
    }

    public function edit_data(Request $request)
    {
        $name = $request->input('first_name');
        $email = $request->input('email');
        $adres = $request->input('adres');
        $postcode = $request->input('postcode');
        $plaats = $request->input('plaats');

        $date = auth()->user()->created_at;
        $date = strtotime($date);
        $date = strtotime("+7 day", $date);
//        dd(date('M d, Y', $date));

        if(date('M d, Y') > date('M d, Y', $date)) {
            DB::table('users')->where('id', auth()->user()->id)->update(array(
                'name' => $name,
                'email' => $email,
                'adres' => $adres,
                'plaats' => $plaats,
                'postcode' => $postcode,
            ));
        }else{
            echo "<h1>Je account bestaat nog niet meer als 3 dagen. Als je account 3 dagen bestaat kun je je gegevens aanpassen.</h1>";
        }
        return redirect('/home');

    }

}
