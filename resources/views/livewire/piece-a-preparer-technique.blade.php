<div class="card card-default">
    <div class="card-header d-flex justify-content-between">
        <div>Pieces Techniques A Préparer</div>
        <div class="ml-auto">
            <a href="script:void(0)" wire:click="modifierPosition('todo_list')"><i class="fas fa-clipboard-list"></i></a>
            <a href="script:void(0)" wire:click="modifierPosition('settings')"><i class="fas fa-cogs"></i></a>

        </div>
    </div>
    <div class="card-body">
        @if($position == 'todo_list')
            <div class="todoList niceScroll" style="height:250px" wire:ignore.self>
                <ul class="ml-0 pl-0 list-group">

                    @foreach($pieces_a_preparer as $piece)
                        @if($piece->selected == 0)
                            <li class="list-group-item d-flex align-items-center border-0 px-0 py-2" style="line-height:12px;">
                                <span class="mr-2 text-black-50" wire:click="updateTodoList({{$piece->id}})" id="piece.{{$piece->id}}" style="font-size:24px"><i class="far fa-square" ></i></span>
                                <label class="text-black-50 mb-0" for="piece.{{$piece->id}}" style="line-height:20px">{{$piece->nom_fichier}}</label>
                            </li>
                        @else
                            <li class="list-group-item d-flex align-items-center border-0 px-0 py-2" style="line-height:12px;">
                                <span class="mr-2 text-success" wire:click="updateTodoList({{$piece->id}})" id="piece.{{$piece->id}}" style="font-size:24px"><i class="fas fa-check-square" ></i></span>
                                <label class="text-success mb-0" for="piece.{{$piece->id}}" style="line-height:20px">{{$piece->nom_fichier}}</label>
                            </li>
                        @endif
                    @endforeach
                </ul>
                @if($saveTodoListBtn == 1)
                    <button id="saveTodoList" class="btn btn-primary"  wire:click="saveTodoList">Save Changes</button>
                @endif
            </div>

        @elseif($position == 'settings')
            <div class="settings niceScroll" style="height:250px; overflow:hidden;" wire:ignore.self>
                <div class="d-flex mb-3">
                    <div class="col-9">
                        <input class="form-control" type="text" wire:model="nom_fichier">
                        @error('nom_fichier') <span class="error text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="col-3 ml-auto float-right">
                        <button class="btn btn-primary ml-auto float-right" wire:click="saveSettings">+</button>
                    </div>
                </div>
                <table class="table">
                    <tbody>
                    @foreach($pieces_a_preparer as $piece)
                        <tr class="">
                            <td class="col-9 " wire:click="editNomFichier({{$piece->id}})">
                                @if($update_nom_fichier == 1 && $piece->id == $update_nom_fichier_id)
                                    <input type="text" autofocus class="border-0 form-control p-0" wire:model="u_nom_fichier">
                                @else
                                    {{$piece->nom_fichier}}
                                @endif

                            </td>
                            <td class="col-3 text-right">
                                @if($update_nom_fichier == 1 && $piece->id == $update_nom_fichier_id)
                                    <a href="javascript:void(0)"  style="line-height:38px" class="mr-2" wire:click="updateNomFichier({{$piece->id}})"><i class="text-warning fas fa-edit"></i></a>
                                    <a href="javascript:void(0)"  style="line-height:38px" wire:click="ignoreUpdateNomFichier()"><i class="text-danger fas fa-ban"></i></a>
                                    {{--                                    <button class="btn btn-warning" wire:click="updateNomFichier">save</button>--}}
                                @else
                                    <a href="javascript:void(0)" wire:click="deleteConfirmPieceAPreparerTechnique({{$piece->id}})"><i class="text-danger fas fa-trash-alt"></i></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <script>

                window.addEventListener('closeAddPiecesAPreparerTechniqueModal', function(e){
                @this.position = 'todo_list';
                    Swal.fire(
                        'Added!',
                        'Piece A Preparer has been Added.',
                        'success'
                    )
                });

                window.addEventListener('closeEditPiecesAPreparerTechniqueModal', function(e){
                @this.position = 'todo_list';
                    Swal.fire(
                        'Updated!',
                        'Piece A Preparer has been Updated.',
                        'success'
                    )
                });


                window.addEventListener('swalConfirmPieceAPreparerTechnique', function(e){
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
                            window.livewire.emit('deletePieceAPreparerTechnique', e.detail.id)
                        }
                    });
                });

                window.addEventListener('deletedPieceAPreparerTechnique', function(e){
                @this.position = 'todo_list';
                    Swal.fire(
                        'Deleted!',
                        'Piece A Preparer has been deleted.',
                        'success'
                    )
                });

            </script>


        @endif
    </div>
</div>
