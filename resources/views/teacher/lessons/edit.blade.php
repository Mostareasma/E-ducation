@extends('layouts.default')
@section('title', 'Edit une classe')
@section('content')
<div class="col-lg-12 mt-5">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Classe</h4>
            <p class="card-title-desc">Modifier l' unité</p>

            <form action="{{route('unites.update' , $unite->id)}}" method="POST" >
                @csrf
                @method('put')
                <div class="form-group mt-3">
                    <label>Cours</label>
            
                    <div class="input-group">
                        <select name="cour_id" id="">
                            <option selected disabled value="{{$unite->cour_id}}">{{$unite->cours_intitule}}</option>
                            @foreach ($cours as $cour)
                                <option value="{{$cour->id}}">{{$cour->intitule}}</option>
                            @endforeach
                        </select>
                    </div><!-- input-group -->
        
                </div>
                <div class="form-group mt-3">
                    <label>Intitulé</label>
            
                    <div class="input-group">
                        <input value="{{$unite->intitule}}" type="text" name="intitule" class="rounded-0 form-control" placeholder="Nom" required>
                    </div><!-- input-group -->
        
                </div>

                <div class="form-group mt-3">
                    <label>Description</label>
                
                    <div class="input-group">
                        <input value="{{$unite->description}}" type="text" name="description" class="rounded-0 form-control" placeholder="Apropos de ce cours" required>
                    </div><!-- input-group -->
                
                </div>
                
                <div class="form-group mt-3">
                    <label>Number</label>
                
                    <div class="input-group">
                        <input value="{{$unite->number}}" type="number" name="number" class="rounded-0 form-control" placeholder="Nombre d'unité" required>
                    </div><!-- input-group -->
                
                </div>
                <div class="form-group mt-3">
                    <input type="submit" class="rounded-0 btn btn-primary bg-base-3 border-0" value="Créer">
                </div>

            </form>
        </div>
    </div>

</div> <!-- end col -->
@endsection

