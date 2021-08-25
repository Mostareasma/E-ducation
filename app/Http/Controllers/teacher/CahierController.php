<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cahier;
use Illuminate\Support\Facades\Auth;

class CahierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cahiers = Cahier::where('teacher_id', Auth::user()->id)->get();
        //dd($cahiers);
        return view('teacher.cahiers.index', compact('cahiers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.cahiers.create');
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'addMoreInputFields.*.classe_cahier' => 'required',
            'addMoreInputFields.*.cours_cahier' => 'required',
            'addMoreInputFields.*.date_cahier' => 'required',
            'addMoreInputFields.*.activite_cahier' => 'required',
            'addMoreInputFields.*.remarque_cahier' => 'required'
        ]);
        //dd($request->addMoreInputFields);
        foreach ($request->addMoreInputFields as $key) {
            $cahiers= new Cahier;
            $cahiers->teacher_id = Auth::user()->id;
            $cahiers->classe_cahier = $key["classe_cahier"];
            $cahiers->cours_cahier = $key["cours_cahier"];
            $cahiers->date_cahier = $key["date_cahier"];
            $cahiers->activite_cahier = $key["activite_cahier"];
            $cahiers->remarque_cahier = $key["remarque_cahier"];
            $cahiers->save();
            
        }
     
        return back()->with('success', 'New subject has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cahiers = Cahier::where('id', $id)->first;
        dd($cahiers);
        return view('teacher.cahiers.index');
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
        //
    }
}
