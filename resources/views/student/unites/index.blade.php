@extends('layouts.default')
@section('title', 'Unités de cours')
@section('content')
<div class="row align-items-center">
    <div class="shadow mb-5 bg-transparent rounded"><h1 class="text-center lh-lg"><i class="fas fa-list pe-2"></i>Unités</h1></div>

    @foreach ($unites as $unite)
        <div class="col-lg-4">
            <div class="p-3 shadow-sm p-3 mb-5 bg-body rounded-0">
                    <div class="m-auto" style="max-width:30%"><img width="100%" src="https://img.icons8.com/plasticine/100/000000/sugar-cubes.png"/></div>                
                    <div>
                        <a classe="text-decoration-none" href="{{route('studentCoursUniteContent.show',$unite->id)}}">
                            <h4 class="text-center">Unité {{$unite->number}} : {{$unite->intitule}}</h4>
                        </a>
                    </div>
                    <div>
                        <p  class="text-center">{{$unite->description}}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
</div>
@endsection