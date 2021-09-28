<div class="panel panel-default">

    <div class="panel-body px-3 bg-white border">
        <div class="row py-5">

            <div class="form col-12 p-0">
                <div class="content-form-body bg-white p-3">

                    <div class="content-form pt-4">
                        @include('flash')

                        <div class="stepwizard mb-5 w-100 mx-auto">
                            <div class="stepwizard-row setup-panel">
                                <div class="stepwizard-step col-4">
                                    <a href="#step-1" type="button"
                                       class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-success' }}">1</a>
                                    <p>Informations Générales</p>
                                </div>
                                <div class="stepwizard-step col-4">
                                    <a href="#step-2" type="button"
                                       class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-success' }}">2</a>
                                    <p>Affectations</p>
                                </div>
                                <div class="stepwizard-step col-4">
                                    <a href="#step-3" type="button"
                                       class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-success' }}" disabled="disabled">3</a>
                                    <p>Localisations</p>
                                </div>
                            </div>
                        </div>

                        <form wire:submit.prevent="submitForm" enctype="multipart/form-data" class="">
                            @csrf
                            <input type="hidden" name="id" value = {{$aoObj->id}}>
                            @if($currentStep == 1)
                                <section class="section_1 form-step form-step-active" id="section_1">
                                    <div class="row mb-3">
                                        <div class="form-group col">
                                            <label for="n_ao" class="mb-2">N° AO</label>
                                            <input type="text" class="form-control" placeholder="Numéro Ao" wire:model="num_AO">
                                            @error('num_AO') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>

                                        <div class="form-group col">
                                            <label for="date_limite">date limite</label>
                                            <input type="date" class="form-control" placeholder="date_limite" wire:model="date_limite">
                                            @error('date_limite') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>

                                        <div class="form-group col">
                                            <label for="pays_id" class="mb-2">Pays</label>
                                            <select name="pays_id" class="form-control" wire:model="pays_id">
                                                <option value="">séléctionner le pays</option>
                                                @foreach($pays as $pays)
                                                    <option value="{{$pays->id}}">{{$pays->pays}}</option>
                                                @endforeach
                                            </select>
                                            @error('pays_id') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>

                                    </div>

                                    <div class="row mb-3">
                                        <div class="form-group col">
                                            <label for="type" class="mb-2">Type</label>
                                            <select name="type_id" class="form-control" wire:model="type_id">
                                                <option value="">Sélectionner le type</option>
                                                @foreach($types as $type)
                                                    <option value="{{$type->id}}">{{$type->type}}</option>
                                                @endforeach
                                            </select>
                                            @error('type_id') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>

                                        <div class="form-group col">
                                            <label for="date_de_depot" class="mb-2">Date de Dépot</label>
                                            <input type="date" class="form-control" placeholder="Date de Depot" wire:model="date_de_depot">
                                            @error('date_de_depot') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>

                                        <div class="form-group col">
                                            <label for="ministere_id" class="mb-2">Ministère de tutelle</label>
                                            <select name="ministere_id" class="form-control" wire:model="ministere_id">
                                                <option value="">Sélectionner le Ministère de tutelle</option>
                                                @foreach($ministere_tutelles as $ministere)
                                                    <option value="{{$ministere->id}}">{{$ministere->ministere}}</option>
                                                @endforeach
                                            </select>
                                            @error('ministere_id') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="form-group col-8" wire:ignore>
                                            <label for="partenariat_id" class="mb-2">partenariats</label>
                                            <select name="" id="partenariat_id" class="select2 form-control" multiple wire:model="partenariat_id">
                                                <option value="">séléctionner les partenatriats</option>
                                                @foreach($partenariats as $partenariat)
                                                    <option value="{{$partenariat->id}}">{{$partenariat->partenariat}}</option>
                                                @endforeach
                                            </select>
                                            @error('partenariat_id') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>

                                        <div class="form-group col-4">
                                            <label for="chef_de_fil_id" class="mb-2">Chef de Fil</label>
                                            <select name="secteur_id" class="form-control" wire:model="chef_de_fil_id">
                                                <option value="">séléctionner le Chef De Fil</option>
                                                @foreach($chef_de_fil_options as $chef)
                                                    <option value="{{$chef->id}}">{{$chef->partenariat}}</option>
                                                @endforeach
                                            </select>
                                            @error('chef_de_fil_id') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>

                                    </div>

                                    <div class="row mb-3">
                                        <div class="form-group col-4">
                                            <label for="secteur_id" class="mb-2">Secteur d'Activité</label>
                                            <select name="secteur_id" class="form-control" wire:model="secteur_id">
                                                <option value="">Sélectionner le secteur d'activité</option>
                                                @foreach($secteur_activites as $secteur)
                                                    <option value="{{$secteur->id}}">{{$secteur->secteur}}</option>
                                                @endforeach
                                            </select>
                                            @error('secteur_id') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>

                                        <div class="form-group col-4">
                                            <label for="montant_soumission" class="mb-2">Montant de Soumission</label>
                                            <input type="text" class="form-control" placeholder="montant de soumission" wire:model="montant_soumission">
                                            @error('montant_soumission') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>

                                        <div class="form-group col-4">
                                            <label for="budget" class="mb-2">Budget</label>
                                            <input type="text" class="form-control" placeholder="budget" wire:model="budget">
                                            @error('budget') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>

                                    </div>

                                    <div class="row mb-3">


                                        <div class="form-group col-4">
                                            <label for="n_lot" class="mb-2">Nombre de lots</label>
                                            <input type="text" class="form-control" placeholder="nombre de lot" wire:model="n_lot">
                                            @error('n_lot') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>

                                        <div class="form-group col-4">
                                            <label for="client_id" class="mb-2">Client</label>
                                            <select name="client_id" class="form-control" wire:model="client_id">
                                                <option value="">Sélectionner le client</option>
                                                @foreach($clients as $client)
                                                    <option value="{{$client->id}}">{{$client->client}}</option>
                                                @endforeach
                                            </select>
                                            @error('client_id') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>

                                        <div class="form-group col-4">
                                            <label for="montant_c_p">Montant du Caution Provisoire</label>
                                            <input type="text" class="form-control"  placeholder="montant caution provisoire" wire:model="montant_c_p">
                                            @error('montant_c_p') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>

                                    </div>

                                    <div class="row mb-3">
                                        <div class="form-group col-4">
                                            <label for="critere_selection_id" class="mb-2">Critère de Sélection</label>
                                            <select name="critere_selection_id" class="form-control" wire:model="critere_selection_id">
                                                <option value="">séléctionner le critère de sélection</option>
                                                @foreach($criteres_selections as $critere)
                                                    <option value="{{$critere->id}}">{{$critere->critere}}</option>
                                                @endforeach
                                            </select>
                                            @error('critere_selection_id') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>

                                        <div class="form-group col-4">
                                            <label for="adjudication_id" class="mb-2">Adjudication</label>
                                            <select name="adjudication_id" class="form-control" wire:model="adjudication_id">
                                                <option value="">séléctionner l'adjudication</option>
                                                @foreach($adjudications as $adjudication)
                                                    <option value="{{$adjudication->id}}">{{$adjudication->adjudication}}</option>
                                                @endforeach
                                            </select>
                                            @error('adjudication_id') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="objet">Objet</label>
                                        <textarea name="objet" placeholder="objet" class="form-control" rows="5" wire:model="objet"></textarea>
                                        @error('objet') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>

                                    <div class="row mb-3">
                                        <div class="form-group col-4">
                                            <label for="rc" class="mb-2">RC</label>
                                            <div class="custom-file" wire:ignore>
                                                <input type="file" class="custom-file-input" id="customFile" wire:model="rc">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                            @error('rc') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>

                                        <div class="form-group col-4">
                                            <label for="cps" class="mb-2">CPS</label>
                                            <div class="custom-file" wire:ignore>
                                                <input type="file" class="custom-file-input" id="customFile" wire:model="cps">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                            @error('cps') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>

                                        <div class="form-group col-4">
                                            <label for="avis" class="mb-2">AVIS</label>
                                            <div class="custom-file" wire:ignore>
                                                <input type="file" class="custom-file-input" id="customFile" wire:model="avis">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                            @error('AVIS') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>

                                    </div>
                                    <div class="form-group clearfix">
                                        <div class="" style="display: flex; justify-content: end">
                                            <div class="button">
                                                <button class="pull-right btn btn-primary" type="button" wire:click="firstStepSubmit">Suivant</button>
                                            </div>
                                        </div>
                                    </div>

                                </section>
                            @endif
                            @if($currentStep == 2)
                                <section class="section_2 form-step" id="section_2">
                                    <div class="partie_admin mb-4">
                                        <fieldset class="p-3 border scheduler-border">
                                            <legend class="scheduler-border text-capitalize" style="font-size:18px">partie administratif </legend>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="header bg-blue-light p-2">
                                                        <h6 class="text-white text-capitalize m-0 text-gray-dark text-bold">secrétaires</h6>
                                                    </div>
                                                    <div class="form-group"  wire:ignore>
                                                        <select class="form-control" id="multiselect_administratif" wire:model="select_partie_administratif" multiple style="height:120px">
                                                            @foreach($secretaires as $secretaire)
                                                                <option value="{{$secretaire->id}}">{{$secretaire->nom_prenom}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="col-4 d-flex justify-content-center align-items-center">
                                                    <div>
                                                        <button type="button" class="btn bg-blue-light d-block mb-3 text-bold text-gray-dark multiSelectRightLeftAdministratif" id="multiselect_administratif_rightSelected">>></button>
                                                        <button type="button" class="btn bg-blue-light d-block text-bold text-gray-dark multiSelectRightLeftAdministratif" id="multiselect_administratif_leftSelected"><<</button>
                                                    </div>

                                                </div>
                                                <div class="col-4" wire:ignore>
                                                    <div class="header bg-blue-light p-2">
                                                        <h6 class="text-white text-capitalize text-gray-dark text-bold m-0">secrétaires affectés</h6>
                                                    </div>
                                                    <select name="utilisateurs_ids[]" id="multiselect_administratif_to" class="form-control" multiple style="height:120px"></select>
                                                </div>
                                                @error('select_partie_administratif') <span class="error text-danger mr-5">{{$message}}</span> @enderror
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="partie_finance mb-4">
                                        <fieldset class="p-3 border scheduler-border">
                                            <legend class="scheduler-border text-capitalize" style="font-size:18px">partie financiaire </legend>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="header  bg-blue-light p-2">
                                                        <h6 class="text-white text-capitalize text-gray-dark text-bold m-0">BUs</h6>
                                                    </div>
                                                    <div class="form-group" wire:ignore>
                                                        <select class="form-control" id="multiselect_finance" multiple style="height:120px">
                                                            @foreach($bus as $bu)
                                                                <option value="{{$bu->id}}">{{$bu->nom}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="col-4 d-flex justify-content-center align-items-center">
                                                    <div>
                                                        <button type="button" class="btn bg-blue-light text-bold d-block mb-3  text-gray-dark multiSelectRightLeftFinanciaire" id="multiselect_finance_rightSelected">>></button>
                                                        <button type="button" class="btn bg-blue-light text-bold d-block  text-gray-dark multiSelectRightLeftFinanciaire" id="multiselect_finance_leftSelected"><<</button>
                                                    </div>

                                                </div>
                                                <div class="col-4" wire:ignore>
                                                    <div class="header bg-blue-light p-2">
                                                        <h6 class="text-capitalize m-0 text-gray-dark text-bold">BUs affectés</h6>
                                                    </div>
                                                    <select name="bus_ids[]" id="multiselect_finance_to" class="form-control" multiple style="height:120px"></select>
                                                </div>
                                                @error('select_partie_financiaire') <span class="error text-danger mr-5">{{$message}}</span> @enderror
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="patie_tech mb-4">
                                        <fieldset class="p-3 border scheduler-border">
                                            <legend class="scheduler-border text-capitalize" style="font-size:18px">partie technique </legend>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="header bg-blue-light p-2">
                                                        <h6 class="text-gray-dark text-capitalize m-0 text-bold">departements</h6>
                                                    </div>
                                                    <div class="form-group" wire:ignore>
                                                        <select class="form-control" id="multiselect_tech" multiple style="height:120px">
                                                            @foreach($departements as $departement)
                                                                <option value="{{$departement->id}}">{{$departement->nom}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="col-4 d-flex justify-content-center align-items-center">
                                                    <div>
                                                        <button type="button" class="btn bg-blue-light d-block text-bold mb-3  text-gray-dark multiSelectRightLeftTechnique" id="multiselect_tech_rightSelected">>></button>
                                                        <button type="button" class="btn bg-blue-light d-block text-bold  text-gray-dark multiSelectRightLeftTechnique" id="multiselect_tech_leftSelected"><<</button>
                                                    </div>

                                                </div>
                                                <div class="col-4" wire:ignore>
                                                    <div class="header bg-blue-light p-2">
                                                        <h6 class="text-white text-capitalize m-0 text-gray-dark text-bold">departements affectés</h6>
                                                    </div>
                                                    <select name="departements_ids[]" id="multiselect_tech_to" class="form-control" multiple style="height:120px"></select>
                                                </div>
                                                @error('select_partie_financiaire') <span class="error text-danger mr-5">{{$message}}</span> @enderror
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="form-group clearfix">
                                        <div class="" style="display: flex; justify-content: space-between">
                                            <div class="button">
                                                <button class="pull-left btn btn-primary btn-prev" type="button" wire:click="back(1)">Précédant</button>
                                            </div>
                                            <div class="button">
                                                <button class="pull-right btn btn-primary btn-next" type="button" wire:click="secondStepSubmit">Suivant</button>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <script>
                                    $('#multiselect_administratif').multiselect();
                                    $('#multiselect_finance').multiselect();
                                    $('#multiselect_tech').multiselect();

                                    $(".multiSelectRightLeftAdministratif").click(function(){
                                        var myList = $("#multiselect_administratif_to option").map(function() {
                                            return this.value;
                                        }).get();

                                    @this.select_partie_administratif =  myList;
                                    });

                                    $(".multiSelectRightLeftFinanciaire").click(function(){
                                        var myList = $("#multiselect_finance_to option").map(function() {
                                            return this.value;
                                        }).get();

                                    @this.select_partie_financiaire =  myList;
                                    });

                                    $(".multiSelectRightLeftTechnique").click(function(){
                                        var myList = $("#multiselect_tech_to option").map(function() {
                                            return this.value;
                                        }).get();

                                    @this.select_partie_technique =  myList;
                                    });

                                </script>

                            @endif

                            @if($currentStep == 3)
                                <section class="section_3 form-step" id="section_3">
                                    <div class="map mymap w-100  mb-3" style="height:600px" id="mymap" wire:ignore></div>
                                    <div class="form-group clearfix">
                                        <div class="" style="display: flex; justify-content: space-between">
                                            <div class="button">
                                                <button class="pull-left btn btn-primary bg-blue-button btn-prev" type="button" wire:click="back(2)">Précédant</button>
                                            </div>
                                            <div class="button">
                                                <input class="pull-right btn btn-primary bg-blue-button btn-next" type="submit" value="Ajouter">
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <!--begin: Start draw Modal -->
                                <div class="modal fade" id="startdrawModal" tabindex="-1" role="dialog" aria-labelledby="startdrawModalLabel" aria-hidden="true" wire:ignore.self>
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
                                                                <a id="startDrawPoint" class="card-link">Add Point</a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="card" >
                                                            <div class="card-body">
                                                                <h5 class="card-title">Line</h5>
                                                                <h6 class="card-subtitle mb-2 text-muted">Road, River, Telephone Wire, etc.</h6>
                                                                <p class="card-text"><i class="fas fa-road fa-2x"></i></p>
                                                                <a id="startDrawLine" class="card-link">Add Line</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="card" >
                                                            <div class="card-body">
                                                                <h5 class="card-title">Polygon</h5>
                                                                <h6 class="card-subtitle mb-2 text-muted">Building, Garden, Ground, etc.</h6>
                                                                <p class="card-text"><i class="fas fa-draw-polygon fa-2x"></i></p>
                                                                <a id="startDrawPolygon" class="card-link">Add Polygon</a>
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
                                <div class="modal fade" id="enterInformationModal" tabindex="-1" role="dialog" aria-labelledby="enterInformationModalLabel" aria-hidden="true" wire:ignore.self>
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
                                                    <input type="text" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" wire:model="adresse">
                                                    <small id="textHelp" class="form-text text-muted">Address, Name, etc.</small>
                                                </div>
                                                <!-- end: Input -->
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="clearDrawSource()">Close</button>
                                                <button type="button" class="btn btn-primary" wire:click="saveFeatureToDb">Save Featues</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end: enter information Modal -->


                                <script>

                                    //open layer code
                                    // All Global Variable
                                    var draw
                                    var flagIsDrawingOn = false
                                    var selectedGeomType


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
                                        //console.log(geojsonFeatureArray[0]);

                                        //var adresses = [];


                                        for (var i=0;i<geojsonFeatureArray.length;i++){

                                        @this.pushInListOfGeom(document.getElementById('exampleInputtext1').value, JSON.stringify(geojsonFeatureArray[i].geometry));

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

                                    $("#startDrawLine").click(function(){startDraw('LineString'); });
                                    $("#startDrawPolygon").click(function(){startDraw('Polygon');});
                                    $("#startDrawPoint").click(function(){startDraw('Point');});

                                    window.addEventListener('saveToDb', function(){
                                        savetodb();
                                    });

                                </script>
                            @endif
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

            $('#partenariat_id').select2({
                placeholder: "Selectionner les partenariats",
                theme:'bootstrap4'
            });




            $("#partenariat_id").on('change', function(){
            @this.partenariat_id =  $(this).val();
            @this.setChefDeFilOptions();
            });

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

        window.addEventListener('aoSaved', function(){
            Swal.fire(
                'Added!',
                'AO has been Added.',
                'success'
            )
        });
    </script>
@endpush
