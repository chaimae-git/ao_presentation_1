<div class="content-form-body bg-white mx-3 ">
    <div class="content ">
        <div class="panel-heading border-0 d-flex justify-content-between align-items-center bg-blue-light p-2 pl-3 bg-white">
            <div>
                <h4 class="text-gray-dark m-0" style="font-size:25px; font-weight:bold">Business Units</h4>
            </div>
            <div class="button">
                <a href="javascript:void(0)" class="btn btn-outline-info" wire:click="openAddBuModal" id="buttonAddBuModal">Ajouter un BU</a>
            </div>
        </div>

        <div class="panel-body rounded bg-white">
            @include('flash')
            <table class='table table-striped'>
                <thead>
                <tr>
                    <th>Business Unit</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($bus as $bu)
                        <tr>
                            <td>{{$bu->id}}</td>
                            <td>{{$bu->nom}}</td>
                            <td>{{$bu->description}}</td>
                            <td>
                                <a href="{{route('bus.editer', $bu)}}"><i class="fas fa-edit"></i></a>
                                <a href="{{route('bus.editer', $bu)}}"><i class="fas fa-trash-alt"></i></a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('modals.bus.ajouter')
</div>


@push('scripts')
    <script>
        window.addEventListener('openAddBuModal', function(e){
            $("#addBuModal").find('span.error').html('');
            $("#addBuModal").find('form')[0].reset();
            $("#addBuModal").modal('show');
        });

        window.addEventListener('closeAddBuModal', function(e){
            $("#addBuModal").find('span.error').html('');
            $("#addBuModal").find('form')[0].reset();
            $("#addBuModal").modal('hide');
            alert('BU ajouté avec succée');
        })

        window.addEventListener('openEditBuModal', function(e){
            alert('hello');
        });

        $('#addBuModal').modal({backdrop:'static', keyboard:false, show:false});
        $('#editBuModal').modal({backdrop:'static', keyboard:false, show:false});

    </script>
@endpush
