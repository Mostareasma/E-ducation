@extends('layouts.default')
@section('title', 'Cours')
@section('content')
    <!-- start page title -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 pb-4">
                <span class="font-italic fs-3">
                    <i class="fas fa-list pe-2"></i>Liste des cours 
                </span>
            </div>
            <div class="col-md-4 pb-4">
                <div class="mr-0 ml-auto" style="width: max-content;margin-left: auto;">
                    <a href="{{route('cours.create')}}" class="btn btn-primary btn-md border-0 bg-base-3 rounded-0">
                        Ajouter un cours<i class="fas fa-plus ps-1"></i>
                    </a>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Intitulé</th>
                                <th>Enseignant</th>
                                <th>Classe</th>
                                <th>Description</th>
                                <th>Dernière modification</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($cours as $cour)
                                    <tr>
                                        <td>{{$cour->intitule}}</td>
                                        <td>
                                            {{$cour->lastname}} {{$cour->firstname }}
                                        </td>
                                        <td>
                                            {{$cour->untitule}}
                                        </td>
                                        <td>
                                            {{Str::limit($cour->description , 50 , '...')}}
                                        </td>
                                        <td>
                                            {{$cour->updated_at}}
                                        </td>
                                        <td nowrap="nowrap" class="text-center">
                                            <a href="{{route('cours.edit',$cour->id)}}" class="rounded-0 btn  btn-outline-warning btn-sm">
                                                <span class="fas fa-pen"></span>
                                            </a>
                                            <form class="formHasDelete" action="{{route('cours.destroy',$cour->id)}}" method="post" style="display:inline-block">
                                                @csrf
                                                @method('delete')

                                                <button class="rounded-0 btn  btn-sm btn-outline-danger" type="submit">
                                                    <span class="fas fa-trash "></span>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div> <!-- end row -->
    
    <!-- end page title -->
@endsection

