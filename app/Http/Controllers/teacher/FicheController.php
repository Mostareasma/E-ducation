<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fiche;
use App\Models\Scenario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FicheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fiches = Fiche::where('teacher_id', Auth::user()->id)->get();
        return view('teacher.fiches.index', compact('fiches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.fiches.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $ficheModel = new Fiche;

        $ficheModel->teacher_id = Auth::user()->id;
        $ficheModel->titre_fiche = $request->input('titre_fiche');
        $ficheModel->duree_fiche = $request->input('duree_fiche');
        $ficheModel->classe_fiche = $request->input('classe_fiche');
        $ficheModel->matiere_fiche = $request->input('matiere_fiche');
        $ficheModel->nom_module = $request->input('nom_module');
        $ficheModel->nom_lecon = $request->input('nom_lecon');
        $ficheModel->nb_eleves = $request->input('nb_eleves');
        $ficheModel->outils_didactiques = $request->input('outils_didactiques');
        $ficheModel->obj_pedag = $request->input('obj_pedag');
        $ficheModel->obj_spec = $request->input('obj_spec');
        $ficheModel->competence = $request->input('competence');
        $ficheModel->requis_fiche = $request->input('requis_fiche');
        $ficheModel->contenu_fiche = $request->input('contenu_fiche');
        $ficheModel->evaluation = $request->input('evaluation');

        $ficheModel->save();


        foreach ($request->addMoreInputFields as $key) {
            $scenario = new Scenario;
            $scenario->fiche_id = $ficheModel->id;
            $scenario->orga_temps = $key["orga_temps"];
            $scenario->act_prof = $key["act_prof"];
            $scenario->act_eleve = $key["act_eleve"];
            $scenario->mot_cle = $key["mot_cle"];
            $scenario->save();
        }
        return redirect(route('fiches.index'))
        ->with('success', "Fiche ajoutée avec succès.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fiche = Fiche::where('id', $id)->with('scenarios')->first();
        //dd($fiches->scenarios);
        return view('teacher.fiches.details', compact('fiche'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$fiches = Fiche::where('teacher_id', Auth::user()->id)->get();
        // $fiche =
        //     DB::select(
        //         'select *  from fiches where id = :id',
        //         ['id' => $id]
        //     );
        $fiche = Fiche::where('id', $id)->with('scenarios')->first();
        //$fiche = $fiche[0];
        return view('teacher.fiches.edit', compact('fiche'));
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
        //dd($request->addMoreInputFields);

        $fiche = Fiche::where('id', $id)->first();

        $fiche->titre_fiche = $request->input('titre_fiche');
        $fiche->duree_fiche = $request->input('duree_fiche');
        $fiche->classe_fiche = $request->input('classe_fiche');
        $fiche->matiere_fiche = $request->input('matiere_fiche');
        $fiche->nom_module = $request->input('nom_module');
        $fiche->nom_lecon = $request->input('nom_lecon');
        $fiche->nb_eleves = $request->input('nb_eleves');
        $fiche->outils_didactiques = $request->input('outils_didactiques');
        $fiche->obj_pedag = $request->input('obj_pedag');
        $fiche->obj_spec = $request->input('obj_spec');
        $fiche->competence = $request->input('competence');
        $fiche->requis_fiche = $request->input('requis_fiche');
        $fiche->contenu_fiche = $request->input('contenu_fiche');
        $fiche->evaluation = $request->input('evaluation');

        $fiche->save();

        foreach ($request->addMoreInputFields as $key) {
            $scenario = new Scenario;
            $scenario->fiche_id = $fiche->id;
            $scenario->orga_temps = $key["orga_temps"];
            $scenario->act_prof = $key["act_prof"];
            $scenario->act_eleve = $key["act_eleve"];
            $scenario->mot_cle = $key["mot_cle"];
            $scenario->save();
        }
        return redirect(route('fiches.index'))
        ->with('success', "La fiche a été été bien modifiée."); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fiche = Fiche::where('id', $id)->first() ?? abort(404);

        $fiche->delete();

        return redirect(route('fiches.index'))
        ->with('success', "Fiche Supprimée.");
    }
}
