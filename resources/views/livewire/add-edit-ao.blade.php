<div class="panel panel-default">
    <div class="panel-heading d-flex justify-content-between align-items-center bg-blue-light p-2 pl-3 mb-3">
        <div>
            <h4 class="text-gray-dark m-0" style="font-size:20px">Ajouter un AO</h4>
        </div>
        <div class="button">
            <a href="{{route('aos.consulter')}}" class="btn bg-blue-button rounded text-white">Consulter les AOs</a>
        </div>
    </div>
    <div class="panel-body px-3 bg-white border">
        <div class="row py-5">

            <div class="form col-12 p-0">
                <div class="content-form-body bg-white p-3">
                    <button class="btn btn-primary" wire:click.prevent="secondStepSubmit">test</button>

                    <div class="content-form pt-4">
                        @include('flash')
                        <form wire:submit.prevent="submitForm" enctype="multipart/form-data" class="">
                            @csrf
                            <section class="section_1 form-step form-step-active" id="section_1">
                                <div class="row mb-3">
                                    <div class="form-group col">
                                        <label for="n_ao" class="mb-2">numero AO</label>
                                        <input type="text" class="form-control" name="n_ao" placeholder="Numéro Ao" value={{old('n_ao')}}>
                                        @error('num_AO') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>

                                    <div class="form-group col">
                                        <label for="date_limite">date limite</label>
                                        <input type="date" class="form-control" name="date_limite" placeholder="date_limite" value={{old('date_limite')}}>
                                        @error('date_limite') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>

                                    <div class="form-group col">
                                        <label for="pays_id" class="mb-2">Pays</label>
                                        <select name="pays_id" class="form-control">
                                            <option value="">séléctionner le pays</option>
                                            @foreach($pays as $pays)
                                                <option value="{{$pays->id}}" @if((old('pays_id')) && old('pays_id') == $pays->id) {{'selected'}} @endif>{{$pays->pays}}</option>
                                            @endforeach
                                        </select>
                                        @error('pays_id') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <div class="form-group col">
                                        <label for="type" class="mb-2">Type</label>
                                        <select name="type_id" class="form-control">
                                            <option value="">séléctionner le type</option>
                                            @foreach($types as $type)
                                                <option value="{{$type->id}}" @if((old('type_id')) && old('type_id') == $type->id) {{'selected'}} @endif>{{$type->type}}</option>
                                            @endforeach
                                        </select>
                                        @error('type_id') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>

                                    <div class="form-group col">
                                        <label for="date_adjudication" class="mb-2">date adjudication</label>
                                        <input type="date" class="form-control" name="date_adjudication" placeholder="date_adjudication" value={{old('date_adjudication')}}>
                                        @error('date_adjudication') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>

                                    <div class="form-group col">
                                        <label for="ministere_id" class="mb-2">Minister de tuelle</label>
                                        <select name="ministere_id" class="form-control">
                                            <option value="">séléctionner le Minister de tuelle</option>
                                            @foreach($ministere_tuelles as $ministere)
                                                <option value="{{$ministere->id}}" @if((old('ministere_id')) && old('ministere_id') == $ministere->id) {{'selected'}} @endif>{{$ministere->ministere}}</option>
                                            @endforeach
                                        </select>
                                        @error('ministere_id') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="form-group col">
                                        <label for="secteur_id" class="mb-2">Sécteur d'activité</label>
                                        <select name="secteur_id" class="form-control">
                                            <option value="">séléctionner le sécteur d'activité</option>
                                            @foreach($secteur_activites as $secteur)
                                                <option value="{{$secteur->id}}" @if((old('secteur_id')) && old('secteur_id') == $secteur->id) {{'selected'}} @endif>{{$secteur->secteur}}</option>
                                            @endforeach
                                        </select>
                                        @error('secteur_id') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>

                                    <div class="form-group col">
                                        <label for="partenariat" class="mb-2">partenariat</label>
                                        <input type="text" class="form-control" name="partenariat" placeholder="partenariat" value={{old('partenariat')}}>
                                        @error('partenariat') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>

                                    <div class="form-group col">
                                        <label for="montant_soumission" class="mb-2">montant de soumission</label>
                                        <input type="text" class="form-control" name="montant_soumission" placeholder="montant de soumission" value={{old('montant_soumission')}}>
                                        @error('montant_soumission') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <div class="form-group col">
                                        <label for="budget" class="mb-2">budget</label>
                                        <input type="text" class="form-control" name="budget" placeholder="budget" value={{old('budget')}}>
                                        @error('budget') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>

                                    <div class="form-group col">
                                        <label for="n_lot" class="mb-2">nombre de lotissement</label>
                                        <input type="text" class="form-control" name="n_lot" placeholder="nombre de lotissement" value={{old('n_lot')}}>
                                        @error('n_lot') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>

                                    <div class="form-group col">
                                        <label for="client_id" class="mb-2">client</label>
                                        <select name="client_id" class="form-control">
                                            <option value="">séléctionner le client</option>
                                            @foreach($clients as $client)
                                                <option value="{{$client->id}}" @if((old('client_id')) && old('client_id') == $client->id) {{'selected'}} @endif>{{$client->client}}</option>
                                            @endforeach
                                        </select>
                                        @error('client_id') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>

                                </div>

                                <div class="row mb-3">

                                    <div class="form-group col-4">
                                        <label for="montant_c_p">Montant du Caution Provisoire</label>
                                        <input type="text" class="form-control" name="montant_c_p" placeholder="montant caution provisoire" value={{old('montant_c_p')}}>
                                        @error('montant_c_p') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>

                                    <div class="form-group col">
                                        <label for="critere_selection_id" class="mb-2">Critère de Séléction</label>
                                        <select name="critere_selection_id" class="form-control">
                                            <option value="">séléctionner le critère de séléction</option>
                                            @foreach($criteres_selections as $critere)
                                                <option value="{{$critere->id}}" @if((old('critere_selection_id')) && old('critere_selection_id') == $critere->id) {{'selected'}} @endif>{{$critere->critere}}</option>
                                            @endforeach
                                        </select>
                                        @error('critere_selection_id') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="objet">objet</label>
                                    <textarea name="objet" placeholder="objet" class="form-control" rows="5">{{old('objet')}}</textarea>
                                    @error('objet') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                                <div class="row mb-3">
                                    <div class="form-group col">
                                        <label for="rc" class="mb-2">RC</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="rc">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                        @error('rc') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>

                                    <div class="form-group col">
                                        <label for="cps" class="mb-2">CPS</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="cps">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                        @error('cps') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>

                                </div>
                                <div class="form-group clearfix">
                                    <div class="flex justify-content-end">
                                        <div class="button">
                                            <button class="pull-right btn btn-primary" type="button" value='suivant' wire:click="firstStepSubmit">suivant</button>
                                        </div>
                                    </div>
                                </div>

                            </section>
                            <section class="section_2 form-step" id="section_2">
                                <div class="partie_admin mb-4">
                                    <fieldset class="p-3 border scheduler-border">
                                        <legend class="scheduler-border text-capitalize" style="font-size:18px">partie administratif </legend>
                                        <div class="form-group" wire:ignore>
                                            <label>secretaires</label>
                                            <select class="select2 form-control" multiple="multiple" id="multiselect_administratif" multiple wire:model="select_partie_administratif">
                                                @foreach($secretaires as $secretaire)--}}
                                                    <option value="{{$secretaire->id}}">{{$secretaire->nom_prenom}}</option>
                                                @endforeach
                                            </select>
                                            @error('select_partie_administratif') <span class="error text-danger">{{$message}}</span> @enderror
                                        </div>
{{--                                        <div class="row">--}}
{{--                                            <div class="col-4">--}}
{{--                                                <div class="header bg-blue-light p-2">--}}
{{--                                                    <h6 class="text-white text-capitalize m-0 text-gray-dark text-bold">secrétaires</h6>--}}
{{--                                                </div>--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <select class="form-control" id="multiselect_administratif" multiple style="height:120px" wire:change="select_partie_administratif">--}}
{{--                                                        @foreach($secretaires as $secretaire)--}}
{{--                                                            <option value="{{$secretaire->id}}">{{$secretaire->nom_prenom}}</option>--}}
{{--                                                        @endforeach--}}
{{--                                                    </select>--}}
{{--                                                </div>--}}

{{--                                            </div>--}}
{{--                                            <div class="col-4 d-flex justify-content-center align-items-center">--}}
{{--                                                <div>--}}
{{--                                                    <button type="button" class="btn bg-blue-light d-block mb-3 text-bold text-gray-dark" id="multiselect_administratif_rightSelected">>></button>--}}
{{--                                                    <button type="button" class="btn bg-blue-light d-block text-bold text-gray-dark" id="multiselect_administratif_leftSelected"><<</button>--}}
{{--                                                </div>--}}

{{--                                            </div>--}}
{{--                                            <div class="col-4">--}}
{{--                                                <div class="header bg-blue-light p-2">--}}
{{--                                                    <h6 class="text-white text-capitalize text-gray-dark text-bold m-0">secrétaires affectés</h6>--}}
{{--                                                </div>--}}
{{--                                                <select name="utilisateurs_ids[]" id="multiselect_administratif_to" class="form-control" multiple style="height:120px"></select>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                    </fieldset>
                                </div>
                                <div class="partie_finance mb-4">
                                    <fieldset class="p-3 border scheduler-border">
                                        <legend class="scheduler-border text-capitalize" style="font-size:18px">partie financiaire </legend>
                                        <div class="form-group" wire:ignore>
                                            <label>secretaires</label>
                                            <select class="select2 form-control" multiple="multiple" id="multiselect_finance" multiple wire:model="select_partie_financiaire">
                                                @foreach($bus as $bu)
                                                <option value="{{$bu->id}}">{{$bu->nom}}</option>
                                                @endforeach
                                            </select>
                                            @error('select_partie_financiaire') <span class="error text-danger">{{$message}}</span> @enderror
                                        </div>

{{--                                        <div class="row">--}}
{{--                                            <div class="col-4">--}}
{{--                                                <div class="header  bg-blue-light p-2">--}}
{{--                                                    <h6 class="text-white text-capitalize text-gray-dark text-bold m-0">BUs</h6>--}}
{{--                                                </div>--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <select class="form-control" id="multiselect_finance" multiple style="height:120px" wire:model.debounce.150ms="select_partie_financiaire">--}}
{{--                                                        @foreach($bus as $bu)--}}
{{--                                                            <option value="{{$bu->id}}">{{$bu->nom}}</option>--}}
{{--                                                        @endforeach--}}
{{--                                                    </select>--}}
{{--                                                </div>--}}

{{--                                            </div>--}}
{{--                                            <div class="col-4 d-flex justify-content-center align-items-center">--}}
{{--                                                <div>--}}
{{--                                                    <button type="button" class="btn bg-blue-light text-bold d-block mb-3  text-gray-dark" id="multiselect_finance_rightSelected" wire:click.debounce.150ms="get_select_partie_financiaire">>></button>--}}
{{--                                                    <button type="button" class="btn bg-blue-light text-bold d-block  text-gray-dark" id="multiselect_finance_leftSelected" wire:click.debounce.150ms="get_select_partie_financiaire"><<</button>--}}
{{--                                                </div>--}}

{{--                                            </div>--}}
{{--                                            <div class="col-4">--}}
{{--                                                <div class="header bg-blue-light p-2">--}}
{{--                                                    <h6 class="text-capitalize m-0 text-gray-dark text-bold">BUs affectés</h6>--}}
{{--                                                </div>--}}
{{--                                                <select name="bus_ids[]" id="multiselect_finance_to" class="form-control" multiple style="height:120px"></select>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                    </fieldset>
                                </div>
                                <div class="patie_tech mb-4">
                                    <fieldset class="p-3 border scheduler-border">
                                        <legend class="scheduler-border text-capitalize" style="font-size:18px">partie technique </legend>
                                        <div class="form-group" wire:ignore>
                                            <label>départements</label>
                                            <select class="select2 form-control" multiple="multiple" id="multiselect_tech" multiple wire:model="select_partie_technique">
                                                @foreach($departements as $departement)
                                                <option value="{{$departement->id}}">{{$departement->nom}}</option>
                                                @endforeach
                                            </select>
                                            @error('select_partie_technique') <span class="error text-danger">{{$message}}</span> @enderror
                                        </div>
{{--                                        <div class="row">--}}
{{--                                            <div class="col-4">--}}
{{--                                                <div class="header bg-blue-light p-2">--}}
{{--                                                    <h6 class="text-gray-dark text-capitalize m-0 text-bold">departements</h6>--}}
{{--                                                </div>--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <select class="form-control" id="multiselect_tech" multiple style="height:120px">--}}
{{--                                                        @foreach($departements as $departement)--}}
{{--                                                            <option value="{{$departement->id}}">{{$departement->nom}}</option>--}}
{{--                                                        @endforeach--}}
{{--                                                    </select>--}}
{{--                                                </div>--}}

{{--                                            </div>--}}
{{--                                            <div class="col-4 d-flex justify-content-center align-items-center">--}}
{{--                                                <div>--}}
{{--                                                    <button type="button" class="btn bg-blue-light d-block text-bold mb-3  text-gray-dark" id="multiselect_tech_rightSelected">>></button>--}}
{{--                                                    <button type="button" class="btn bg-blue-light d-block text-bold  text-gray-dark" id="multiselect_tech_leftSelected"><<</button>--}}
{{--                                                </div>--}}

{{--                                            </div>--}}
{{--                                            <div class="col-4">--}}
{{--                                                <div class="header bg-blue-light p-2">--}}
{{--                                                    <h6 class="text-white text-capitalize m-0 text-gray-dark text-bold">departements affectés</h6>--}}
{{--                                                </div>--}}
{{--                                                <select name="departements_ids[]" id="multiselect_tech_to" class="form-control" multiple style="height:120px"></select>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                    </fieldset>
                                </div>
                                <div class="form-group clearfix">
                                    <div class="flex justify-content-between">
                                        <div class="button">
                                            <button class="pull-left btn bg-blue-button btn-prev text-white" type="button" value='suivant'>precedant</button>
                                        </div>
                                        <div class="button">
                                            <button class="pull-right btn bg-blue-button btn-next text-white" type="button" value='suivant'>suivant</button>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="section_3 form-step" id="section_3">
                                {{--    <div class="form-group mb-3">--}}
                                {{--        <label for="adresse mb-2">Adresse</label>--}}
                                {{--        <input type="text" class="form-control" name="adresse" placeholder="adresse" value={{old('adresse')}}>--}}
                                {{--        @error('adresse') <span class="text-danger">{{$message}}</span> @enderror--}}
                                {{--    </div>--}}

                                <div class="map mymap w-100  mb-3" style="height:600px" id="mymap"></div>
                                <div class="form-group clearfix">
                                    <div class="d-flex justify-content-between">
                                        <div class="button">
                                            <button class="pull-left btn btn-primary bg-blue-button btn-prev text-white" type="button">precedant</button>
                                        </div>
                                        <div class="button">
                                            <input class="pull-right btn btn-primary bg-blue-button btn-next text-white" type="submit" value="Ajouter" name="submit">
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <!--begin: Start draw Modal -->
                            <div class="modal fade" id="startdrawModal" tabindex="-1" role="dialog" aria-labelledby="startdrawModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="startdrawModalLabel">Select Draw type</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" style='text-align: center;'>
                                            <!-- Cards -->
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="card" >
                                                        <div class="card-body">
                                                            <h5 class="card-title">Point</h5>
                                                            <h6 class="card-subtitle mb-2 text-muted">ATM, Tree, Pole, Bus Stop, etc.</h6>
                                                            <p class="card-text"><i class="fas fa-map-marker-alt fa-2x"></i></p>
                                                            <a onclick="startDraw('Point')" class="card-link">Add Point</a>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="card" >
                                                        <div class="card-body">
                                                            <h5 class="card-title">Line</h5>
                                                            <h6 class="card-subtitle mb-2 text-muted">Road, River, Telephone Wire, etc.</h6>
                                                            <p class="card-text"><i class="fas fa-road fa-2x"></i></p>
                                                            <a onclick="startDraw('LineString')" class="card-link">Add Line</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="card" >
                                                        <div class="card-body">
                                                            <h5 class="card-title">Polygon</h5>
                                                            <h6 class="card-subtitle mb-2 text-muted">Building, Garden, Ground, etc.</h6>
                                                            <p class="card-text"><i class="fas fa-draw-polygon fa-2x"></i></p>
                                                            <a onclick="startDraw('Polygon')" class="card-link">Add Polygon</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end: Start draw Modal -->
                            <!--begin: enter information Modal -->
                            <div class="modal fade" id="enterInformationModal" tabindex="-1" role="dialog" aria-labelledby="enterInformationModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="enterInformationModalLabel">Enter Feature's Detail</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" style='text-align: center;'>
                                            <!-- begin: Input -->
                                            <div class="form-group">
                                                <label for="exampleInputtext1">Adresse</label>
                                                <input type="text" class="form-control" id="exampleInputtext1" aria-describedby="textHelp">
                                                <small id="textHelp" class="form-text text-muted">Address, Name, etc.</small>
                                            </div>
                                            <!-- end: Input -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="clearDrawSource()">Close</button>
                                            <button type="button" class="btn btn-primary" onclick="savetodb()">Save Featues</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end: enter information Modal -->
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@push('scripts')

    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2({
                theme:'bootstrap4'
            });

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })/*.on('change', function(){
            @this.select_partie_administratif =  $(this).val();
            })*/;

            $("#multiselect_administratif").on('change', function(){
            @this.select_partie_administratif =  $(this).val();
            });

            $("#multiselect_finance").on('change', function(){
            @this.select_partie_financiaire =  $(this).val();
            });

            $("#multiselect_tech").on('change', function(){
            @this.select_partie_technique =  $(this).val();
            });

            $('#multiselect_administratif').multiselect();
            $('#multiselect_finance').multiselect();
            $('#multiselect_tech').multiselect();

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'})
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {'placeholder': 'mm/dd/yyyy'})
            //Money Euro
            $('[data-mask]').inputmask()

            //Date picker
            $('#reservationdate').datetimepicker({
                format: 'L'
            });

            //Date and time picker
            $('#reservationdatetime').datetimepicker({icons: {time: 'far fa-clock'}});

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                }
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker(
                {
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function (start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                }
            )

            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'LT'
            })
        });







        //open layer code
        // All Global Variable
        var draw
        var flagIsDrawingOn = false
        //var PointType = ['ATM','Tree','Telephone Poles', 'Electricity Poles'];
        //var LineType = ['National Highway','State Highway','River','Telephone Lines'];
        //var PolygonType = ['Water Body','Commercial Land', 'Residential Land','Building'];
        var selectedGeomType


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        window.app = {};
        var app = window.app;

        app.DrawingApp = function(opt_options) {

            var options = opt_options || {};

            var button = document.createElement('button');
            button.id = 'drawbtn'
            button.innerHTML = '<i class="fas fa-pencil-ruler"></i>';

            var this_ = this;
            var startStopApp = function(e) {
                e.preventDefault();
                if (flagIsDrawingOn == false){
                    $('#startdrawModal').modal('show')

                } else {
                    map.removeInteraction(draw)
                    flagIsDrawingOn = false
                    document.getElementById('drawbtn').innerHTML = '<i class="fas fa-pencil-ruler"></i>'
                    //defineTypeofFeature()
                    $("#enterInformationModal").modal('show')

                }
            };

            button.addEventListener('click', startStopApp, false);
            button.addEventListener('touchstart', startStopApp, false);

            var element = document.createElement('div');
            element.className = 'draw-app ol-unselectable ol-control';
            element.appendChild(button);

            ol.control.Control.call(this, {
                element: element,
                target: options.target
            });

        };
        ol.inherits(app.DrawingApp, ol.control.Control);
        var myview = new ol.View({
            center : [8214563.509192685, 2272903.8536058646],
            projection: 'EPSG:3857',
            zoom:14
        });

        // OSM Layer
        var baseLayer = new ol.layer.Tile({
            source : new ol.source.OSM({
                attributions:'Surveyor Application'
            })
        });


        // Geoserver Layer
        var featureLayersourse = new ol.source.TileWMS({
            url:'http://localhost:8080/geoserver/survey_app/wms',
            params:{'LAYERS':'survey_app:drawnFeature', 'tiled' : true},
            serverType:'geoserver'
        })
        var featureLayer = new ol.layer.Tile({
            source:featureLayersourse
        })
        // Draw vector layer
        // 1 . Define source
        var drawSource = new ol.source.Vector()
        // 2. Define layer
        var drawLayer = new ol.layer.Vector({
            source : drawSource
        })
        // Layer Array
        var layerArray = [baseLayer/*,featureLayer*/,drawLayer]
        // Map
        var map = new ol.Map({
            controls: ol.control.defaults({
                attributionOptions: {
                    collapsible: false
                }
            }).extend([
                new app.DrawingApp()
            ]),
            target : 'mymap',
            view: myview,
            layers:layerArray,
            //overlays: [popup]
        })



        // Function to start Drawing
        function startDraw(geomType){
            selectedGeomType = geomType
            draw = new ol.interaction.Draw({
                type:geomType,
                source:drawSource
            })
            $('#startdrawModal').modal('hide')

            map.addInteraction(draw)
            flagIsDrawingOn = true
            document.getElementById('drawbtn').innerHTML = '<i class="far fa-stop-circle"></i>'
        }


        // Function to add types based on feature
        // function defineTypeofFeature(){
        //     var dropdownoftype = document.getElementById('typeofFeatures')
        //     dropdownoftype.innerHTML = ''
        //     if (selectedGeomType == 'Point'){
        //         for (i=0;i<PointType.length;i++){
        //             var op = document.createElement('option')
        //             op.value = PointType[i]
        //             op.innerHTML = PointType[i]
        //             dropdownoftype.appendChild(op)
        //         }
        //     } else if (selectedGeomType == 'LineString'){
        //         for (i=0;i<LineType.length;i++){
        //             var op = document.createElement('option')
        //             op.value = LineType[i]
        //             op.innerHTML = LineType[i]
        //             dropdownoftype.appendChild(op)
        //         }
        //     }else{
        //         for (i=0;i<PolygonType.length;i++){
        //             var op = document.createElement('option')
        //             op.value = PolygonType[i]
        //             op.innerHTML = PolygonType[i]
        //             dropdownoftype.appendChild(op)
        //         }
        //     }
        // }


        // Function to save information in db
        function savetodb(){
            // get array of all features
            var featureArray = drawSource.getFeatures()
            // Define geojson format
            var geogJONSformat = new ol.format.GeoJSON()
            // Use method to convert feature to geojson
            var featuresGeojson = geogJONSformat.writeFeaturesObject(featureArray)
            // Array of all geojson
            var geojsonFeatureArray = featuresGeojson.features

            for (i=0;i<geojsonFeatureArray.length;i++){
                //var type = document.getElementById('typeofFeatures').value
                var adresse = document.getElementById('exampleInputtext1').value
                var geom = JSON.stringify(geojsonFeatureArray[i].geometry)
                //if (type != ''){
                $.ajax({
                    url:"{{route('aos.add_location')}}",
                    type:'POST',
                    data :{
                        //typeofgeom : type,
                        adresseofgeom : adresse,
                        stringofgeom : geom
                    },
                    success : function(dataResult){
                        var result = JSON.parse(dataResult)
                        if (result.statusCode == 200){
                            console.log('data added successfully')
                        } else {
                            console.log('data not added successfully')
                        }

                    }
                });
                //} else {
                //    alert('please select type')
                //}
            }

            // Update layer
            var params = featureLayer.getSource().getParams();
            params.t = new Date().getMilliseconds();
            featureLayer.getSource().updateParams(params);

            // Close the Modal
            $("#enterInformationModal").modal('hide')

            //clearDrawSource ()

        }


        function clearDrawSource (){
            drawSource.clear()
        }
    </script>
@endpush
