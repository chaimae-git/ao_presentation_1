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
                <form method="post" action="{{route('aos.administration.ajouter_piece_a_preparer')}}">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">nom du piece:</label>
                        <input type="text" class="form-control" name="nom_piece" id="nom_fichier">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="envoyer">
            </div>
        </div>
    </div>
</div>
