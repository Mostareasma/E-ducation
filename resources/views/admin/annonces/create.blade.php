@extends('layouts.default')
@section('title', 'Créer une annonce')
@section('content')
<div class="col-lg-12 mt-5">
    <div class="shadow-sm p-3 mb-5 bg-body rounded-1">

        <h4 class="text-large"><img src="https://img.icons8.com/cotton/50/000000/commercial--v2.png"/>Annonce</h4>
        <p>Creér une annonce</p>
        

        <form action="{{route('annonces.store')}}" method="POST"  enctype="multipart/form-data" >
            @csrf
            <div class="form-group mt-3">
                <label>Titre :</label>
            
                <div class="input-group">
                    <input type="text" name="title" class="rounded-0 form-control" placeholder="Titre" required>
                </div><!-- input-group -->
        
            </div>
            <div class="form-group mt-3">
                <label>Contenu :</label>
            
                <div class="input-group">
                    <textarea class="rounded-0 form-control" name="description" cols="30" rows="10" placeholder="A propos de l'annonce..."></textarea>
                </div><!-- input-group -->
        
            </div>
            <div class="form-group mt-3">
                <label>Pièce jointe :</label>
                
            <div class="form-group">
            <label for="exampleFormControlFile1">Choisissez la photo de l'annonce</label>
            <input type="file" name="file" class="form-control-file" id="profile_photo">
        </div>
                
            </div>
            <div class="form-group mt-3">
                <input type="submit" class="rounded-0 btn btn-primary bg-base-3 border-0" value="Ajouter">
            </div>

        </form>
    </div>

</div> <!-- end col -->
@endsection