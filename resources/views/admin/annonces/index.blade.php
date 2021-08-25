@extends('layouts.default')
@section('title', 'Mes annonces')
@section('content')
     <!-- start page title -->
     <div class="container">
        <div class="row">
            <div class="col-md-8 pb-4">
                <span class="font-italic fs-3">
                    <i class="fas fa-list pe-2"></i>Liste des annonces
                </span>
            </div>
            <div class="col-md-4 pb-4">
                <div class="mr-0 ml-auto" style="width: max-content;margin-left: auto;">
                    <a href="{{route('annonces.create')}}" class="btn btn-primary btn-md border-0 bg-base-3 rounded-0">
                        Nouvelle annonce<i class="fas fa-plus ps-1"></i>
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
                            <th>Titre</th>
                            <th>Contenu</th>
                            <th>Pièce jointe</th>
                        </tr>
                        </thead>


                        <tbody>
                            @foreach ($annonces as $annonce)
                                
                            <tr>
                                <td>{{$annonce->title}}</td>
                                <td>{{$annonce->description}}</td>
                                <td>
                                    <a href="{{$annonce->annonce_photo_path}}"
                                    download="anonces{{$annonce->id}}.png">
                                        Télécharger l'image</a></td>
                             
                                <td nowrap="nowrap" class="text-center">
                                    <button type="button" data-bs-toggle="modal" class="rounded-0 btn  btn-sm btn-outline-danger" data-bs-target="#deleteModal"><span
                                                class="fas fa-trash "></span></button>
                                </td>
                               
                            </tr>
                            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-base-5">
                                    <h5 class="modal-title" id="deleteModalLabel"><img src="https://img.icons8.com/cute-clipart/30/000000/delete-forever.png"/>CONFIRMER LA SUPPRESSION</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body bg-base-6">
                                    Êtes-vous sûr de vouloir supprimer l'annonce <b>définitivement</b>?
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary border-0" data-bs-dismiss="modal">Close</button>
                                    <form class="formHasDelete" action="{{route('annonces.destroy',$annonce->id)}}" method="post" style="display:inline-block">
                                        @csrf
                                        @method('delete')
                
                                        <button class="btn btn-outline-success border-0" type="submit">Valider</button>
                                    </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    <!-- end page title -->
@endsection

