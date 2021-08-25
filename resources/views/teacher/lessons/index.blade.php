@extends('layouts.default')
@section('title', '| Leçons')
@section('content')
    <div class="container">
        <div class="shadow mb-5 bg-transparent rounded"><h1 class="text-center lh-lg"><i class="fas fa-list pe-2"></i>Liste des leçons</h1></div>
        <div class="row">
            <div class="mr-0 ml-auto mb-4" style="width: max-content;margin-left: auto;">
                <button type="button" class="btn btn-outline-secondary bg-base-3 border-0 rounded-pill px-3 text-light fw-bold" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="bi bi-plus-circle-fill pe-2 fs-5"></i>Ajouter une leçon
                </button>
            </div>
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    
                    <form action="{{route('lessons.store')}}" method="POST" enctype="multipart/form-data" >
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title ps-2 fs-4 fw-bolder text-uppercase" id="">
                                    <img class="pe-2" src="https://img.icons8.com/offices/30/000000/courses.png"/>Nouvelle leçon
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                @csrf
                                <div class="d-flex form-group mt-3">
                                    <div class="col-sm-3"><label class="fw-bold">Numéro de l'unité :</label></div>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input value="{{$id}}" type="text" name="unite_id" class="rounded-0 form-control">
                                        </div><!-- input-group -->
                                    </div>   
                                </div>
                                
                                <div class="d-flex form-group mt-3">
                                    <div class="col-sm-3"><label class="fw-bold">Titre :</label></div>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" name="title" class="rounded-0 form-control" placeholder="Titre de la leçon" required>
                                        </div><!-- input-group -->
                                    </div>  
                                </div>
            
                                <div class="d-flex form-group mt-3">
                                    <div class="col-sm-3"><label class="fw-bold">Descriptif :</label></div>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" name="note" class="rounded-0 form-control" placeholder="Description de la leçon">
                                        </div><!-- input-group -->
                                    </div>
                                </div>
                                
                                <div class="d-flex form-group mt-3">
                                    <div class="col-sm-3"><label class="form-label name fw-bold">Support de la leçon :</label></div>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="file" name="support" value="Ajouter un fichier" required>
                                        </div><!-- input-group -->
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="form-group mt-3">
                                    <button type="submit" name="submit" class="btn btn-primary">Valider <i class="fas fa-check-circle ps-2 fs-4"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;"> 
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Descriptif</th>
                    <th>Document</th>
                    <th>Dernière modification</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($lessons as $lesson)
                    
                <tr>
                    <td>{{$lesson->title}}</td>
                    <td>{{Str::limit($lesson->note , 90 , '...')}}</td>
                    <td>
                        <a href="{{$lesson->support_path}}"
                            download="lecon{{$lesson->id}}.pdf">
                                Télécharger le document</a></td>
                    </td>
                    <td>{{$lesson->updated_at}}</td>
                 
                    <td nowrap="nowrap" class="">
                        {{-- <button type="button" class="rounded-0 btn  btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                            <span class="fas fa-pen"></span>
                        </button>
                                
                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
                            <div class="modal-dialog">
                                
                                <form action="{{route('lessons.update' , $lesson->id)}}" method="POST" enctype="multipart/form-data" >
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModal2Label">Creer ue leçon</h5>
                                            <button type="button" class="rounded-0 btn -close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            @csrf
                                            @method('put')
                                            <div class="form-group mt-3">
                                                <label>ID de l'unité</label>
                                                <div class="input-group">
                                                    <input value="{{$id}}" type="text" name="unite_id" class="rounded-0 form-control" >
                                                </div><!-- input-group -->
                                            </div>
                                            <div class="form-group mt-3">
                                                <label>Titre</label>
                                                <div class="input-group">
                                                    <input value="{{$lesson->title}}" type="text" name="title" class="rounded-0 form-control" placeholder="Titre de la leçon" required>
                                                </div><!-- input-group -->
                                            </div>
                        
                                            <div class="form-group mt-3">
                                                <label>Note</label>
                                            
                                                <div class="input-group">
                                                    <input value="{{$lesson->note}}" type="text" name="note" class="rounded-0 form-control" placeholder="Apropos de cette leçon">
                                                </div><!-- input-group -->
                                            
                                            </div>
                                            
                                            <div class="form-group mt-3">
                                                <label>Suport de la leçon</label>
                                            
                                                <div class="input-group">
                                                    <input type="file" name="support" class="" placeholder="PDF required" required>
                                                </div><!-- input-group -->
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="form-group mt-3">
                                                <input type="submit" class="rounded-0 btn btn-primary bg-base-3 border-0" value="Créer">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div> --}}
                        <!-- Button trigger modal -->
                        <button type="button" class="rounded-0 btn  btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#DeleteLesson">
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
                                Êtes-vous sûr de vouloir supprimer la leçon <b>définitivement</b>?
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary border-0" data-bs-dismiss="modal">Close</button>
                                <form class="formHasDelete" action="{{route('lessons.destroy',$lesson->id)}}" method="post" style="display:inline-block">
                                    @csrf
                                    @method('delete')
        
                                    <button class="btn btn-outline-success border-0" type="submit">Valider</button>
                                </form>
                                </div>
                            </div>
                            </div>
                        </div>
                        {{-- <form class="formHasDelete" action="{{route('lessons.destroy',$lesson->id)}}" method="post" style="display:inline-block">
                            @csrf
                            @method('delete')

                            <button class="rounded-0 btn  btn-sm btn-outline-danger" type="submit"><span class="fas fa-trash "></span></button>
                        </form> --}}
                    </td>
                   
                </tr>
                @endforeach

            </tbody>
        </table>        
    </div>
@endsection