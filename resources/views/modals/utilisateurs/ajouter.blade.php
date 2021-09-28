<div class="modal fade" wire:ignore.self id="addUtilisateurModal">
    <div class="modal-dialog modal-xl" data-backdrop='static' data-keyboard='false'>
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Default Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="save" enctype="multipart/form-data">
                    @csrf
                    <div class="form py-2">
                        <div class="row">
                            <div class="form-group mb-3 col-md-6">
                                <label for="nom">Nom et Prénom</label>
                                <input type="text" class="form-control" wire:model="nom_prenom" placeholder="nom & prenom">
                                @error('nom_prenom') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group mb-3 col-md-6">
                                <label for="statut_id">Statut</label>
                                <select class="form-control" wire:model="statut_id">
                                    <option value="">séléctionner le statut</option>
                                    @foreach($statuts as $statut)
                                        <option value="{{$statut->id}}" @if((old('statut_id')) && old('statut_id') == $statut->id) {{'selected'}} @endif>{{$statut->statut}}</option>
                                    @endforeach
                                </select>
                                @error('statut_id') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mb-3 col-md-6">
                                <label for="username">username</label>
                                <input type="text" class="form-control" placeholder="Nom d'utilisateur" wire:model="username">
                                @error('username') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group mb-3 col-md-6">
                                <label for="email">email</label>
                                <input type="text" class="form-control" placeholder="email" wire:model="email">
                                @error('email') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group mb-3 col-md-6">
                                <label for="password">mot de passe</label>
                                <input type="password" class="form-control" placeholder="mot de passe" wire:model="password">
                                @error('password') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group mb-3 col-md-6">
                                <label for="password">confirmer le mot de passe</label>
                                <input type="password" class="form-control" placeholder="confirmer le mot de passe" wire:model="password_confirmation">
                                @error('password_confirmation') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mb-3 col-md-6">
                                <label for="image">image</label>
                                <input type="file" class="form-control" wire:model="image">
                                @error('image') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value='ajouter'>
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
