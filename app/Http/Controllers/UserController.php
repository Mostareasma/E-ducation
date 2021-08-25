<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Student;
use App\Models\Teacher;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        switch (Auth::user()->getrole()) {
            case 'admin':
                $user = Admin::where('user_id', Auth::user()->id)->with('user')->first();
                $role = Auth::user()->getrole();
                break;
            case 'student':
                $user = Student::where('user_id', Auth::user()->id)->with('classe')->with('user')->first();
                $role = Auth::user()->getrole();
                break;
            case 'teacher':
                $user = Teacher::where('user_id', Auth::user()->id)->with('user')->first();
                $role = Auth::user()->getrole();
                //dd($role);
                break;
        }
        if (!$user->profile_photo_path) {
            $user->profile_photo_path = '/storage/profile-photos/icons8-portrait-96.png';
        };
        return view('userProfile.edit', compact('user', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $user = User::where('id', Auth::user()->id)->first();
        $user->email = $request->email;


        $request->validate([
            'file' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $fileName = time() . '_' . $request->file->getClientOriginalName();
        $filePath = $request->file('file')->storeAs('photo_profile', $fileName, 'public');

        $user->profile_photo_path = '/storage/' . $filePath;
        //dd($user);
        $user->save();

        return back()
            ->with('success', "Vos informations ont été bien modifiés.")
            ->with('file', $fileName);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
