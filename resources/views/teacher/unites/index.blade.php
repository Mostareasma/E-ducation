@extends('layouts.default')
@section('title', '| Unités de cours')
@section('mainCSS')
    <link rel="stylesheet" type="text/css" href="teacher/css/unite.css">
@endsection
@section('content')
    <div class="container">
        <div class="shadow mb-5 bg-transparent rounded"><h1 class="text-center lh-lg"><i class="fad fa-books pe-2"></i>Unités</h1></div>
        <div class="d-flex justify-content-end mt-5mr-0 ml-auto">
            <button type="button" class="btn btn-primary btn-md rounded-pill border-0 bg-base-3">
                <a class="text-white" href="{{route('unites.create')}}"><i class="fas fa-plus-circle me-3"></i>Nouvelle unité</a></button>
        </div> 
        <div class="row">
            @foreach ($unites as $unite)
                <div class="col-md-4 my-2">
                    <div class="card" style="width: 18rem;">
                        <img src="https://img.icons8.com/plasticine/100/000000/school.png" class="card-img-top" alt="..."/>
                        <div class="d-flex justify-content-between card-header">
                            <div class="col-md-9">
                                <p class="card-title">
                                Unité {{$unite->number}} : {{$unite->intitule}} 
                                </p>
                            </div>
                            <div class="col-md-6">
                                {{-- <a href="{{route('unites.edit' , $unite->id)}}" class="rounded-0 btn  btn-outline-warning btn-sm"> <span class="fas fa-pen"></span></a>
                                <form class="formHasDelete" action="{{route('unites.destroy',$unite->id)}}" method="post" style="display:inline-block">
                                    @csrf
                                    @method('delete')

                                    <button class="rounded-0 btn  btn-sm btn-outline-danger" type="submit"><span
                                            class="fas fa-trash "></span></button>
                                </form> --}}
                                
                                <a href="{{route('unites.edit' , $unite->id)}}" class="rounded-0 btn  btn-outline-warning btn-sm"> <span class="fas fa-pen"></span></a>
                                <!-- Button trigger modal -->
                                <button type="button" class="rounded-0 btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#DeleteLesson">
                                    <span class="fas fa-trash "></span>
                                </button>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="DeleteLesson" tabindex="-1" aria-labelledby="DeleteLessonLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header bg-base-5">
                                        <h5 class="modal-title" id="DeleteLessonLabel"><img src="https://img.icons8.com/cute-clipart/30/000000/delete-forever.png"/>CONFIRMER LA SUPPRESSION</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body bg-base-6">
                                        Êtes-vous sûr de vouloir supprimer l'unité <b>définitivement</b>?
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary border-0" data-bs-dismiss="modal">Close</button>
                                        <form class="formHasDelete" action="{{route('unites.destroy',$unite->id)}}" method="post" style="display:inline-block">
                                            @csrf
                                            @method('delete')
                
                                            <button class="btn btn-outline-success border-0" type="submit">Valider</button>
                                        </form>
                                        </div>
                                    </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                {{$unite->description}} 
                            </p>     
                        </div> 
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="{{route('lessons.show' , $unite->id)}}">Liste des leçons<i class="fas fa-book-open ps-2 fs-4"></i></a></li>
                            <li class="list-group-item"><a href="{{route('exercices.show' , $unite->id)}}">Liste des exercices<i class="fad fa-book-open ps-2 fs-4"></i></a></li>
                        </ul>       
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

