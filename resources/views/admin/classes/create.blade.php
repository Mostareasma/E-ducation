@extends('layouts.default')
@section('title', 'Créer une classe')
@section('content')
<div class="col-lg-12 mt-5">
    <div class="shadow-sm p-3 mb-5 bg-body rounded-1">
        <h4 class="text-large"><img src="https://img.icons8.com/ios/40/000000/class.png" class="pe-1"/>Classe</h4>
        <p >Créer une classe</p>

        <form action="{{route('classes.store')}}" method="POST" >
            @csrf
            <div class="form-group mt-3">
                <label>Intitulé :</label>
            
                    <div class="input-group">
                        <input type="text" name="untitule" class="rounded-0 form-control" placeholder="Intitulé" required>
                    </div><!-- input-group -->
        
            </div>
            <div class="form-group mt-3">
                <label>Niveau :</label>
                
                <select name="niveau" class="form-select" required >
                    <option value="TC">TC</option>
                    <option value="1BAC">1BAC</option>
                    <option value="2BAC">2BAC</option>
                </select>
                <!-- input-group -->
                
            </div>
            <div class="form-group mt-3">
                <label>Filière :</label>
                <select name="filire" class="form-select" required >
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
                <label>Groupe :</label>
                
                <div class="input-group">
                    <input type="number" name="groupe" class="rounded-0 form-control" placeholder="Groupe" required>
                </div><!-- input-group -->
            
            </div>
            <div class="form-group mt-3">
                <input type="submit" class="rounded-0 btn btn-primary bg-base-3 border-0" value="Ajouter">
            </div>

        </form>
    </div>

</div> <!-- end col -->
@endsection

