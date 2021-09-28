<div class="modal fade" wire:ignore.self id="addDocumentFinanciereModal">
    <div class="modal-dialog" data-backdrop='static' data-keyboard='false'>
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ajouter un Document</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formAddDocumentFinanciereModal" enctype="multipart/form-data" wire:submit.prevent="saveDocumentFinanciere">
                    @csrf
                    <input type="hidden" wire:model="partie">
                    <div class="form py-2">
                        <div class="form-group mb-3">
                            <label for="nom_fichier">Nom Du Document</label>
                            <input type="text" class="form-control" placeholder="Nom du Document" wire:model="nom_fichier">
                            @error('nom_fichier') <span class="error text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="nom_fichier">Document</label>
                            <input type="file" class="form-control" wire:model="fichier">
                            @error('fichier') <span class="error text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="nom">Description</label>
                            <textarea cols="15" class="form-control" placeholder="description" wire:model="description"></textarea>
                            @error('description') <span class="error text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Ajouter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
