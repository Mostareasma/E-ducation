@extends('layouts.default')
@section('title', 'Nouvelle Fiche')
@section('mainCSS')
    <!-- Main CSS-->
@endsection
@section('content')
    <div class="shadow mb-5 bg-transparent rounded"><h1 class="text-center lh-lg"><i class="fas fa-file-alt pe-2"></i>MES FICHES PEDAGOGIQUES</h1></div>
        <div class="d-flex justify-content-center mx-5 my-5">
        <form class="row g-3" action="{{route('fiches.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="col-md-3">
                <label class="form-label fw-bold fs-5 ps-2">Titre :</label>
                <input type="text" class="form-control" name="titre_fiche">
            </div>
            <div class="col-md-3">
                <label class="form-label fw-bold fs-5 ps-2">Durée :</label>
                <input type="text" class="form-control" name="duree_fiche">
            </div>
            <div class="col-md-3">
                <label class="form-label fw-bold fs-5 ps-2">Classe :</label>
                <input type="text" class="form-control" name="classe_fiche">
            </div>
            <div class="col-md-3">
                <label class="form-label fw-bold fs-5 ps-2">Nombre d'élèves :</label>
                <input type="text" class="form-control" name="nb_eleves">
            </div> 
            <div class="col-md-12">
                <label class="form-label fw-bold fs-5 ps-2">Matière :</label>
                <input type="text" class="form-control" name="matiere_fiche">
            </div>
            <div class="col-md-6">
                <label class="form-label fw-bold fs-5 ps-2">Nom du module :</label>
                <input type="text" class="form-control" name="nom_module">
            </div>
            <div class="col-md-6">
                <label class="form-label fw-bold fs-5 ps-2">Nom de la leçon :</label>
                <input type="text" class="form-control" name="nom_lecon">
            </div>
            <div class="col-12">
                <label class="form-label fw-bold fs-5 ps-2">Objectifs pédagogiques :</label>
                <textarea class="form-control" rows="3" name="obj_pedag"></textarea>
            </div>
            <div class="col-12">
                <label class="form-label fw-bold fs-5 ps-2">Objectifs spécifiques</label>
                <textarea class="form-control" rows="3" name="obj_spec"></textarea>
            </div>
            <div class="col-6">
                <label class="form-label fw-bold fs-5 ps-2">Compétences visées</label>
                <textarea class="form-control" rows="3" name="competence"></textarea>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-bold fs-5 ps-2">Pré-requis :</label>
                <textarea class="form-control" rows="3" name="requis_fiche"></textarea>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-bold fs-5 ps-2">Outils didactiques :</label>
                <textarea class="form-control" rows="3" name="outils_didactiques"></textarea>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-bold fs-5 ps-2">Organisation du contenu :</label>
                <textarea class="form-control" rows="3" name="contenu_fiche"></textarea>
            </div>
            <div>
                <h2 class="text-center my-5">SCENARIO PEDAGOGIQUE</h2>
            </div>
            <table class="table table-bordered bg-white" id="dynamicAddRemove">
                <thead class="bg-dark text-white fs-6 text-center">
                    <tr>
                        <th class="py-3">Organisation du temps</th>
                        <th class="py-3">Activité du professeur</th>                    
                        <th class="py-3">Activité de l'élève</th>
                        <th class="py-3">Mots clés</th>
                        <th class="py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="addMoreInputFields[0][orga_temps]" placeholder="" class="form-control" />
                        </td>
                        <td><input type="text" name="addMoreInputFields[0][act_prof]" placeholder="" class="form-control" />
                        </td>
                        <td><input type="text" name="addMoreInputFields[0][act_eleve]" placeholder="" class="form-control" />
                        </td>
                        <td><input type="text" name="addMoreInputFields[0][mot_cle]" placeholder="" class="form-control" />
                        </td>
                        <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Ajouter</button></td>
                    </tr> 
                </tbody>
            </table>
            <div class="col-md-12">
                <label class="form-label fw-bold fs-5 ps-2">Evaluation :</label>
                <textarea class="form-control" rows="3" name="evaluation"></textarea>
            </div>
            <div class="d-flex justify-content-center col-12">
                <button type="submit" name="submit" class="btn btn-primary rounded-pill px-3 py-2 fs-4 bg-fiche border-0">Valider<i class="bi bi-check-lg px-2"></i></button>
            </div>
        </form>
    </div><!--FORM--> 
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
            '][mot_cle]" placeholder="" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
@endsection

