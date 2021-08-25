@extends('layouts.default')
@section('title', 'Dashboard')
@section('content')

    <div class="row align-items-center">
        <div class="col-md-12">
            <div class="shadow-sm p-3 mb-5 bg-body rounded-0">
                <h4 class="font-size-18">Tableau de bord</h4>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item active">Bienvenue, <b>{{Auth::user()->firstname}}</b></li>
                    <li class="breadcrumb-item active">Téléchargez vos cours et les exercices à faire.</li>
                </ol>
            </div>
        </div>
        @foreach ($cours as $cour)
            <div class="col-lg-4">
                <div class="p-3 shadow-sm p-3 mb-5 bg-body rounded-0">
                    <div class="row">
                        <div class="col-md-4"><img width="80%" class="m-auto" src="https://img.icons8.com/plasticine/100/000000/teacher.png"/></div>                
                        <div class="col-md-8">
                            <a class="text-decoration-none" href="{{route('studentCoursUnites.show',$cour->id)}}">
                                <h4>{{$cour->intitule}}</h4>
                            </a>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <p>{{$cour->description}}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection