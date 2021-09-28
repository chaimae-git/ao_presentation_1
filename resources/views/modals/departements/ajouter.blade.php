<div class="modal fade" wire:ignore.self id="addDepartementModal">
    <div class="modal-dialog" data-backdrop='static' data-keyboard='false'>
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Default Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="save">
                    @csrf
                    <div class="form py-2">
                        <div class="form-group mb-3">
                            <label for="bu_id">BU</label>
                            <select name="bu_id" class="form-control" wire:model="bu_id">
                                <option value="">séléctionner le BU</option>
                                @foreach($bus as $bu)
                                    <option value="{{$bu->id}}" @if((old('bu_id')) && old('bu_id') == $bu->id) {{'selected'}} @endif>{{$bu->nom}}</option>
                                @endforeach
                            </select>
                            @error('bu_id') <span class="error text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" placeholder="Nom" wire:model="nom">
                            @error('nom') <span class="error text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="nom">Description</label>
                            <textarea cols="15" class="form-control" placeholder="description" wire:model="description"></textarea>
                            @error('description') <span class="error text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="submit" value='ajouter'>
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
