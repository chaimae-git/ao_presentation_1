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
                        <legend class="scheduler-border text-capitalize" style="font-size:18px">Liste Des Pieces a Preparer </legend>
                        <div class="p-3">
                            @foreach($pieces_a_preparer as $piece)
                                <div class="mb-3">
                                    <input type="checkbox"> <label for="">{{$piece->nom_fichier}}</label>
                                </div>
                            @endforeach
                        </div>
                    </fieldset>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary ajouter_piece_a_preparer" data-toggle="modal" data-target="#ajouterPieceModal" data-whatever="@getbootstrap">Ajouter une piece</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




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
            ajax: "{{ route('books.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'title', name: 'title'},
                {data: 'author', name: 'author'},
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
            var book_id = $(this).data('id');
            $.get("{{ route('books.index') }}" +'/' + book_id +'/edit', function (data) {
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
            $(this).html('Save');

            $.ajax({
                data: $('#bookForm').serialize(),
                url: "{{ route('books.store') }}",
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

            var book_id = $(this).data("id");
            confirm("Are You sure want to delete !");

            $.ajax({
                type: "DELETE",
                url: "{{ route('books.store') }}"+'/'+book_id,
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
