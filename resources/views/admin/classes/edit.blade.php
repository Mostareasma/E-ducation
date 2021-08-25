@extends('layouts.default')
@section('title', 'Edit une classe')
@section('content')
<div class="col-lg-12 mt-5">
    <div class="shadow-sm p-3 mb-5 bg-body rounded-1">
        <h4 class="text-large">Classe</h4>
        <p>Modifier une classe</p>

        <form action="{{route('classes.update',$classe->id)}}" method="POST" >
            @csrf
            @method('put')

            <div class="form-group mt-3">
                <label>Untitulé</label>
            
                    <div class="input-group">
                        <input value="{{$classe->untitule}}" type="text" name="untitule" class="rounded-0 form-control" placeholder="Untitulé" required>
                    </div><!-- input-group -->
        
            </div>
            <div class="form-group mt-3">
                <label>Niveau :</label>
                
                <select name="niveau" class="form-select" required >
                    <option selected value="{{$classe->niveau}}">{{$classe->niveau}}</option>
                    <option value="TC">TC</option>
                    <option value="1BAC">1BAC</option>
                    <option value="2BAC">2BAC</option>
                </select>
                <!-- input-group -->
                
            </div>
            <div class="form-group mt-3">
                <label>Filière :</label>
                <select name="filire" class="form-select" required >
                    <option selected value="{{$classe->filiere}}">{{$classe->filiere}}</option>
                    <option value="S">S (Sciences)</option>
                    <option value="SF">SF (Sciences en Français)</option>
                    <option value="SP">SP (Sciences Physiques)</option>
                    <option value="SEF">SEF (Sciences Expérimentale en Français)</option>
                    <option value="SMF">SMF (Sciences Maths en Francais)</option>
                    <option value="SPF">SPF (Sciences Physiques en francais)</option>
                    <option value="SVT">SVT (Sciences de vie et de terre)</option>
                    <option value="SMAF">SMAF  (Sciences Maths A en Francais)</option>
                    <option value="L">L (Lettre)</option>
                    <option value="SH">SH (Sciences Humaines)</option>
                    <option value="SHF">LSHF (Sciences Humaines en français)</option>
                    <option value="PCOM">PCOM (Profesionnel Commercial)</option>
                    <option value="PS">PS (Profesionnel Service) </option>
                    <option value="PI">PI  (Profesionnel Indistruel)</option>
                </select>
                <!-- input-group -->
        
            </div>
            <div class="form-group mt-3">
                <label>Groupe</label>
                
                <div class="input-group">
                    <input value="{{$classe->group}}" type="number" name="groupe" class="rounded-0 form-control" placeholder="Groupe" required>
                </div><!-- input-group -->
            
            </div>
            <div class="form-group mt-3">
                <input type="submit" class="rounded-0 btn btn-primary bg-base-3 border-0" value="Modifier">
            </div>

        </form>
    </div>

</div> <!-- end col -->
@endsection

