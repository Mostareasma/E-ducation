@extends('layouts.default')
@section('title', "Modifier les information d'un enseignant")
@section('content')
<div class="col-lg-12 mt-5">
    <div class="shadow-sm p-3 mb-5 bg-body rounded-1">
        <h4 class="text-large">Enseignant</h4>
        <p >Modifier les information d'un enseignant</p>

            <form action="{{route('teachers.update',$teacher->id)}}" method="POST" >
                @csrf
                @method('put')
                <div class="row p-3 align-items-center">
                    <!-- input-group -->
                <div class="form-group mt-3">
                    <label>Nom</label>
              
                    <div class="input-group">
                        <input value={{$teacher->lastname}} type="text" name="lastname" class="rounded-0 form-control" placeholder="Nom" required>
                    </div><!-- input-group -->
           
                </div>
                <div class="form-group mt-3">
                    <label>Prènom</label>
                 
                        <div class="input-group">
                            <input value={{$teacher->firstname}} type="text" name="firstname" class="rounded-0 form-control" placeholder="Prènom" required>
                        </div><!-- input-group -->
                   
                </div>
                <div class="form-group mt-3">
                    <label>Email</label>
                   
                    <div class="input-group">
                        <input value={{$teacher->email}} type="email" name="email" class="rounded-0 form-control" placeholder="Email" required>
                    </div><!-- input-group -->
                
                </div>
                <div class="form-group mt-3">
                    <label>Telephone</label>
                   
                    <div class="input-group">
                        <input value={{$teacher->phoneNumber}} type="text" name="phoneNumber" class="rounded-0 form-control" placeholder="Telephone" required>
                    </div><!-- input-group -->
                
                </div>
                <div class="form-group mt-3">
                    <label>CIN</label>
                   
                    <div class="input-group">
                        <input value={{$teacher->CIN}} type="text" name="CIN" class="rounded-0 form-control" placeholder="CIN" required>
                    </div><!-- input-group -->
                
                </div>
                <div class="form-group mt-3">
                    <label>Spécialité</label>
                   
                    <div class="input-group">
                        <input value={{$teacher->Specialty}} type="text" name="specialty" class="rounded-0 form-control" placeholder="Spécialité" required>
                    </div><!-- input-group -->
                
                </div>
                <div class="form-group mt-3">
                    <label>Date de naissance</label>
                   
                    <div class="input-group">
                        <input value={{$teacher->birthday}} type="date" name="birthday" class="rounded-0 form-control" placeholder="Date de naissance" required>
                    </div><!-- input-group -->
                
                </div>
                <div class="form-group mt-3">
                    <label>Adresse</label>
                   
                    <div class="input-group">
                        <input value={{$teacher->Addres}} type="text" name="Addres" class="rounded-0 form-control" placeholder="Addresse" required>
                    </div><!-- input-group -->
                
                </div>
                <div class="form-group mt-3">
                    <input type="submit" class="rounded-0 btn btn-primary bg-base-3 border-0" value="Modifier">
                </div>

            

            </form>
    </div>

</div> <!-- end col -->
@endsection

