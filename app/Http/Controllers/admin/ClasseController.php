<?php

namespace App\Http\Controllers\admin;

use App\Models\Classe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Classe::where('admin_id', Auth::user()->id)->get();

        return view('admin.classes.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.classes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $class = new Classe();
        $class->untitule = $request->untitule;
        $class->filiere = $request->filire;
        $class->niveau = $request->niveau;
        $class->group = $request->groupe;
        $class->admin_id = Auth::user()->id;
        $class->save();

        return redirect(route('classes.index'));
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
        $classe = Classe::where('id', $id)->first() ?? abort(404);

        return view('admin.classes.edit', compact('classe'));
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
        $class = Classe::where('id', $id)->first() ?? abort(404);
        $class->untitule = $request->untitule;
        $class->filiere = $request->filire;
        $class->niveau = $request->niveau;
        $class->group = $request->groupe;
        $class->admin_id = Auth::user()->id;
        $class->save();

        return redirect(route('classes.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $classe = Classe::where('id', $id)->first() ?? abort(404);

        $classe->delete();

        return redirect(route('classes.index'));
    }
}
