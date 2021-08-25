@extends('layouts.default')
@section('title', 'Espace didactique')
@section('content')
    <div class="shadow mb-5 bg-transparent rounded"><h1 class="text-center lh-lg"><i class="fas fa-file-alt pe-2"></i>MES FICHES PEDAGOGIQUES</h1></div>
        <div class="d-flex justify-content-end mt-5">
            <button type="button" class="btn btn-primary btn-md rounded-pill border-0 bg-base-3 "><a class="text-white" href="{{route('fiches.edit' , $fiche->id)}}"><i class="bi bi-pencil-square me-3"></i>Modifier</a></button>
        </div>
        <div class="d-flex justify-content-center mx-5">
        <table class="table table-bordered lh-lg mt-5 bg-white">
            <thead> 
                <th  scope="col" class="col col-sm-1 fs-6 fw-bolder text-white bg-fiche">Date :</td>
                
                <td class="col col-sm-2 fs-6">{{ $fiche->created_at }}</td>
                <th  scope="col" class="col col-sm-1 fs-6 fw-bolder text-white bg-fiche">Durée :</td>
                <td class="col col-sm-2 fs-6">{{ $fiche->duree_fiche }}</td> 
            </thead>
            <tbody>
                <tr>
                    <th  scope="row" class="col col-sm-1 fs-6 fw-bolder text-white bg-fiche">Classe :</td>
                    <td class="col col-sm-2 fs-6">{{ $fiche->classe_fiche }}</td>
                    <th  scope="row" class="col col-sm-1 fs-6 fw-bolder text-white bg-fiche">Matière :</td> 
                    <td class="col col-sm-2 fs-6">{{ $fiche->matiere_fiche }}</td> 
                </tr>
                <tr>
                    <th  scope="row" class="col col-sm-1 fs-6 fw-bolder text-white bg-fiche">Nom du module :</td>
                    <td class="col col-sm-2 fs-6">{{ $fiche->nom_module }}</td>
                    <th  scope="row" class="col col-sm-1 fs-6 fw-bolder text-white bg-fiche">Nom de la leçon :</td>
                    <td class="col col-sm-2 fs-6">{{ $fiche->nom_lecon }}</td> 
                </tr>
                <tr>
                    <th  scope="row" class="col col-sm-1 fs-6 fw-bolder text-white bg-fiche">Nombre d'élèves :</td>
                    <td class="col col-sm-2 fs-6">{{ $fiche->nb_eleves }}</td>
                    <th  scope="row" class="col col-sm-1 fs-6 fw-bolder text-white bg-fiche">Outils didactiques :</td>
                    <td class="col col-sm-2 fs-6">{{ $fiche->outils_didactiques }}</td> 
                </tr>
                <tr>
                    <th  scope="row" class="col col-sm-1 fs-6 fw-bolder text-white bg-fiche">Objectifs pédagogiques :</td>
                    <td colspan="3" class="col col-sm-2 fs-6">{{ $fiche->obj_pedag }}</td>
                </tr>
                <tr>
                    <th  scope="row" class="col col-sm-1 fs-6 fw-bolder text-white bg-fiche">Objectifs spécifiques :</td>
                    <td class="col col-sm-2 fs-6" colspan="3">{{ $fiche->obj_spec }}</td>
                </tr>
                <tr>
                    <th  scope="row" class="col col-sm-1 fs-6 fw-bolder text-white bg-fiche">Compétences à construire :</td>
                    <td class="col col-sm-2 fs-6" colspan="3">{{ $fiche->competence }}</td>
                </tr>
                <tr>
                    <th  scope="row" class="col col-sm-1 fs-6 fw-bolder text-white bg-fiche">Pré-requis :</td>
                    <td class="col col-sm-2 fs-6" colspan="3">{{ $fiche->requis_fiche }}</td>
                </tr>
                <tr>
                    <th  scope="row" class="col col-sm-1 fs-6 fw-bolder text-white bg-fiche">Organisation du contenu </td>
                    <td class="col col-sm-2 fs-6" colspan="3">{{ $fiche->contenu_fiche }}</td>
                </tr>
            </tbody>
            
        </table>
        </div><!--TABLE 1-->
        <h2 class="text-center my-5 fs-3">SCENARIO PEDAGOGIQUES:<br/>Déroulement de la séquence pédagogique devant l'élève</h2>
        <div class="d-flex justify-content-center mx-5 my-5">
        <table class="table table-bordered table-striped table-hover bg-white">
            <thead class="table-dark text-center align-middle">
                <td class="fs-6 fw-bolder text-white bg-fiche">Organisation du temps</td>
                <td class="fs-6 fw-bolder text-white bg-fiche">Activité du professeur</td>
                <td class="fs-6 fw-bolder text-white bg-fiche">Activité de l'élève</td>
                <td class="fs-6 fw-bolder text-white bg-fiche">Supports utilisés</br>Mots clés</td>
            </thead>
            <tbody>
            @foreach($fiche->scenarios as $scenario)
                <tr>
                    <td class="fs-6">{{ $scenario->orga_temps }}</td>
                    <td class="fs-6">{{ $scenario->act_prof }}</td>
                    <td class="fs-6">{{ $scenario->act_eleve }}</td>
                    <td class="fs-6">{{ $scenario->mot_cle }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div><!---TABLE 2-->
        <div class="d-flex justify-content-center mx-5 my-5">
        <table class="table table-bordered lh-lg mt-5 bg-white">
            <tr>
                <th  scope="row" class="col col-sm-1 fs-6 fw-bolder text-white bg-fiche">Evaluation :</td>
                <td colspan="3" class="col col-sm-5 fs-6">{{ $fiche->evaluation}}</td>
            </tr>
        </table>
        </div><!---TABLE 3-->
@endsection