<div class="content-form-body bg-white mx-3 ">
    <div class="content ">
        <div class="panel-heading border-0 d-flex justify-content-between align-items-center bg-blue-light p-2 pl-3 bg-white">
            <div>
                <h4 class="text-gray-dark m-0" style="font-size:25px; font-weight:bold">Départements</h4>
            </div>
            <div class="button">
                <a href="javascript:void(0)" class="btn btn-outline-info" wire:click="openAddDepartementModal" id="buttonAddDepartementModal">Ajouter un Département</a>
            </div>
        </div>

        <div class="panel-body rounded bg-white">
            @include('flash')
            <table class='table table-striped'>
                <thead>
                <tr>
                    <th>#</th>
                    <th>nom</th>
                    <th>BU</th>
                    <th>description</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($departements as $departement)
                        <tr>
                            <td>{{$departement->id}}</td>
                            <td>{{$departement->nom}}</td>
                            <td>{{$departement->bu->nom}}</td>
                            <td>{{$departement->description}}</td>
                            <td>
                                <a href="{{route('departements.editer', $departement)}}"><i class="fas fa-edit"></i></a>
                                <a href="{{--route('departements.supprimer', $departement)--}}"><i class="fas fa-trash-alt"></i></a>
                            </td>

                        </tr>
                    @endforeach
            </tbody>
        </table>
        </div>
    </div>
    @include('modals.departements.ajouter')
</div>
@push('scripts')
    <script>
        window.addEventListener('openAddDepartementModal', function(e){
            $("#addDepartementModal").find('span.error').html('');
            $("#addDepartementModal").find('form')[0].reset();
            $("#addDepartementModal").modal('show');
        });

        window.addEventListener('closeAddDepartementModal', function(e){
            $("#addDepartementModal").find('span.error').html('');
            $("#addDepartementModal").find('form')[0].reset();
            $("#addDepartementModal").modal('hide');
            alert('departement ajouté avec succée');
        })

        window.addEventListener('openEditDepartementModal', function(e){
        });

        $('#addDepartementModal').modal({backdrop:'static', keyboard:false, show:false});
        $('#editDepartementModal').modal({backdrop:'static', keyboard:false, show:false});

    </script>
@endpush
