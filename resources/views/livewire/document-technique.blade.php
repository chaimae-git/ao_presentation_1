<div class="card card-default">
    <div class="card-header d-flex justify-content-between">
        <div>Documents Techniques</div>
        <div class="text-primary ml-auto" style="cursor:pointer; font-size:16px; font-weight: bold" wire:click="openAddDocumentTechniqueModal()"><i class="fas fa-folder-plus"  style="font-size:20px"></i></div>
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
                            <a href="javascript:void(0)" class="text-danger" wire:click="deleteConfirmFichierTechnique({{$fichier->id}})"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @include('modals.documents.technique.ajouter')

        <script>

            window.addEventListener('openAddDocumentTechniqueModal', function(e){
                $("#addDocumentTechniqueModal").find('span.error').html('');
                $("#addDocumentTechniqueModal").find('form')[0].reset();
                $("#addDocumentTechniqueModal").modal('show');
            });


            window.addEventListener('closeAddDocumentTechniqueModal', function(e){
                //@this.position = 'todo_list';
                $("#addDocumentTechniqueModal").find('span.error').html('');
                $("#addDocumentTechniqueModal").find('form')[0].reset();
                $("#addDocumentTechniqueModal").modal('hide');
                Swal.fire(
                    'Added!',
                    'DocumentTechnique has been Added.',
                    'success'
                )
            });

            window.addEventListener('swalConfirmFichierTechnique', function(e){
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
                        window.livewire.emit('deleteFichierTechnique', e.detail.id)
                    }
                });
            });

            window.addEventListener('deletedFichierTechnique', function(e){
                Swal.fire(
                    'Deleted!',
                    'Piece A Preparer has been deleted.',
                    'success'
                )
            });

            $('#addDocumentTechniqueModal').modal({backdrop:'static', keyboard:false, show:false});
        </script>
    </div>

</div>





