@extends('layouts.default')
@section('title', 'Elèves')
@section('content')
    <!-- start page title -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 pb-4">
                <span class="font-italic fs-3">
                    <i class="fas fa-list pe-2"></i>Liste des élèves 
                </span>
            </div>
            <div class="col-md-4 pb-4">
                <div class="mr-0 ml-auto" style="width: max-content;margin-left: auto;">
                    <a href="{{route('students.create')}}" class="btn btn-primary btn-md border-0 bg-base-3 rounded-0">
                        Ajouter un élève<i class="fas fa-user-plus ps-1"></i>
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
                                <th>Numéro Téléphone</th>
                                <th>Classe</th>
                                <th>Dernière modification</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>
                                            <img src="{{$student->profile_photo_path}}" alt="..." class="rounded-circle bg-primary" height="30px" width="30px">
                                        </td>
                                        <td>
                                            {{$student->lastname}} {{$student->firstname }}
                                        </td>
                                        <td>
                                            {{$student->email}}
                                        </td>
                                        <td>
                                            {{$student->phoneNumber}}
                                        </td>
                                        <td>
                                            {{$student->untitule}}
                                        </td>
                                        <td>
                                            {{$student->updated_at}}
                                        </td>
                                        <td nowrap="nowrap" class="text-center">
                                            <a href="{{route('students.edit',$student->id)}}" class="rounded-0 btn  btn-outline-warning btn-sm">
                                                <span class="fas fa-pen"></span>
                                            </a>
                                            <form class="formHasDelete" action="{{route('students.destroy',$student->user_id)}}" method="post" style="display:inline-block">
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

