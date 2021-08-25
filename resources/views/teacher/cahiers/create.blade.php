@extends('layouts.default')
@section('title', 'Cahier de texte')
@section('mainCSS')
    <!-- Main CSS-->
@endsection
@section('content')
    <div class="shadow mb-5 bg-body rounded"><h1 class="text-center fs-2 lh-lg">MON CAHIER DE TEXTE</h1></div>
    <form action="{{route('cahiers.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if (Session::has('success'))
        <div class="alert alert-success text-center">
            <p>{{ Session::get('success') }}</p>
        </div>
        @endif
        <table class="table table-bordered" id="dynamicAddRemove">
            <thead class="bg-base-1 fs-5 text-center">
                <tr>
                    <th class="px-2">Classe</th>
                    <th class="px-2">Cours</th>                    
                    <th class="px-2">Date</th>
                    <th class="px-2">Activité</th>
                    <th class="px-2">Remarque</th>
                    <th class="px-2">Action</th>
                </tr>
            </thead>
            <tr>
                <td><input type="text" name="addMoreInputFields[0][classe_cahier]" placeholder="Enter subject" class="rounded-0 form-control" />
                </td>
                <td><input type="text" name="addMoreInputFields[0][cours_cahier]" placeholder="Enter subject" class="rounded-0 form-control" />
                </td>
                <td><input type="text" name="addMoreInputFields[0][date_cahier]" placeholder="Enter subject" class="rounded-0 form-control" />
                </td>
                <td><input type="text" name="addMoreInputFields[0][activite_cahier]" placeholder="Enter subject" class="rounded-0 form-control" />
                </td>
                <td><input type="text" name="addMoreInputFields[0][remarque_cahier]" placeholder="Enter subject" class="rounded-0 form-control" />
                </td>
                <td><button type="button" name="add" id="dynamic-ar" class="rounded-0 btn bg-transparent btn-outline-primary border-0"><i class="far fa-plus-square fs-4" style="color: var(--basecolor-gradient-3);"></i></button></td>
            </tr>
        </table>
        <div class="d-flex justify-content-center col-12">
            <button type="submit" name="submit" class="btn btn-primary rounded-pill px-3 py-2 fs-5 bg-fiche border-0">Valider<i class="bi bi-check-lg px-2"></i></button>
        </div>
    </form>
@endsection

@section('mainJS')
<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="text" name="addMoreInputFields[' + i +
            '][classe_cahier]" placeholder="" class="form-control" /></td><td><input type="text" name="addMoreInputFields[' + i +
            '][cours_cahier]" placeholder="" class="form-control" /></td><td><input type="text" name="addMoreInputFields[' + i +
            '][date_cahier]" placeholder="" class="form-control" /></td><td><input type="text" name="addMoreInputFields[' + i +
            '][activite_cahier]" placeholder="" class="form-control" /></td><td><input type="text" name="addMoreInputFields[' + i +
            '][remarque_cahier]" placeholder="" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>


@endsection