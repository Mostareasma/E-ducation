<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Scenario;


class ScenarioController extends Controller
{
    public function index()
    {
        return view('teacher.scenario.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'addMoreInputFields.*.orga_temps' => 'required',
            'addMoreInputFields.*.act_prof' => 'required',
            'addMoreInputFields.*.act_eleve' => 'required',
            'addMoreInputFields.*.mot_cle' => 'required'
        ]);

        foreach ($request->addMoreInputFields as $key => $value) {
            Scenario::create($value);
        }

        return back()->with('success', 'New subject has been added.');
    }
    public function destroy($id)
    {

        $scenario = Scenario::where('fiche_id', $id);

        $scenario->delete();

        return response()->json('done');
    }
}
