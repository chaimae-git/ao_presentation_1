<section class="section_2 form-step" id="section_2">
    <div class="partie_admin mb-4">
        <fieldset class="p-3 border scheduler-border">
            <legend class="scheduler-border text-capitalize" style="font-size:18px">partie administratif </legend>
            <div class="row">
                <div class="col-4">
                    <div class="header bg-blue-light p-2">
                        <h6 class="text-white text-capitalize m-0 text-gray-dark text-bold">secrétaires</h6>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="multiselect_administratif" multiple style="height:120px">
                            @foreach($secretaires as $secretaire)
                            <option value="{{$secretaire->id}}">{{$secretaire->nom_prenom}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="col-4 d-flex justify-content-center align-items-center">
                    <div>
                        <button type="button" class="btn bg-blue-light d-block mb-3 text-bold text-gray-dark" id="multiselect_administratif_rightSelected">>></button>
                        <button type="button" class="btn bg-blue-light d-block text-bold text-gray-dark" id="multiselect_administratif_leftSelected"><<</button>
                    </div>

                </div>
                <div class="col-4">
                    <div class="header bg-blue-light p-2">
                        <h6 class="text-white text-capitalize text-gray-dark text-bold m-0">secrétaires affectés</h6>
                    </div>
                    <select name="utilisateurs_ids[]" id="multiselect_administratif_to" class="form-control" multiple style="height:120px"></select>
                </div>
                @error('utilisateurs_ids') <span class="mr-5 error text-danger">{{$message}}</span> @enderror
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
                    <div class="form-group">
                        <select class="form-control" id="multiselect_finance" multiple style="height:120px">
                            @foreach($bus as $bu)
                            <option value="{{$bu->id}}">{{$bu->nom}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="col-4 d-flex justify-content-center align-items-center">
                    <div>
                        <button type="button" class="btn bg-blue-light text-bold d-block mb-3  text-gray-dark" id="multiselect_finance_rightSelected">>></button>
                        <button type="button" class="btn bg-blue-light text-bold d-block  text-gray-dark" id="multiselect_finance_leftSelected"><<</button>
                    </div>

                </div>
                <div class="col-4">
                    <div class="header bg-blue-light p-2">
                        <h6 class="text-capitalize m-0 text-gray-dark text-bold">BUs affectés</h6>
                    </div>
                    <select name="bus_ids[]" id="multiselect_finance_to" class="form-control" multiple style="height:120px"></select>
                </div>
                @error('bus_ids') <span class="mr-5 error text-danger">{{$message}}</span> @enderror
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
                    <div class="form-group">
                        <select class="form-control" id="multiselect_tech" multiple style="height:120px">
                            @foreach($departements as $departement)
                            <option value="{{$departement->id}}">{{$departement->nom}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="col-4 d-flex justify-content-center align-items-center">
                    <div>
                        <button type="button" class="btn bg-blue-light d-block text-bold mb-3  text-gray-dark" id="multiselect_tech_rightSelected">>></button>
                        <button type="button" class="btn bg-blue-light d-block text-bold  text-gray-dark" id="multiselect_tech_leftSelected"><<</button>
                    </div>

                </div>
                <div class="col-4">
                    <div class="header bg-blue-light p-2">
                        <h6 class="text-white text-capitalize m-0 text-gray-dark text-bold">departements affectés</h6>
                    </div>
                    <select name="departements_ids[]" id="multiselect_tech_to" class="form-control" multiple style="height:120px"></select>
                </div>
                @error('departements_ids') <span class="mr-5 error text-danger">{{$message}}</span> @enderror
            </div>
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


