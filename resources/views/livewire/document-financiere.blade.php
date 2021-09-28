<div class="card card-default">
    <div class="card-header d-flex justify-content-between">
        <div>Documents Financieres</div>
        <div class="text-primary ml-auto" style="cursor:pointer; font-size:16px; font-weight: bold" wire:click="openAddDocumentFinanciereModal()"><i class="fas fa-folder-plus"  style="font-size:20px"></i></div>
    </div>
    <div class="card-body p-2 pb-3">
        <div class="niceScroll" style="height:266px; overflow:hidden">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Documents</th>
                    <th>Description</th>
                    <th style="width:15%">Action</th>
                </tr>
                </thead>
                <tbody class="niceScroll">
                @foreach($fichiers as $fichier)
                    <tr>
                        <td>{{$fichier->nom_fichier}}</td>
                        <td>{{$fichier->description}}</td>
                        <td>
                            <a href="{{route('aos.download_file')}}?file={{$fichier->path}}" target="_blank" class="text-success"><i class="fas fa-file-download"></i></a>
                            <a href="javascript:void(0)" class="text-danger" wire:click="deleteConfirmFichierFinanciere({{$fichier->id}})"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @include('modals.documents.financiere.ajouter')

        <script>

            window.addEventListener('openAddDocumentFinanciereModal', function(e){
                $("#addDocumentFinanciereModal").find('span.error').html('');
                $("#addDocumentFinanciereModal").find('form')[0].reset();
                $("#addDocumentFinanciereModal").modal('show');
            });


            window.addEventListener('closeAddDocumentFinanciereModal', function(e){
                //@this.position = 'todo_list';
                $("#addDocumentFinanciereModal").find('span.error').html('');
                $("#addDocumentFinanciereModal").find('form')[0].reset();
                $("#addDocumentFinanciereModal").modal('hide');
                Swal.fire(
                    'Added!',
                    'Document Financiere has been Added.',
                    'success'
                )
            });


            window.addEventListener('swalConfirmFichierFinanciere', function(e){
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
                        window.livewire.emit('deleteFichierFinanciere', e.detail.id)
                    }
                });
            });

            window.addEventListener('deletedFichierFinanciere', function(e){
                Swal.fire(
                    'Deleted!',
                    'Document has been deleted.',
                    'success'
                )
            });

            $('#addDocumentFinanciereModal').modal({backdrop:'static', keyboard:false, show:false});
            $('#editDocumentFinanciereModal').modal({backdrop:'static', keyboard:false, show:false});
        </script>
    </div>

</div>





