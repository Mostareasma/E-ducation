<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!---BOOTSTRAP ICONS--->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/5fdfb057c8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    @yield('fonts')
    <!-- Main CSS -->
    <link rel="stylesheet" type="text/css" href="/css/style.css">    

    <link href="/assets/datatables.bundle.css" rel="stylesheet" type="text/css" />

    @yield('mainCSS')
    <!-- Title -->
    <title>@yield('title', env('APP_NAME'))</title> <!--donner un titre par defaut-->
</head>
<body class="body">
    
    <nav class="navbar navbar-expand-lg navbar-light bg-base shadow-none mb-5" aria-label="">
        <div class="container-fluid">
            <a class="rounded-0 btn  text-light" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-justify" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
                </svg>
            </a>
            
            <a class="navbar-brand text-white navbar-title text-decoration-none" href="{{url('/')}}"><i class="fas fa-graduation-cap text-decoration-none text-white fs-2"></i>E-DUCATION</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-caret-down text-light"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav">
                    <div class="rounded-0 btn -group dropstart">
                        <div class="dropdown">
                            <button class="rounded-0 btn dropdown-toggle profilpic" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="d-flex">
                                    <img class="rounded-circle bg-white me-3" height="40px" width="40px" src="{{Auth::user()->profile_photo_path}}" alt="">
                                    <strong class="text-light text-center" style="margin-top: 0.33rem !important;">{{Auth::user()->fullname()}}</strong>
                                </div>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li class="nav-item">
                                    <a class="dropdown-item nav-link text-dark nav-link-title fs-7" href="{{ route('profile.index') }}"><i class="bi bi-person-circle text-primary me-3"></i>Mon profil</a>
                                </li>
                                <li class="nav-item">
                                    <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item nav-link text-dark nav-link-title fs-7" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                        <i class="bi bi-arrow-right-circle-fill text-danger me-3"></i>Déconnexion
                                    </a>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </nav>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        
        <div class="offcanvas-header border-bottom bg-base text-light">
            <h5 class=" ml-3 text-center">
                <i class="fas fa-graduation-cap fs-2"></i>
                E-DUCATION
            </h5>
            <button type="button" class="rounded-0 btn -close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <section class="p-4"></section>
            @if(Auth::user()->getRole() == 'admin')
                <div class="accordion accordion-flush border-top" id="accordionFlushExample">
                    
                    <div class="accordion-item pt-3 pb-3">
                        <a href="{{route('cpanel')}}" class="text-secondary text-dark p-3">
                            Tableau de bord
                        </a>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Classes
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body" id="sidebar">
                                <ul class="list-group border-none" >
                                    <a href="{{route('classes.index')}}" class="text-secondary" aria-current="true"><i class="fas fa-users me-3"></i>Liste des classes</a>
                                    <hr>
                                    <a href="{{route('classes.create')}}" class="text-secondary" aria-current="true"><i class="bi bi-plus-circle me-3"></i>Créer une classe</a>
                                </ul> 
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item"> 
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        Enseignant
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="list-group border-none">
                                <a href="{{route('teachers.index')}}" class="text-secondary" aria-current="true"><i class="fas fa-user me-3"></i>Liste des enseignants</a>
                                <hr>
                                <a href="{{route('teachers.create')}}" class="text-secondary" aria-current="true"><i class="bi bi-plus-circle me-3"></i>Ajouter un enseignant</a>
                            </ul>
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            Elèves
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="list-group border-none">
                                <a href="{{route('students.index')}}" class="text-secondary" aria-current="true"><i class="fas fa-user me-3"></i>Liste des élèves</a>
                                <hr>
                                <a href="{{route('students.create')}}" class="text-secondary" aria-current="true"><i class="bi bi-plus-circle me-3"></i>Ajouter un élève</a>
                            </ul> 
                        </div>        
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading4">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse4" aria-expanded="false" aria-controls="flush-collapse4">
                                Cours
                            </button>
                        </h2>
                        <div id="flush-collapse4" class="accordion-collapse collapse" aria-labelledby="flush-heading4" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul class="list-group border-none">
                                    <a href="{{route('cours.index')}}" class="text-secondary" aria-current="true"><i class="bi bi-book me-3"></i>Liste des cours</a>
                                    <hr>
                                    <a href="{{route('cours.create')}}" class="text-secondary" aria-current="true"><i class="bi bi-plus-circle me-3"></i>Créer un cours</a>
                                </ul> 
                            </div>        
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading5">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse5" aria-expanded="false" aria-controls="flush-collapse5">
                                Annonces
                            </button>
                        </h2>
                        <div id="flush-collapse5" class="accordion-collapse collapse" aria-labelledby="flush-heading5" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul class="list-group border-none">
                                    <a href="{{route('annonces.index')}}" class="text-secondary" aria-current="true"><i class="bi bi-megaphone me-3"></i>Liste des annonces</a>
                                    <hr>
                                    <a href="{{route('annonces.create')}}" class="text-secondary" aria-current="true"><i class="bi bi-plus-circle me-3"></i>Créer une annonce</a>
                                </ul> 
                            </div>        
                        </div>
                    </div>
                </div>
            @endif
            @if(Auth::user()->getRole() == 'teacher')
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item pt-3 pb-3">
                    <a href="{{route('cpanel')}}" class="text-secondary text-dark p-3">
                        <img src="https://img.icons8.com/color/30/000000/dashboard-layout.png" class="pe-2"/>Tableau de bord
                    </a>
                </div>
                <div class="accordion-item pt-3 pb-3">
                    <a href="{{route('mescours.index')}}" class="text-secondary text-dark p-3">
                        <img src="https://img.icons8.com/ultraviolet/30/000000/classroom.png" class="pe-2"/>Mes classes
                    </a>
                </div>
                <div class="accordion-item pt-3 pb-3">
                    <a href="{{route('fiches.index')}}" class="text-secondary text-dark p-3">
                        <img src="https://img.icons8.com/cute-clipart/30/000000/document.png" class="pe-2"/>Mes fiches
                    </a>
                </div>
                <div class="accordion-item pt-3 pb-3">
                    <a href="{{route('cahiers.index')}}" class="text-secondary text-dark p-3">
                        <img src="https://img.icons8.com/ultraviolet/30/000000/book-shelf.png" class="pe-2"/>Mon cahier de texte
                    </a>
                </div>
            </div> 
                 
            @endif
            @if(Auth::user()->getRole() == 'student')
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item pt-3 pb-3">
                        <a href="{{route('studentCours.index')}}" class="text-secondary text-dark p-3">
                            Cours
                        </a>
                    </div>
                </div> 
            @endif
        </div>
    </div>
    <div class="wrapper">
        <div id="content" class="content">
            <div class="ml-3 mr-3 pb-5 mt-0">
            <main role="main">
                <div class="container">
                   @yield('content')
                </div>
            </main>
            </div>
        </div>
    @yield('')

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous">
    </script>
    <!-- Main JS -->

    <script src="/swiper/js/swiper-bundle.min.js"></script>
    <script src="/assets/jquery-3.6.0.min.js"></script>
    <script src="/assets/datatables.bundle.js"></script>
    <script src="/js/appl.js"></script>
    <script>
         $('#datatable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
            }
        });
    </script>
    @yield('mainJS')
</body>
</html>