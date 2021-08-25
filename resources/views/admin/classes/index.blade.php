@extends('layouts.default')
@section('title', 'Mes Classes')
@section('content')
     <!-- start page title -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 pb-4">
                <span class="font-italic fs-3">
                    <i class="fas fa-list pe-2"></i>Liste des classes 
                </span>
            </div>
            <div class="col-md-4 pb-4">
                <div class="mr-0 ml-auto" style="width: max-content;margin-left: auto;">
                    <a href="{{route('classes.create')}}" class="btn btn-primary btn-md border-0 bg-base-3 rounded-0">
                        Créer une classe<i class="fas fa-plus ps-1"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
  
                        <thead>
                            <tr>
                                <th>Untitulé</th>
                                <th>Niveau</th>
                                <th>Filière</th>
                                <th>Groupe</th>
                                <th>Dernière modification</th>
                                <th>Actions</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($classes as $classe)
                                
                            <tr>
                                <td>{{$classe->untitule}}</td>
                                <td>{{$classe->niveau}}</td>
                                <td>{{$classe->filiere}}</td>
                                <td>{{$classe->group}}</td>
                                <td>{{$classe->updated_at}}</td>
                             
                                <td nowrap="nowrap" class="text-center">
                                    <a href="{{route('classes.edit',$classe->id)}}" class="rounded-0 btn  btn-outline-warning btn-sm"> <span class="fas fa-pen"></span></a>
                                    <form class="formHasDelete" action="{{route('classes.destroy',$classe->id)}}" method="post" style="display:inline-block">
                                        @csrf
                                        @method('delete')

                                        <button class="rounded-0 btn  btn-sm btn-outline-danger" type="submit"><span
                                            class="fas fa-trash "></span>
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
    </div> <!-- end row -->
    <!-- end page title -->
@endsection

