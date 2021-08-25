@extends('layouts.default')
@section('title', 'Tableau de board')
@section('mainCSS')
    <link rel="stylesheet" type="text/css" href="teacher/css/index-prof.css">  
    <link rel="stylesheet" type="text/css" href="teacher/css/features.css"> 
@endsection

@section('content')
    <h1 class="px-3 py-4">Bienvenue, <b>{{Auth::user()->firstname}}</b> .</h1>
                
    <div class="container py-4" id="hanging-icons">
        <h2 class="pb-2 border-bottom">Consultez vos :</h2>
        <div class="row g-5 py-5">
            <div class="col-md-4 d-flex align-items-start">
            <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                <svg class="bi" width="1em" height="1em" id=""><img src="teacher/img/cours.png"><use xlink:href="#toggles2"/></svg>
            </div>
            <div>
                <h2>Classes</h2>
                <p class="pt-2">
                    Gérez facilement vos classes, ajoutez les cours et les exercices à communiquer à vos élèves.
                </p>
                <button type="button" class="rounded-0 btn  btn-dark bg-base border-0"><i class="fas fa-school" id="tools"></i><a class="text-white" href="{{route('mescours.index')}}"> Voir plus</a></button>
            </div>
            </div>
            <div class="col-md-4 d-flex align-items-start">
            <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                <svg class="bi" width="1em" height="1em" id="cours"><img src="teacher/img/cours1.png"/><use xlink:href="#cpu-fill"/></svg>
            </div>
            <div>
                <h2>Cahier de texte</h2>
                <p class="pt-2">
                    A la fin de chaque séance, inscrivez les activités et les remarques de chaque classe.  
                </p>
                <button type="button" class="rounded-0 btn  btn-dark bg-base border-0"><i class="fas fa-book" id="tools"></i> <a class="text-white" href="{{route('cahiers.index')}}"> Voir plus</a></button>
            </div>
            </div>
            <div class="col-md-4 d-flex align-items-start">
            <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                <svg class="bi" width="1em" height="1em" id="outils"><img src="teacher/img/cours2.png"><use xlink:href="#tools"/></svg>
            </div>
            <div>
                <h2>Outils pédagogiques</h2>
                <p class="pt-2">
                    Remplissez vos fiches pédagogiques et gardez les dans cet espace.
                </p>
                <button type="button" class="rounded-0 btn  btn-dark bg-base border-0"><i class="fas fa-cog" id="tools"></i><a class="text-white" href="{{route('fiches.index')}}"> Voir plus</a></button>
            </div>
            </div>
        </div>
    </div>

@endsection