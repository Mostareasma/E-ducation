@extends('layouts.default')
@section('title', 'Tableau de bord')
@section('content')

    <!-- start page title -->
    <div class="row align-items-center">
        <div class="col-md-12">
            <div class="shadow-sm p-3 mb-5 bg-body rounded-0">
                <h4 class="font-size-18">Administrateur | Tableau de bord </h4>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item active">Bienvenue, <b>{{Auth::user()->firstname}}</b></li>
                    <li class="breadcrumb-item active">Gérez facilement vos classes , vos élèves, vos cours et vos annonces sur notre plateforme d'enseignement à distance.</li>
                </ol>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="p-3  shadow-sm p-3 mb-5 bg-body rounded-0">
                <div class="row">
                    <div class="col-md-4"><img width="80%" class="m-auto" src="https://img.icons8.com/dusk/64/000000/students.png"/></div>                
                    <div class="col-md-8">
                        <h4>Nombre total des classes</h4>
                    </div>
                    <div class="col-md-4">           
                        <img src="https://img.icons8.com/bubbles/50/000000/statistics.png"/>
                    </div>
                    <div class="col-md-8">
                        <h1>{{Auth::user()->getClassesNb()}}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="p-3 shadow-sm p-3 mb-5 bg-body rounded-0">
                <div class="row">
                    <div class="col-md-4"><img width="80%" class="m-auto" src="https://img.icons8.com/plasticine/100/000000/teacher.png"/></div>                
                    <div class="col-md-8">
                        <h4>Nombre total des enseignants</h4>
                    </div>
                    <div class="col-md-4">           
                        <img src="https://img.icons8.com/bubbles/50/000000/statistics.png"/>
                    </div>
                    <div class="col-md-8">
                        <h1>{{Auth::user()->getTeachersNb()}}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="p-3  shadow-sm p-3 mb-5 bg-body rounded-0">
                <div class="row">
                    <div class="col-md-4"><img width="80%" class="m-auto" src="https://img.icons8.com/carbon-copy/100/000000/student-male.png"/> </div>                
                    <div class="col-md-8">
                        <h4>Nombre total des éleves</h4>
                    </div>
                    <div class="col-md-4">           
                        <img src="https://img.icons8.com/bubbles/50/000000/statistics.png"/>
                    </div>
                    <div class="col-md-8">
                        <h1>{{Auth::user()->getStudentsNb()}}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="p-3  shadow-sm p-3 mb-5 bg-body rounded-0">
                <div class="row">
                    <div class="col-md-4"><img width="70%" class="m-auto" src="https://img.icons8.com/plasticine/100/000000/saving-book.png"/></div>                
                    <div class="col-md-8">
                        <h4>Nombre total des cours</h4>
                    </div>
                    <div class="col-md-4">           
                        <img src="https://img.icons8.com/bubbles/50/000000/statistics.png"/>
                    </div>
                    <div class="col-md-8">
                        <h1>{{Auth::user()->getCoursNb()}}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="p-3  shadow-sm p-3 mb-5 bg-body rounded-0">
                <div class="row">
                    <div class="col-md-4">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                        width="70%"
                        viewBox="0 0 172 172"
                        style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g id="Layer_1"><path d="M118.25,5.375c-0.67187,0 -1.20938,0.26875 -1.88125,0.80625l-80.0875,33.72813c-1.34375,0.5375 -2.6875,1.20938 -4.03125,1.88125c-17.06562,8.46563 -26.60625,27.4125 -23.38125,46.35937l11.55625,69.3375c0.94062,5.24063 5.375,9.1375 10.75,9.1375v0c6.04687,0 10.88437,-4.8375 10.88437,-10.88437v-50.65937l74.30937,31.30938c0.67188,0.5375 1.20938,0.80625 1.88125,0.80625v0v0c6.71875,0 12.09375,-29.42813 12.09375,-65.84375c0,-36.41562 -5.375,-65.97812 -12.09375,-65.97812z" fill="#0b718a"></path><path d="M31.175,170.65625c-7.39062,0 -13.57188,-5.24062 -14.78125,-12.49687l-11.55625,-69.3375c-3.35937,-20.69375 7.12187,-41.52187 25.66563,-50.79375c1.34375,-0.67187 2.6875,-1.34375 4.16563,-1.88125l81.96875,-34.53437c2.01563,-0.80625 4.43437,0.13437 5.24062,2.15c0.80625,2.01563 -0.13437,4.43438 -2.15,5.24063l-81.96875,34.53438c-1.20938,0.5375 -2.55313,1.075 -3.7625,1.74687c-15.45312,7.65938 -24.1875,24.99375 -21.23125,42.19375l11.55625,69.3375c0.5375,3.35938 3.35938,5.77812 6.85313,5.77812c3.7625,0 6.45,-3.09062 6.45,-6.85312v-33.45937c0,-1.34375 1.075,-2.55313 2.28437,-3.35937c1.075,-0.80625 2.55313,-0.94062 3.7625,-0.40313l11.42188,4.70313c2.01563,0.80625 3.09062,3.225 2.28438,5.24063c-0.80625,2.01563 -3.225,3.09062 -5.24062,2.28438l-6.45,-2.41875v27.4125c0,8.19688 -6.31562,14.91563 -14.5125,14.91563z" fill="#444b54"></path><path d="M118.25,141.09375c-0.5375,0 -1.075,-0.13438 -1.6125,-0.26875l-76.05625,-32.11562c-2.01562,-0.80625 -2.95625,-3.225 -2.15,-5.24063c0.80625,-2.01562 3.225,-2.95625 5.24063,-2.15l76.19063,31.98125c2.01563,0.80625 2.95625,3.225 2.15,5.24062c-0.67187,1.6125 -2.15,2.55312 -3.7625,2.55312z" fill="#444b54"></path><path d="M166.625,76.59375h-21.5c-2.28438,0 -4.03125,-1.74688 -4.03125,-4.03125c0,-2.28437 1.74687,-4.03125 4.03125,-4.03125h21.5c2.28438,0 4.03125,1.74688 4.03125,4.03125c0,2.28437 -1.74687,4.03125 -4.03125,4.03125z" fill="#444b54"></path><path d="M137.19688,57.64688c-1.075,0 -2.01562,-0.40313 -2.82188,-1.20938c-1.6125,-1.6125 -1.6125,-4.16562 0,-5.64375l15.18437,-15.18438c1.6125,-1.6125 4.16563,-1.6125 5.64375,0c1.6125,1.6125 1.6125,4.16563 0,5.64375l-15.05,15.18438c-0.80625,0.80625 -1.88125,1.20938 -2.95625,1.20938z" fill="#444b54"></path><path d="M152.51563,110.85938c-1.075,0 -2.01562,-0.40313 -2.82188,-1.20938l-15.31875,-15.18437c-1.6125,-1.6125 -1.6125,-4.16563 0,-5.64375c1.6125,-1.6125 4.16563,-1.6125 5.64375,0l15.18437,15.18438c1.6125,1.6125 1.6125,4.16562 0,5.64375c-0.67187,0.80625 -1.74687,1.20938 -2.6875,1.20938z" fill="#444b54"></path><path d="M114.75625,133.03125c-2.95625,-2.82188 -8.6,-23.65 -8.6,-61.8125c0,-38.1625 5.64375,-58.99062 8.6,-61.8125c2.01563,-0.26875 7.525,-2.01562 7.525,-4.03125c0,-2.28438 -1.74688,-4.03125 -4.03125,-4.03125h-26.875c-5.77813,0 -9.675,6.9875 -12.49688,22.575c-2.28437,12.63125 -3.62812,29.42813 -3.62812,47.3c0,17.87188 1.34375,34.66875 3.62812,47.3c2.82188,15.5875 6.71875,22.575 12.49688,22.575h26.875c2.28437,0 4.03125,-1.74687 4.03125,-4.03125c0,-2.01562 -5.50937,-3.7625 -7.525,-4.03125z" fill="#71c2ff"></path><path d="M128.05937,109.65c-2.15,-0.26875 -4.3,1.20938 -4.56875,3.35938c-2.01562,12.63125 -4.16562,17.60312 -5.24063,19.35c-2.55313,-3.89687 -6.31563,-18.67813 -7.65938,-43.67187c8.86875,-0.94062 15.72188,-8.46563 15.72188,-17.46875c0,-9.00313 -6.85312,-16.52812 -15.72187,-17.33438c1.20937,-24.99375 5.10625,-39.775 7.65937,-43.67187c1.20938,1.88125 3.49375,7.12187 5.50937,20.9625c0.26875,2.15 2.41875,3.7625 4.56875,3.35938c2.15,-0.26875 3.7625,-2.41875 3.35938,-4.56875c-1.88125,-13.30313 -5.10625,-28.62188 -13.4375,-28.62188c-5.77813,0 -9.675,6.9875 -12.49688,22.575c-2.28437,12.63125 -3.62812,29.42813 -3.62812,47.3c0,17.87188 1.34375,34.66875 3.62812,47.3c2.82188,15.5875 6.71875,22.575 12.49688,22.575c6.31562,0 10.34688,-8.33125 13.30312,-26.875c0.26875,-2.15 -1.20937,-4.3 -3.49375,-4.56875z" fill="#444b54"></path></g></g></svg>
                    </div>                
                    <div class="col-md-8">
                        <h4>Nombre total des annonces</h4>
                    </div>
                    <div class="col-md-4">           
                        <img src="https://img.icons8.com/bubbles/50/000000/statistics.png"/>
                    </div>
                    <div class="col-md-8">
                        <h1>{{Auth::user()->getAnnoncesNb()}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection