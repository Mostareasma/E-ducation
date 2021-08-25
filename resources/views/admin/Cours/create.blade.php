@extends('layouts.default')
@section('title', 'Ajouter un cours')
@section('content')
<div class="col-lg-12 mt-5">
    <div class="shadow-sm p-3 mb-5 bg-body rounded-1">
        <h4 class="text-large"><img src="https://img.icons8.com/ios/40/000000/school.png" class="pe-1"/>Cours</h4>
        <p >Ajouter un cours</p>
        <form action="{{route('cours.store')}}" method="POST" >
            @csrf
            <div class="form-group mt-3">
                <label>Intitulé :</label>
            
                <div class="input-group">
                    <input type="text" name="intitule" class="rounded-0 form-control" placeholder="Nom" required>
                </div><!-- input-group -->
        
            </div>
            <div class="form-group mt-3">
                <label>Classe :</label>
                <select name="classe" class="form-select" required >
                    @foreach ($classes as $classe)
                        <option value={{$classe->id}}>{{$classe->untitule}}</option>                            
                    @endforeach
                    
                </select>
                
                <!-- input-group -->
            </div>
            <div class="form-group mt-3">
                <label>Enseignant :</label>
                <select name="teacher" class="form-select" required >
                    @foreach ($teachers as $teacher)
                        <option value={{$teacher->id}}>{{$teacher->lastname}} {{$teacher->firstname }}</option>                            
                    @endforeach
                    
                </select>
                
                <!-- input-group -->
            </div>
            
            <div class="form-group mt-3">
                <label>Description du cours:</label>
                
                <div class="input-group">
                    <input type="text" name="description" class="rounded-0 form-control" placeholder="Apropos de ce cours" required>
                </div><!-- input-group -->
            
            </div>
            <div class="form-group mt-3">
                <input type="submit" class="rounded-0 btn btn-primary bg-base-3 border-0" value="Créer">
            </div>

        </form>
    </div>

</div> <!-- end col -->
@endsection

