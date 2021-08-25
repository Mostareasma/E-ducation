@extends('layouts.default')
@section('title', 'Ajouter un enseignant')
@section('content')
<div class="col-lg-12 mt-5">
    <div class="shadow-sm p-3 mb-5 bg-body rounded-1">
        <h4 class="text-large"><img src="https://img.icons8.com/ios/40/000000/teacher.png" class="pe-1"/>Enseignant</h4>
        <p>Ajouter un enseignant</p>

            <form action="{{route('teachers.store')}}" method="POST" >
                @csrf
                <div class="form-group mt-3">
                    <label>Nom :</label>
              
                    <div class="input-group">
                        <input type="text" name="lastname" class="rounded-0 form-control" placeholder="Nom" required>
                    </div><!-- input-group -->
           
                </div>
                <div class="form-group mt-3">
                    <label>Prénom :</label>
                 
                        <div class="input-group">
                            <input type="text" name="firstname" class="rounded-0 form-control" placeholder="Prénom" required>
                        </div><!-- input-group -->
                   
                </div>
                <div class="form-group mt-3">
                    <label>Email : </label>
                   
                    <div class="input-group">
                        <input type="email" name="email" class="rounded-0 form-control" placeholder="Email" required>
                    </div><!-- input-group -->
                
                </div>
                <div class="form-group mt-3">
                    <label>Téléphone :</label>
                   
                    <div class="input-group">
                        <input type="text" name="phoneNumber" class="rounded-0 form-control" placeholder="Telephone" required>
                    </div><!-- input-group -->
                
                </div>
                <div class="form-group mt-3">
                    <label>CIN :</label>
                   
                    <div class="input-group">
                        <input type="text" name="CIN" class="rounded-0 form-control" placeholder="CIN" required>
                    </div><!-- input-group -->
                
                </div>
                <div class="form-group mt-3">
                    <label>Spécialité :</label>
                   
                    <div class="input-group">
                        <input type="text" name="specialty" class="rounded-0 form-control" placeholder="Spécialité" required>
                    </div><!-- input-group -->
                
                </div>
                <div class="form-group mt-3">
                    <label>Date de naissance :</label>
                   
                    <div class="input-group">
                        <input type="date" name="birthday" class="rounded-0 form-control" placeholder="Date de naissance" required>
                    </div><!-- input-group -->
                
                </div>
                <div class="form-group mt-3">
                    <label>Adresse :</label>
                   
                    <div class="input-group">
                        <input type="text" name="Addres" class="rounded-0 form-control" placeholder="Addresse" required>
                    </div><!-- input-group -->
                
                </div>
                <div class="form-group mt-3">
                    <input type="submit" class="rounded-0 btn btn-primary bg-base-3 border-0" value="Ajouter">
                </div>

            </form>
        </div>
    </div>

</div> <!-- end col -->
@endsection

