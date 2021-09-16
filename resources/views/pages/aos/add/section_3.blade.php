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
