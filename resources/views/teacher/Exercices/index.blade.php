@extends('layouts.default')
@section('title', '| Exercices')
@section('content')
    <div class="container">
        <div class="shadow mb-5 bg-transparent rounded"><h1 class="text-center lh-lg"><i class="fad fa-tasks-alt pe-2"></i>Liste des exercices</h1></div>
        <div class="row">
            <!-- Button trigger modal -->
            <div class="mr-0 ml-auto mb-4" style="width: max-content;margin-left: auto;">
                <button type="button" class="btn btn-outline-secondary bg-base-3 border-0 rounded-pill px-3 text-light fw-bold" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="bi bi-plus-circle-fill pe-2 fs-5"></i>Ajouter un exercice
                </button>
            </div>
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    
                    <form action="{{route('exercices.store')}}" method="POST" enctype="multipart/form-data" >
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title ps-2 fs-4 fw-bolder text-uppercase" id="exampleModalLabel">
                                    <img src="https://img.icons8.com/office/30/000000/homework.png" class="pe-2"/>Nouvel exercice
                                </h5>
                                <button type="button" class="rounded-0 btn -close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @csrf
                                <div class="form-group mt-3">
                                    <label>Numéro de l'unité :</label>
                                    <div class="input-group">
                                        <input value="{{$id}}" type="text" name="unite_id" class="rounded-0 form-control" >
                                    </div><!-- input-group -->
                                </div>
                                <div class="form-group mt-3">
                                    <label>Titre :</label>
                                    <div class="input-group">
                                        <input type="text" name="title" class="rounded-0 form-control" placeholder="" required>
                                    </div><!-- input-group -->
                                </div>
            
                                <div class="form-group mt-3">
                                    <label>Consignes :</label>
                                
                                    <div class="input-group">
                                        <input type="text" name="note" class="rounded-0 form-control" placeholder="Rédigez les consignes de l'exercice">
                                    </div><!-- input-group -->
                                
                                </div>
                                
                                <div class="form-group mt-3">
                                    <label>Support de l'exercice :</label>
                                
                                    <div class="input-group">
                                        <input type="file" name="support" class="" placeholder="PDF required" required>
                                    </div><!-- input-group -->
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
                    <th>Note</th>
                    <th>Document</th>
                    <th>Dérniere modification</th>
                    <th>Actions</th>
                </tr>
            </thead>


            <tbody>
                @foreach ($exercices as $exercice)
                    
                <tr>
                    <td>{{$exercice->title}}</td>
                    <td>{{Str::limit($exercice->note , 100 , '...')}}</td>
                    <td>
                        <a href="{{$exercice->support_path}}"
                            download="lecon{{$exercice->id}}.pdf">
                                Télécharger le document</a></td>
                    </td>
                    <td>{{$exercice->updated_at}}</td>
                 
                    <td nowrap="nowrap" class="">
                        <form class="formHasDelete" action="{{route('exercices.destroy',$exercice->id)}}" method="post" style="display:inline-block">
                            @csrf
                            @method('delete')

                            <button class="rounded-0 btn  btn-sm btn-outline-danger" type="submit"><span
                                    class="fas fa-trash "></span></button>
                        </form>
                    </td>
                   
                </tr>
                @endforeach

            </tbody>
        </table>        
    </div>
@endsection