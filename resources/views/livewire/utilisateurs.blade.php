<div class="content-form-body bg-white mx-3 ">
    <div class="content ">
        <div class="panel-heading border-0 d-flex justify-content-between align-items-center bg-blue-light p-2 pl-3 bg-white">
            <div>
                <h4></h4>
            </div>
            <div class="button">
                <a href="javascript:void(0)" class="btn btn-outline-info" id="buttonAddUtilisateurModal" wire:click="openAddUtilisateurModal">Ajouter un utilisateur</a>
            </div>
        </div>

        <div class="card-body">
            @include('flash')

            <table class='table table-striped'>
                <thead>
                <tr>
                    <th>#</th>
                    <th>nom et prénom</th>
                    <th>statut</th>
                    <th>nom d'utilisateur</th>
                    <th>émail</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($utilisateurs as $utilisateur)
                    <tr>
                        <td>{{$utilisateur->id}}</td>
                        <td>{{$utilisateur->nom_prenom}}</td>
                        <td>{{$utilisateur->statut->statut}}</td>
                        <td>{{$utilisateur->username}}</td>
                        <td>{{$utilisateur->email}}</td>
                        <td>
                            <a href="javascript:void(0)"><i class="fas fa-eye"></i></a>
                            <a href="javascript:void(0)" wire:click="openEditUtilisateurModal({{$utilisateur->id}})"><i class="fas fa-edit"></i></a>
                            <a href="javascript:void(0)" wire:click="deleteConfirm({{$utilisateur->id}})"><i class="fas fa-trash-alt"></i></a>
                        </td>


                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
    @include('modals.utilisateurs.ajouter')
    @include('modals.utilisateurs.editer')
</div>
@push('scripts')
    <script>
        window.addEventListener('openAddUtilisateurModal', function(e){
            $("#addUtilisateurModal").find('span.error').html('');
            $("#addUtilisateurModal").find('form')[0].reset();
            $("#addUtilisateurModal").modal('show');
        });

        window.addEventListener('closeAddUtilisateurModal', function(e){
            $("#addUtilisateurModal").find('span.error').html('');
            $("#addUtilisateurModal").find('form')[0].reset();
            $("#addUtilisateurModal").modal('hide');
            Swal.fire(
                'Added!',
                'Utilisateur has been Added.',
                'success'
            )
        });

        window.addEventListener('closeEditUtilisateurModal', function(e){
            $("#editUtilisateurModal").find('span.error').html('');
            $("#editUtilisateurModal").find('form')[0].reset();
            $("#editUtilisateurModal").modal('hide');
            Swal.fire(
                'Updated!',
                'Utilisateur has been Updated.',
                'success'
            )
        });

        window.addEventListener('openEditUtilisateurModal', function(e){
            $("#addUtilisateurModal").find('span.error').html('');
            $("#editUtilisateurModal").modal('show');
        });

        window.addEventListener('swalConfirm', function(e){
            swal.fire({
                title:e.detail.title,
                html:e.detail.html,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                allowOutsideClick:false,
            }).then((result) => {
                if (result.isConfirmed) {
                    window.livewire.emit('delete', e.detail.id)
                }
            });
        });

        window.addEventListener('deleted', function(e){
            Swal.fire(
                'Deleted!',
                'Utilisateur has been deleted.',
                'success'
            )
        });

        $('#addUtilisateurModal').modal({backdrop:'static', keyboard:false, show:false});
        $('#editUtilisateurModal').modal({backdrop:'static', keyboard:false, show:false});

    </script>
@endpush
