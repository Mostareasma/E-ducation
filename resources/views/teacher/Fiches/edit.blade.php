@extends('layouts.default')
@section('title', '| Editer Fiche Pédagogique')
@section('content')
<div class="shadow mb-5 bg-transparent rounded"><h1 class="text-center lh-lg"><i class="fas fa-file-alt pe-2"></i>MES FICHES PEDAGOGIQUES - MODIFICATION</h1></div>
        <div class="d-flex justify-content-center mx-5 my-5">
        <form id="ficheUpdate" fiche="{{$fiche->id}}" class="row g-3" action="{{route('fiches.update' , $fiche->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="col-md-3">
                <label class="form-label fw-bold fs-5 ps-2">Titre :</label>
                <input type="text" class="form-control" name="titre_fiche" value="{{$fiche->titre_fiche}}">
            </div>
            <div class="col-md-3">
                <label class="form-label fw-bold fs-5 ps-2">Durée :</label>
                <input type="text" class="form-control" name="duree_fiche" value="{{$fiche->duree_fiche}}">
            </div>
            <div class="col-md-3">
                <label class="form-label fw-bold fs-5 ps-2">Classe :</label>
                <input type="text" class="form-control" name="classe_fiche" value="{{$fiche->classe_fiche}}">
            </div>
            <div class="col-md-3">
                <label class="form-label fw-bold fs-5 ps-2">Nombre d'élèves :</label>
                <input type="text" class="form-control" name="nb_eleves" value="{{$fiche->nb_eleves}}">
            </div>
            <div class="col-md-6">
                <label class="form-label fw-bold fs-5 ps-2">Matière :</label>
                <input type="text" class="form-control" name="matiere_fiche" value="{{$fiche->matiere_fiche}}">
            </div>
            <div class="col-md-6">
                <label class="form-label fw-bold fs-5 ps-2">Nom du module :</label>
                <input type="text" class="form-control" name="nom_module" value="{{$fiche->nom_module}}">
            </div>
            <div class="col-md-12">
                <label class="form-label fw-bold fs-5 ps-2">Nom de la leçon :</label>
                <input type="text" class="form-control" name="nom_lecon" value="{{$fiche->nom_lecon}}">
            </div>
            <div class="col-12">
                <label class="form-label fw-bold fs-5 ps-2">Objectifs pédagogiques :</label>
                <textarea class="form-control" rows="3" name="obj_pedag" value="">{{$fiche->obj_pedag}}</textarea>
            </div>
            <div class="col-12">
                <label class="form-label fw-bold fs-5 ps-2">Objectifs spécifiques</label>
                <textarea class="form-control" rows="3" name="obj_spec" value="">{{$fiche->obj_spec}}</textarea>
            </div>
            <div class="col-12">
                <label class="form-label fw-bold fs-5 ps-2">Compétences visées</label>
                <textarea class="form-control" rows="3" name="competence" value="">{{$fiche->competence}}</textarea>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-bold fs-5 ps-2">Pré-requis :</label>
                <textarea class="form-control" rows="3" name="requis_fiche" value="">{{$fiche->requis_fiche}}</textarea>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-bold fs-5 ps-2">Organisation du contenu :</label>
                <textarea class="form-control" rows="3" name="contenu_fiche" value="">{{$fiche->contenu_fiche}}</textarea>
            </div>
            <div>
                <h2 class="text-center my-5">SCENARIO PEDAGOGIQUE</h2>
            </div>

            <div class="d-flex justify-content-end"><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Ajouter</button></div>

            <table class="table table-bordered" id="dynamicAddRemove">
                <tr>
                    <th>Organisation du temps</th>
                    <th>Activité du professeur</th>                    
                    <th>Activité de l'élève</th>
                    <th>Mots clés</th>
                    <th>Actions</th>
                </tr>
                @foreach($fiche->scenarios as $scenario)
                <tr>
                    <td><input type="text" name="addMoreInputFields[0][orga_temps]" placeholder="Enter subject" class="form-control" value="{{$scenario->orga_temps}}" />
                    </td>
                    <td><input type="text" name="addMoreInputFields[0][act_prof]" placeholder="Enter subject" class="form-control" value="{{$scenario->act_prof}}" />
                    </td>
                    <td><input type="text" name="addMoreInputFields[0][act_eleve]" placeholder="Enter subject" class="form-control" value="{{$scenario->act_eleve}}" />
                    </td>
                    <td><input type="text" name="addMoreInputFields[0][mot_cle]" placeholder="Enter subject" class="form-control" value="{{$scenario->mot_cle}}" />
                    </td>
                    <td></td>
                </tr>
                @endforeach
            </table>
            <div class="col-md-12">
                <label class="form-label fw-bold fs-5 ps-2">Evaluation :</label>
                <textarea class="form-control" rows="3" name="evaluation">{{$fiche->evaluation}}</textarea>
            </div>
            <div class="d-flex justify-content-center col-12">
                <button type="submit" id="getdata" class="btn btn-primary rounded-pill px-3 py-2 fs-4"><i class="bi bi-check-lg me-3"></i>Valider</button>
            </div>
        </form>
        </div><!--FORM-->
        <!--MODAL-->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Supprimer la fiche</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Êtes-vous sûr de vouloir supprimer la fiche?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-primary">Valider</button>
            </div>
            </div>
        </div>
    </div>
@endsection
@section('mainJS')
<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="text" name="addMoreInputFields[' + i +
            '][orga_temps]" placeholder="" class="form-control" /></td><td><input type="text" name="addMoreInputFields[' + i +
            '][act_prof]" placeholder="" class="form-control" /></td><td><input type="text" name="addMoreInputFields[' + i +
            '][act_eleve]" placeholder="" class="form-control" /></td><td><input type="text" name="addMoreInputFields[' + i +
            '][mot_cle]" placeholder="" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Supprimer</button></td></tr>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
<script>
    document.getElementById("ficheUpdate").addEventListener("click", function(event){
        event.preventDefault();
    $('#getdata').click(function(){
        let token = $("input[name=_token]").val();
            
        $.ajax({
                  
            type: 'DELETE',
            
            url:"{{route('scenarios.destroy' , $fiche->id)}}",
            
            data: {
                _token: token
            },
            
            success: function(response) {
                document.getElementById("ficheUpdate").submit(); 
            },
        });


    });

    });
</script>
@endsection
