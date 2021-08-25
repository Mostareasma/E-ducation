@extends('layouts.default')
@section('title', '| Espace didactique')
@section('content')
    <div class="container">
    <div class="shadow mb-5 bg-transparent rounded"><h1 class="text-center lh-lg"><i class="fas fa-file-alt pe-2"></i>MES FICHES PEDAGOGIQUES</h1></div>
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
        <div class="d-flex justify-content-end mt-5">
            <button type="button" class="btn btn-primary btn-md rounded-pill border-0 bg-base-3">
                <a class="text-white" href="{{route('fiches.create')}}"><i class="fas fa-plus-circle me-3"></i>Nouvelle fiche</a></button>
        </div> 
        <div class="d-flex justify-content-center mx-5">
            <table class="table table-hover table-striped lh-lg mt-5">
                <thead class="bg-base-1"> 
                    <th class="col col-sm-1 fs-5 font-monospace" >Fiche </th>
                    <th class="col col-sm-2 fs-5 text-center font-monospace">Date de publication</th>
                    <th class="col col-sm-2 fs-5 text-center font-monospace">Dernière modification</th>
                    <th class="col col-sm-1 fs-5 text-center font-monospace">Actions</th>
                </thead>
                <tbody class="bg-white">
                @foreach ($fiches as $fiche)
                    <tr>
                        <td class="fs-6"><a href="{{route('fiches.show',$fiche->id)}}" class="link-primary">{{$fiche->titre_fiche}}</a></td>
                        <td class="text-center fs-6 fst-italic">{{$fiche->created_at}}</td>
                        <td class="text-center fs-6 fst-italic">{{$fiche->updated_at}}</td>
                        <td class="text-center fs-6 fst-italic">
                            <button type="button"  class="btn btn-primary bg-transparent text-dark border-0 px-0 py-0">
                                <a href="{{route('fiches.show',$fiche->id)}}" class="pt-3"><i class="bi bi-eye-fill text-dark" id="fiche"></i></a>
                            </button>
                            <button type="button"  class="btn btn-primary bg-transparent text-dark border-0 px-0 py-0">
                                <a href="{{route('fiches.edit' , $fiche->id)}}"><i class="bi bi-pencil-square text-dark" id="fiche"></i></a>
                            </button>
                            <button type="button"  data-bs-toggle="modal" class="btn btn-primary bg-transparent text-dark border-0 px-0 py-0" data-bs-target="#deleteModal">
                            <i class="bi bi-trash-fill" id="fiche"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!--MODAL-->
            @foreach ($fiches as $fiche)
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-base-5">
                    <h5 class="modal-title" id="deleteModalLabel"><img src="https://img.icons8.com/cute-clipart/30/000000/delete-forever.png"/>CONFIRMER LA SUPPRESSION</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-base-6">
                    Êtes-vous sûr de vouloir supprimer la fiche <b>définitivement</b>?
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary border-0" data-bs-dismiss="modal">Close</button>
                    <form class="formHasDelete" action="{{route('fiches.destroy',$fiche->id)}}" method="post" style="display:inline-block">
                        @csrf
                        @method('delete')

                        <button class="btn btn-outline-success border-0" type="submit">Valider</button>
                    </form>
                    </div>
                </div>
                </div>
            </div>
            <!-- Modal -->
            @endforeach
        </div><!--TABLE-->
    </div>
@endsection

