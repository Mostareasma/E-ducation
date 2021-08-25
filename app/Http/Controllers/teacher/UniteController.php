<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Cour;
use App\Models\Unite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UniteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect(route('mescours.index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cours = Cour::where('teacher_id', Auth::user()->id)->get();
        return view('teacher.unites.create', compact('cours'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $unite = new Unite();
        $unite->cour_id = $request->cour_id;
        $unite->intitule = $request->intitule;
        $unite->description = $request->description;
        $unite->number = $request->number;
        $unite->save();
        return redirect(route('unites.show', $unite->cour_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unites =
            DB::select(
                'select * from unites where cour_id=:id',
                ['id' => $id]
            );
        return view('teacher.unites.index', compact('unites'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cours = Cour::where('teacher_id', Auth::user()->id)->get();
        $unite =
            DB::select(
                'select U.* , C.id , C.intitule as cours_intitule 
                from unites U , cours C where U.id = :id',
                ['id' => $id]
            );
        $unite = $unite[0];
        return view('teacher.unites.edit', compact('cours', 'unite'));
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
        $unite = Unite::where('id', $id)->get();
        $unite->cour_id = $request->cour_id;
        $unite->intitule = $request->intitule;
        $unite->description = $request->description;
        $unite->number = $request->number;
        $unite->save();
        return redirect(route('unites.show', $unite->cour_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo $id;
        $unite = Unite::where('id', $id)->first() ?? abort(404);

        $unite->delete();

        return redirect(route('unites.index'));
    }
}
