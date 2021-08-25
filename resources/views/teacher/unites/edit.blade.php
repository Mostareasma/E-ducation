@extends('layouts.default')
@section('title', '| Modifier une unité')
@section('content')
<div class="shadow mb-5 bg-transparent rounded"><h1 class="text-center lh-lg"><i class="fad fa-books pe-2"></i>Unités</h1></div>

<div class="col-lg-12 mt-5">
    <div class="card">
        <div class="card-body">
            <p class="card-title-desc"><img src="https://img.icons8.com/wired/40/000000/add-property.png" class="pe-2"/><span class="fs-5 text-uppercase fw-bold">Modification - unité</span></p>
            <form action="{{route('unites.update' , $unite->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="d-flex">
                    <div class="d-flex col-6 form-group mt-3">
                        <label class="col-3 pt-1 fw-bold">Cours :</label>

                        <div class="input-group pe-3">
                            <select name="cour_id" class="form-select" id="">
                                <option selected value="{{$unite->cour_id}}">{{$unite->cours_intitule}}</option>
                                @foreach ($cours as $cour)
                                    <option value="{{$cour->id}}">{{$cour->intitule}}</option>
                                @endforeach
                            </select>
                        </div><!-- input-group -->
                    </div>

                    <div class="d-flex col-6 form-group mt-3">
                        <label class="col-4 pt-1 fw-bold">Numéro de l'unité :</label>
                    
                        <div class="input-group">
                            <input value="{{$unite->number}}" type="number" name="number" class="rounded-0 form-control" placeholder="Nombre d'unité" required>
                        </div><!-- input-group -->
                    </div>
                </div>
                
                <div class="form-group mt-3">
                    <label class="pb-1 fw-bold">Intitulé :</label>
            
                    <div class="input-group">
                        <input value="{{$unite->intitule}}" type="text" name="intitule" class="rounded-0 form-control" placeholder="Nom" required>
                    </div><!-- input-group -->
        
                </div>

                <div class="form-group mt-3">
                    <label class="pb-1 fw-bold">Description :</label>
                
                    <div class="input-group">
                        <input value="{{$unite->description}}" type="text" name="description" class="rounded-0 form-control" placeholder="Apropos de ce cours" required>
                    </div><!-- input-group -->
                
                </div>
                
                <div class="form-group mt-3">
                    <button type="submit" name="submit" class="btn btn-primary border-0 bg-base-3 p-2 fw-bold">MODIFIER<i class="fad fa-pencil-paintbrush fs-5 ps-2"></i></button>
                </div>

            </form>
        </div>
    </div>

</div> <!-- end col -->
@endsection

