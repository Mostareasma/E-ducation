@extends('layouts.default')
@section('title', '| Cahier de texte')
@section('mainCSS')
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
@endsection
@section('content')
    <div class="shadow mb-5 bg-transparent rounded"><h1 class="text-center lh-lg"><i class="fas fa-clipboard pe-2"></i>MON CAHIER DE TEXTE</h1></div>
    <div class="d-flex justify-content-end mt-5">
        <button type="button" class="btn btn-primary btn-md rounded-pill border-0 bg-base-3 "><a class="text-white" href="{{route('cahiers.create')}}"><i class="bi bi-pencil-square me-3"></i>Ajouter</a></button>
    </div>

	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">				
				<div class="table100 ver6 m-b-110">
					<table data-vertable="ver6">
						<thead>
							<tr class="row100 head">
								<th class="column100 column1" data-column="column1">Classe</th>
								<th class="column100 column2" data-column="column2">Cours</th>
								<th class="column100 column3" data-column="column3">Date</th>
								<th class="column100 column4" data-column="column4">Activités</th>
								<th class="column100 column5" data-column="column5">Remarques</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($cahiers as $cahier)
							<tr class="row100">
								<td class="column100 column1 text-dark" data-column="column1">{{$cahier->classe_cahier}}</td>
								<td class="column100 column2 text-dark" data-column="column2">{{$cahier->cours_cahier}}</td>
								<td class="column100 column3 text-dark" data-column="column3">{{$cahier->date_cahier}}</td>
								<td class="column100 column4 text-dark" data-column="column4">{{$cahier->activite_cahier}}</td>
								<td class="column100 column5 text-dark" data-column="column5">{{$cahier->remarque_cahier}}</td>
							</tr>
                            @endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection
