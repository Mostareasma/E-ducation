<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Cour;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cours =
            DB::select(
                'select * from users U , classes CL, cours C  where CL.id=C.classe_id and C.teacher_id = u.id and C.admin_id =:id',
                ['id' => Auth::user()->id]
            );

        return view('admin.cours.index', compact('cours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Classe::where('admin_id', Auth::user()->id)->get();
        $teachers =
            DB::select(
                'select * from teachers  T , users U where T.user_id = U.id and T.admin_id =:id',
                ['id' => Auth::user()->id]
            );
        return view('admin.cours.create', compact("classes", "teachers"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cours = new Cour();
        $cours->admin_id = Auth::user()->id;
        $cours->teacher_id = $request->teacher;
        $cours->classe_id = $request->classe;
        $cours->intitule = $request->intitule;
        $cours->description = $request->description;
        $cours->save();
        return redirect(route('cours.index'));
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
        $classes = Classe::where('admin_id', Auth::user()->id)->get();
        $teachers =
            DB::select(
                'select * from teachers  T , users U where T.user_id = U.id and T.admin_id =:id',
                ['id' => Auth::user()->id]
            );
        $cour =
            DB::select(
                'select C.* , U.lastname , U.firstname , CL.untitule FROM users U , cours C , classes CL WHERE U.id=C.teacher_id and CL.id=C.classe_id and C.id =:id',
                ['id' => $id]
            );
        $cour = $cour[0];
        return view('admin.cours.edit', compact("classes", "teachers", 'cour'));
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
        $cour = Cour::where('id', $id)->first() ?? abort(404);
        $cour->teacher_id = $request->teacher;
        $cour->classe_id = $request->classe;
        $cour->intitule = $request->intitule;
        $cour->description = $request->description;
        $cour->save();

        return redirect(route('cours.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cour = Cour::where('id', $id)->first() ?? abort(404);

        $cour->delete();

        return redirect(route('classes.index'));
    }
}
