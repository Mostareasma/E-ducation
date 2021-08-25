<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- site metas -->
   <title>| E-DUCATION</title>
   <!--css -->
   <link rel="stylesheet" href="welcome/css/owl.carousel.min.css">
   <link rel="stylesheet" href="welcome/css/owl.theme.default.min.css">
   <link rel="stylesheet" href="welcome/css/animate.css">
   <link rel="stylesheet" href="welcome/css/style1.css">
   <link rel="stylesheet" href="welcome/css/footer.css">
   <link rel="stylesheet" href="welcome/css/style.css">
   <link rel="stylesheet" href="/css/style.css">
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">      <!-- style css -->
   <!-- Responsive-->
   <link rel="stylesheet" href="welcome/css/responsive.css">
   <a href="https://icons8.com/icon/114182/livret-d'épargne"></a>
   <link rel="stylesheet" href="welcome/fonts/icomoon/style.css">
</head>
<!-- body -->
<body class="main-layout">
   <!-- header -->
   <header>
      <!-- header inner -->
      <div class="header">
         <div class="container">
            <div class="row">
               <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                  <div class="full">
                     <div class="center-desk">
                        <div class="logo">
                           <a href="#">E-DUCATION</a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                  <nav class="navigation navbar navbar-expand-md navbar-dark ">
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                     </button>
                     <div class="collapse navbar-collapse" id="navbarsExample04">
                        <ul class="navbar-nav mr-auto">
                           <li class="nav-item active">
                              <a class="nav-link" href="#">Accueil</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link px-3" href="#contact">A propos</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="#service">Services</a>
                           </li>
                          
                           @if (Route::has('login'))
                           <div class="hidden fixed top-0 right-0 sm:block">
                              @auth
                              <li class="nav-item">
                                 <a href="
                                 @if (Auth::user()->getRole() == 'admin')
                                    {{route('cpanel')}}
                                 @endif
                                 @if (Auth::user()->getRole() == 'teacher')
                                    {{route('cpanel')}}
                                 @endif
                                 @if (Auth::user()->getRole() == 'student')
                                    {{route('studentCours.index')}}
                                 @endif
                                 " class="nav-link">Dashboard</a>
                              </li>
                              @else
                              <li class="nav-item">
                                 <a class="nav-link"href="{{ route('login') }}">Se connecter</a>
                              </li>
                              @endauth
                           </div>
                        @endif
                        </ul>
                     </div>
                  </nav>
               </div>
            </div>
         </div>
      </div>
   </header>
   <!-- end header inner -->
   <!-- end header -->
   <!-- Annonce -->
   <section class="ftco-section body">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="featured-carousel owl-carousel">
               @foreach ($annonces as $annonce)
                  <div class="item">
                     <div class="row justify-content-center">
                        <div class="col-md-11">
                           <div class="testimony-wrap d-md-flex">
                              <div class="img" style="background-image: url({{$annonce->annonce_photo_path}});"></div>
                              <div class="text text-center p-4 py-xl-5 px-xl-5 d-flex align-items-center">
                                 <div class="desc w-100">
                                    <p class="h3 mb-5">{{$annonce->description}}</p>
                                    <div class="pt-4">
                                       <p class="name mb-0">&mdash; {{$annonce->title}}</p>
                                       <span class="position">Administrateur du site</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- end Annonce -->
   <!-- why -->
   <div id="service" class="why">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="titlepage">
                  <h2>Nos Meilleurs Services</h2>
                  <p class="text-center">E DUCATION est une solution numérique d’enseignement à distance. Un site qui offre aux professeurs de nouvelles possibilités d’enseignement numérique. Facile et interactif, cet outil assure la continuité pédagogique des étudiants. Désormais, facilitez l’enseignement de tous les niveaux du cyle secondaire.<br/>Explorez-le pour une meilleure expérience.</p>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
               <div id="box_ho" class="why-box">
                  <i><img src="https://img.icons8.com/nolan/96/e-learning.png"/></i>
                  <h3>Cours</h3>
                  <p>Un contact permanent qui favorise l'enseignement à distance. <br/><br/>Échangez en direct avec la classe entière ou avec vos élèves individuellement. </p>
               </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
               <div class="why-box">
                  <i><img src="https://img.icons8.com/nolan/96/my-homework.png"/></i>
                  <h3>Exercice</h3>
                  <p>Préparez des exercices et envoyer les à vos élèves. Garder les apprenants toujours motivés. <br/>Vous receverez également les travaux rendus!<br/>Chers élèves, soyez vigilents!</p>
               </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
               <div class="why-box">
                  <i><img src="https://img.icons8.com/nolan/96/book-and-pencil.png"/></i>
                  <h3>Espace Pédagogique</h3>
                  <p>Une solution numérique très facile à prendre en main. Des interfaces conçues pour les professeurs et leurs élèves de tout âge. <br/>Vos documents sont maintenant accessibles via notre site.</p>
               </div>
            </div>
         </div>
      </div>
   </div>
<!--  footer -->
<footer class="footer-59391" id="contact">
   <div class="container"> 
      <div class="row mb-5">
         <div class="col-md-6 footer-widget footer-left-widget">
            <div class="section-heading">
               <h3 class="">Liens Directs</h3>
               <span class="animate-border border-black"></span>
            </div>
            <ul>
               <li>
                  <a href="#">A propos</a>
               </li>
               <li>
                  <a href="#">Services</a>
               </li>
               <li>
                  <a href="#">Notre équipe</a>
               </li>
            </ul>
         </div>  
         <div class="col-md-6 footer-widget">
            <div class="section-heading">
               <h3 class="">Suivez Nous !</h3>
               <span class="animate-border border-black"></span>
            </div>
            <ul class="list-unstyled social-icons">
               <li><a href="#" class="fb"><span class="icon-facebook"></span></a></li>
               <li><a href="#" class="tw"><span class="icon-twitter"></span></a></li>
               <li><a href="#" class="in"><span class="icon-instagram"></span></a></li>
            </ul>
         </div>
      </div>
   </div>
</footer>
<footer>
   <div class="row px-2 py-2">
      <div class="col ">
      <div class="copyright text-center">
         <p>&copy; Copyright 2021. All Rights Reserved.</p>
      </div>
      </div>
   </div>
</footer>
<!-- end footer -->

   <!---------------------------------------------->
   <!-- Javascript files-->
   <!-- JavaScript Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
   <script src="welcome/js/jquery.min.js"></script>
   <script src="welcome/js/jquery-3.0.0.min.js"></script>
   <script src="welcome/js/plugin.js"></script>
   <script src="welcome/js/main.js"></script>

   <!-- sidebar -->
</body>
</html>

