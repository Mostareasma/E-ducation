@extends('layouts.default')
@section('title', 'Ajouter un élève')
@section('content')
<div class="col-lg-12 mt-5">
    <div class="shadow-sm p-3 mb-5 bg-body rounded-1">
        <h4 class="text-large"><img src="https://img.icons8.com/pastel-glyph/40/000000/student-male--v2.png"/>Elève</h4>
        <p >Ajouter un élève</p>
            <form action="{{route('students.store')}}" method="POST" >
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
                    <label>Email :</label>
                    <div class="input-group">
                        <input type="email" name="email" class="rounded-0 form-control" placeholder="Email" required>
                    </div><!-- input-group -->
                </div>
                <div class="form-group mt-3">
                    <label>Téléphone :</label>
                    <div class="input-group">
                        <input type="text" name="phoneNumber" class="rounded-0 form-control" placeholder="+2120 00 00 00 00" required>
                    </div><!-- input-group -->
                </div>
                <div class="form-group mt-3">
                    <label>Code MASSAR :</label>
                    <div class="input-group">
                        <input type="text" name="CNE" class="rounded-0 form-control" placeholder="Code-XXXXXXXX" required>
                    </div>
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
                    <label>Date de naissance :</label>
                   
                    <div class="input-group">
                        <input type="date" name="birthday" class="rounded-0 form-control" placeholder="Date de naissance" required>
                    </div><!-- input-group -->
                
                </div>
                <div class="form-group mt-3">
                    <label>Adresse :</label>
                   
                    <div class="input-group">
                        <input type="text" name="Addres" class="rounded-0 form-control" placeholder="Adresse" required>
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

