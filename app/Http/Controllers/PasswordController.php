<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Echo_;

class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
        if ($request->NewPassword == $request->ConfirmNewPassword) {
            if (strlen($request->NewPassword) > 8) {
                $user = User::where('id', Auth::user()->id)->first();
                if (Hash::check($request->password, $user->password)) {
                    $hashed = Hash::make($request->NewPassword, [
                        'memory' => 1024,
                        'time' => 2,
                        'threads' => 2,
                    ]);
                    echo "done";
                    $user->password = $hashed;
                    $user->save();
                    return back()
                        ->with('successPassword', "Le mot de passe a été bien modifier");
                } else {
                    return back()
                        ->with('FalsePassword', "Mot de passe incorrect");
                }
            } else {
                return back()
                    ->with('ShortPassword', "Mot de passe trop court");
            }
        } else {
            return back()
                ->with('PasswordsDifferent', "Les deux mots de passe ne sont pas identiques");
        }
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
