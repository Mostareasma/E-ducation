@extends('layouts.default')
@section('title', 'Enseignants')
@section('content')
    <!-- start page title -->
    <div class="container">
    <!---GESTION DES ERREURS-->
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <strong>{{ $message }}</strong>
    </div>
    @endif

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!---GESTION DES ERREURS-->
        <div class="row">
            <div class="col-md-8 pb-4">
                <span class="font-italic fs-3">
                    <i class="fas fa-list pe-2"></i>Liste des enseignants
                </span>
            </div>
            <div class="col-md-4 pb-4">
                <div class="mr-0 ml-auto" style="width: max-content;margin-left: auto;">
                    <a href="{{route('teachers.create')}}" class="btn btn-primary btn-md border-0 bg-base-3 rounded-0">
                        Ajouter un enseignant<i class="fas fa-user-plus ps-1"></i>
                    </a>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Nom et Prénom</th>
                                <th>Email</th>
                                <th>Numéro de téléphone</th>
                                <th>Spécialité</th>
                                <th>Dernière modification</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($teachers as $teacher)
                                    <tr>
                                        <td>
                                            <img src="{{$teacher->profile_photo_path}}" alt="..." class="rounded-circle bg-primary" height="30px" width="30px">
                                        </td>
                                        <td>
                                            {{$teacher->lastname}} {{$teacher->firstname }}
                                        </td>
                                        <td>
                                            {{$teacher->email}}
                                        </td>
                                        <td>
                                            {{$teacher->phoneNumber}}
                                        </td>
                                        <td>
                                            {{$teacher->Specialty}}
                                        </td>
                                        <td>
                                            {{$teacher->updated_at}}
                                        </td>
                                        <td nowrap="nowrap" class="text-center">
                                            <a href="{{route('teachers.edit',$teacher->id)}}" class="rounded-0 btn  btn-outline-warning btn-sm">
                                                <span class="fas fa-pen"></span>
                                            </a>
                                            <form class="formHasDelete" action="{{route('teachers.destroy',$teacher->user_id)}}" method="post" style="display:inline-block">
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

