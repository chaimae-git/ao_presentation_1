<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Openlayers JS -->
<script src="https://openlayers.org/en/v4.6.5/build/ol.js" type="text/javascript"></script>

<script src="https://cdn.rawgit.com/crlcu/multiselect/v2.5.1/dist/js/multiselect.min.js"></script>
<script>
    $(document).ready(function () {
        $('#multiselect_administratif').multiselect();
        $('#multiselect_finance').multiselect();
        $('#multiselect_tech').multiselect();

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

@yield('scriptsSection')

@stack('scripts')

@livewireScripts
