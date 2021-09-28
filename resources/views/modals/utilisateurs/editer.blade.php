<div class="modal fade" wire:ignore.self id="editUtilisateurModal">
    <div class="modal-dialog modal-xl" data-backdrop='static' data-keyboard='false'>
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editer l'utilisateur</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="update" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" wire:model="u_id">
                    <div class="form py-2">
                        <div class="row">
                            <div class="form-group mb-3 col-md-6">
                                <label for="nom">Nom et Prénom</label>
                                <input type="text" class="form-control" wire:model="u_nom_prenom" placeholder="nom & prenom">
                                @error('u_nom_prenom') <span class="error text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group mb-3 col-md-6">
                                <label for="statut_id">Statut</label>
                                <select class="form-control" wire:model="u_statut_id">
                                    <option value="">séléctionner le statut</option>
                                    @foreach($statuts as $statut)
                                        <option value="{{$statut->id}}">{{$statut->statut}}</option>
                                    @endforeach
                                </select>
                                @error('u_statut_id') <span class="error text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mb-3 col-md-6">
                                <label for="username">username</label>
                                <input type="text" class="form-control" placeholder="Nom d'utilisateur" wire:model="u_username">
                                @error('u_username') <span class="error text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group mb-3 col-md-6">
                                <label for="email">email</label>
                                <input type="text" class="form-control" placeholder="email" wire:model="u_email">
                                @error('u_email') <span class="error text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group mb-3 col-md-6">
                                <label for="password">mot de passe</label>
                                <input type="password" class="form-control" placeholder="mot de passe" wire:model="u_password">
                                @error('u_password') <span class="error text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group mb-3 col-md-6">
                                <label for="password">confirmer le mot de passe</label>
                                <input type="password" class="form-control" placeholder="confirmer le mot de passe" wire:model="u_password_confirmation">
                                @error('u_password_confirmation') <span class="error text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mb-3 col-md-6">
                                <label for="image">image</label>
                                <input type="file" class="form-control" wire:model="u_image">
                                @error('u_image') <span class="error text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value='modifier'>
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
