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
                            <td>{{$bu->nom}}</td>
                            <td>{{$bu->description}}</td>
                            <td>
                                <a href="javascript:void(0)" wire:click="openEditBuModal({{$bu->id}})"><i class="fas fa-edit"></i></a>
                                <a href="javascript:void(0)" wire:click="deleteConfirm({{$bu->id}})"><i class="fas fa-trash-alt"></i></a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('modals.bus.ajouter')
    @include('modals.bus.editer')
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
            Swal.fire(
                'Added!',
                'BU has been Added.',
                'success'
            )
        });

        window.addEventListener('closeEditBuModal', function(e){
            $("#editBuModal").find('span.error').html('');
            $("#editBuModal").find('form')[0].reset();
            $("#editBuModal").modal('hide');
            Swal.fire(
                'Updated!',
                'BU has been Updated.',
                'success'
            )
        })

        window.addEventListener('openEditBuModal', function(e){
            $("#addBuModal").find('span.error').html('');
            $("#editBuModal").modal('show');
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
                'Bu has been deleted.',
                'success'
            )
        });

        $('#addBuModal').modal({backdrop:'static', keyboard:false, show:false});
        $('#editBuModal').modal({backdrop:'static', keyboard:false, show:false});

    </script>
@endpush
