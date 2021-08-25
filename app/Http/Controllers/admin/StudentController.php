<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        $students =
            DB::select(
                'select * from  users U , classes C ,students  S where S.user_id = U.id and S.admin_id =:id and C.id= S.classe_id',
                ['id' => Auth::user()->id]
            );
        return view('admin.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Classe::where('admin_id', Auth::user()->id)->get();
        return view('admin.students.create', compact("classes"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = \App\Models\Role::where('name', 'student')->first();
        $user = new User();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->phoneNumber = $request->phoneNumber;
        $user->password = Hash::make($request->CNE);
        $user->role_id = $role->id;
        $user->save();

        $student = new Student();
        $student->user_id = $user->id;
        $student->admin_id = Auth::user()->id;
        $student->CNE = $request->CNE;
        $student->classe_id = $request->classe;
        $student->birthday = $request->birthday;
        $student->Addres = $request->Addres;
        $student->save();
        return redirect(route('students.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = DB::select(
            'select * from users U , classes C ,students  S  where S.user_id = U.id  and C.id= S.classe_id and S.id=:id',
            ['id' => $id]
        )
            ?? abort(404);
        $classes = Classe::where('admin_id', Auth::user()->id)->get();
        $student = $student[0];
        return view('admin.students.edit', compact('student', 'classes'));
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
        $student = Student::where('id', $id)->first();
        $user = User::where('id', $student->first()->user_id)->first();

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->phoneNumber = $request->phoneNumber;
        $user->save();


        $student->CNE = $request->CNE;
        $student->classe_id = $request->classe;
        $student->birthday = $request->birthday;
        $student->Addres = $request->Addres;
        $student->save();
        return redirect(route('students.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id', $id)->first() ?? abort(404);

        $user->delete();

        return redirect(route('students.index'));
    }
}
