<div class="modal fade" id="ajouterFichierModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('aos.administration.store')}}" id="fichierForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">nom du fichier:</label>
                        <input type="text" class="form-control" name="nom_fichier" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">description:</label>
                        <textarea class="form-control" id="message-text" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="attachement" class="col-form-label">attachement</label>
                        <input type="file" class="form-control" name="attachement" id="attachement">
                        <input type="hidden" name="hidden_folder_name" id="hidden_folder_name">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="button" class="btn btn-primary" id="saveBtn" value="envoyer">
            </div>
        </div>
    </div>
</div>
