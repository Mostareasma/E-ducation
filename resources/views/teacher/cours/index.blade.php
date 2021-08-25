@extends('layouts.default')
@section('title', 'Mes Classes')
@section('mainCSS')
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="teacher/css/addCours.css">
    <link rel="stylesheet" type="text/css" href="teacher/css/style-rows.css"> <!--STYLE DES CLASSES-->
@endsection
@section('content')
    <div class="shadow mb-5 bg-transparent rounded"><h1 class="text-center lh-lg"><i class="fad fa-users-class pe-2"></i>MES CLASSES</h1></div>
                <!--COURS DISPLAY-->
                <div class="cours-rows">
                    <!--LISTE COURS-->
                    <div id="service" class="Classes">
                    <div class="row">
                    @foreach ($cours as $cour)
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-5">
                        <div class="Classes-box">
                            <i class="bg-transparent"><img src="https://img.icons8.com/nolan/96/google-classroom.png"/></i>
                            <h3><a href="{{route('unites.show',$cour->id)}}" id="classes-names">{{$cour->intitule}}</a></h3>
                            <p class="text-dark">{{$cour->description}}</p>
                        </div>
                    </div>
                @endforeach   
                </div>
                </div>
                <!-- end LISTE COURS -->
@endsection


