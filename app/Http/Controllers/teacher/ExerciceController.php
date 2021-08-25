<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Exercice;
use Illuminate\Http\Request;

class ExerciceController extends Controller
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
        return view('teacher.exercices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fileName = time() . '_' . $request->support->getClientOriginalName();
        $filePath = $request->file('support')->storeAs('support_exercice', $fileName, 'public');
        $exercice = new Exercice();
        $exercice->support_pth = '/storage/' . $filePath;
        $exercice->title = $request->title;
        $exercice->note = $request->note;
        $exercice->unite_id = $request->unite_id;
        $exercice->save();
        return redirect(route('exercices.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exercices = Exercice::where('unite_id', $id)->get();
        return view('teacher.exercices.index', compact('exercices', 'id'));
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
        //
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
        $exercice = Exercice::where('id', $id)->first() ?? abort(404);

        $exercice->delete();

        return redirect(route('exercices.index'));
    }
}
