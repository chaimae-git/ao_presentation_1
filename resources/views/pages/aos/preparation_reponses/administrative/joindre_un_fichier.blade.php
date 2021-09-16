@extends('layouts.admin_layout')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading d-flex justify-content-between align-items-center bg-blue-light p-2 pl-3">
            <div>
                <h4 class="text-gray-dark m-0" style="font-size:20px">Ajouter un AO</h4>
            </div>
            <div class="button">
                <a href="{{route('aos.consulter')}}" class="btn bg-blue-button rounded text-white">Consulter les AOs</a>
            </div>
        </div>
        <div class="panel-body px-3 border">
            <div class="row py-5">
                <div class="aside col-3">
                    <div class="h-100 border">
                        <div class="titre bg-blue p-2 py-3 mb-0">
                            <h4 class="text-capitalize m-0 text-center" style="font-size:18px">préparation réponse</h4>
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item border-right-0 border-top-0 border-left-0">list</li>
                            <li class="list-group-item border-right-0 border-top-0 border-left-0">list</li>
                            <li class="list-group-item border-right-0 border-top-0 border-left-0">list</li>
                            <li class="list-group-item border-right-0 border-top-0 border-left-0">list</li>
                            <li class="list-group-item border-right-0 border-top-0 border-left-0">list</li>
                            <li class="list-group-item border-right-0 border-top-0 border-left-0">list</li>
                        </ul>
                    </div>

                </div>
                <div class="form col-9 border p-3 py-5">
                    <fieldset class="p-3 border scheduler-border mb-3">
                        <legend class="scheduler-border text-capitalize" style="font-size:18px">Liste Des Pieces Incluses </legend>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Nom de la Pièce</th>
                                <th>Description</th>
                                <th>Visualiser</th>
                                <th>Supprimer</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($fichiers as $fichier)
                            <tr>
                                <td>{{$fichier->nom}}</td>
                                <td>{{$fichier->description}}</td>
                                <td></td>
                                <td>
                                    <form action="">
                                        @method('DELETE')
                                        <input class="btn btn-danger" type="submit" value="supprimer">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </fieldset>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary ajouter_fichier" data-toggle="modal" data-target="#ajouterFichierModal" data-whatever="@getbootstrap">Ajouter un fichier</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('pages.aos.preparation_reponses.administrative.joindre_fichier_modal')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('aos.administration.index', $ao) }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'nom_fichier', name: 'nom_fichier'},
                {data: 'description', name: 'description'},
                {data: 'attachement', name: 'attachement'},
                {data: 'hidden_folder_name', name: 'hidden_folder_name'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
        $('#createNewBook').click(function () {
            $('#saveBtn').val("create-book");
            $('#book_id').val('');
            $('#bookForm').trigger("reset");
            $('#modelHeading').html("Create New Book");
            $('#ajaxModel').modal('show');
        });
        $('body').on('click', '.editBook', function () {
            var fichier_id = $(this).data('id');
            $.get("{{ route('aos.administration.index', $ao) }}" +'/' + fichier_id +'/edit', function (data) {
                $('#modelHeading').html("Edit Book");
                $('#saveBtn').val("edit-book");
                $('#ajaxModel').modal('show');
                $('#book_id').val(data.id);
                $('#title').val(data.title);
                $('#author').val(data.author);
            })
        });
        $('#saveBtn').click(function (e) {
            e.preventDefault();
            console.log("save clicked");
            $(this).html('Save');

            $.ajax({
                data: $('#fichierForm').serialize(),
                url: "{{ route('aos.administration.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {

                    $('#bookForm').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    table.draw();

                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Save Changes');
                }
            });
        });

        $('body').on('click', '.deleteBook', function () {

            var fichier_id = $(this).data("id");
            confirm("Are You sure want to delete !");

            $.ajax({
                type: "DELETE",
                url: "{{ route('aos.administration.store') }}"+'/'+fichier_id,
                success: function (data) {
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });

    });
</script>
