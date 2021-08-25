@extends('layouts.default')
@section('title', 'Mes Cours')
@section('content')
    <div class="shadow mb-5 bg-transparent rounded"><h1 class="text-center lh-lg"><i class="fas fa-list pe-2"></i>Leçons</h1></div>
    <div class="row">
        @foreach ($lessons as $lesson)
            <div class="col-lg-4">
                <div class="p-3 shadow-sm p-3 mb-5 bg-body rounded-0">
                    <div class="m-auto" style="max-width:30%">
                        <img 
                            width="100%" 
                            src="https://img.icons8.com/carbon-copy/100/000000/saving-book.png"
                        />
                    </div>
                    <div>
                        <a class="text-decoration-none" href="{{$lesson->support_pth}}" download>
                            <h4 class="text-center">{{$lesson->title}}</h4>
                        </a>
                    </div>
                    <div>
                        <p  class="text-center">{{Str::limit($lesson->note , 125 , '...')}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="shadow mb-5 bg-transparent rounded"><h1 class="text-center lh-lg"><i class="fas fa-tasks pe-2"></i>Exercices à faire</h1></div>

    <div class="row">
        @foreach ($exercices as $exercice)
            <div class="col-lg-4">
                <div class="p-3 shadow-sm p-3 mb-5 bg-body rounded-0">
                    <div class="m-auto" style="max-width:30%">
                        <img 
                            width="100%" 
                            src="https://img.icons8.com/plasticine/100/000000/to-do.png"
                        />
                    </div>
                    <div>
                        <a classe="text-decoration-none" href="{{$exercice->support_pth}}" download>
                            <h4 class="text-center">{{$exercice->title}}</h4>
                        </a>
                    </div>
                    <div>
                        <p  class="text-center">{{Str::limit($exercice->note , 125 , '...')}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection