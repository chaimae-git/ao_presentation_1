<div class="modal fade" id="editDepartementModal" wire:ignore.self>
    <div class="modal-dialog" data-backdrop='static' data-keyboard='false'>
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editer un departement</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="update">
                    @csrf
                    <input type="hidden" wire:model="u_id">
                    <div class="form py-2">
                        <div class="form-group mb-3">
                            <label for="bu_id">BU</label>
                            <select name="bu_id" class="form-control" wire:model="u_bu_id">
                                <option value="">séléctionner le BU</option>
                                @foreach($bus as $bu)
                                    <option value="{{$bu->id}}">{{$bu->nom}}</option>
                                @endforeach
                            </select>
                            @error('u_bu_id') <span class="error text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" placeholder="Nom" wire:model="u_nom">
                            @error('u_nom') <span class="error text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="nom">Description</label>
                            <textarea cols="15" class="form-control" placeholder="description" wire:model="u_description"></textarea>
                            @error('u_description') <span class="error text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="submit" value='modifier'>
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
