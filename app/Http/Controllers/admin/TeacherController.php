<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $teachers =
            DB::select(
                'select * from users U ,teachers  T where T.user_id = U.id and T.admin_id =:id',
                ['id' => Auth::user()->id]
            );
        return view('admin.teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = \App\Models\Role::where('name', 'teacher')->first();
        $user = new User();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->phoneNumber = $request->phoneNumber;
        $user->password = Hash::make($request->CIN);
        $user->role_id = $role->id;
        $user->save();

        $teacher = new Teacher();
        $teacher->user_id = $user->id;
        $teacher->admin_id = Auth::user()->id;
        $teacher->CIN = $request->CIN;
        $teacher->Specialty = $request->specialty;
        $teacher->birthday = $request->birthday;
        $teacher->Addres = $request->Addres;
        $teacher->save();
        return redirect(route('teachers.index'))
        ->with('success', "Enseignant bien ajouté.");
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
        $teacher = DB::select(
            'select * from users U ,teachers  T where T.user_id = U.id and T.id =:id',
            ['id' => $id]
        )
            ?? abort(404);
        $teacher = $teacher[0];
        return view('admin.teachers.edit', compact('teacher'));
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
        $teacher = Teacher::where('id', $id)->first() ?? abort(404);
        $user = User::where('id', $teacher->user_id)->first();

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->phoneNumber = $request->phoneNumber;
        $user->save();


        $teacher->CIN = $request->CIN;
        $teacher->Specialty = $request->specialty;
        $teacher->birthday = $request->birthday;
        $teacher->Addres = $request->Addres;
        $teacher->save();
        return redirect(route('teachers.index'));
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

        return redirect(route('teachers.index'));
    }
}
