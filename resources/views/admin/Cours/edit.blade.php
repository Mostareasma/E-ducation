@extends('layouts.default')
@section('title', "Modifier les information d'un enseignant")
@section('content')
<div class="col-lg-12 mt-5">
    <div class="shadow-sm p-3 mb-5 bg-body rounded-1">
        <h4 class="text-large">Cours</h4>
        <p>Modification</p>

        <form action="{{route('cours.update',$cour->id)}}" method="POST" >
            @csrf
            @method('put')
            <div class="form-group mt-3">
                <label>Intitulé</label>
            
                <div class="input-group">
                    <input value={{$cour->intitule}} type="text" name="intitule" class="rounded-0 form-control" placeholder="Nom" required>
                </div><!-- input-group -->
        
            </div>
            <div class="form-group mt-3">
                <label>Classe</label>
                <select name="classe" class="form-select" required >
                    <option disabled selected value={{$cour->id}}>{{$cour->untitule}}</option> 
                    @foreach ($classes as $classe)
                        <option value={{$classe->id}}>{{$classe->untitule}}</option>                            
                    @endforeach
                    
                </select>
                
                <!-- input-group -->
            </div>
            <div class="form-group mt-3">
                <label>teacher</label>
                <select name="teacher" class="form-select" required >
                    <option disabled value={{$cour->id}}>{{$cour->lastname}} {{$cour->firstname}}</option>
                    @foreach ($teachers as $teacher)
                        <option value={{$teacher->user_id}}>{{$teacher->lastname}} {{$teacher->firstname }}</option>                            
                    @endforeach
                    
                </select>
                
                <!-- input-group -->
            </div>
            
            <div class="form-group mt-3">
                <label>Description</label>
                
                <div class="input-group">
                    <input value={{$cour->description}} type="text" name="description" class="rounded-0 form-control" placeholder="Apropos de ce cours" required>
                </div><!-- input-group -->
            
            </div>
            <div class="form-group mt-3">
                <input type="submit" class="rounded-0 btn btn-primary bg-base-3 border-0" value="Modifier">
            </div>

        </form>
    </div>

</div> <!-- end col -->
@endsection

