<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Openlayers CSS -->
    <link rel="stylesheet" href="https://openlayers.org/en/v4.6.5/css/ol.css" type="text/css">
</head>
<body>




        <?php $decode_json = json_decode($geo[0]->geojson) ?>
{{--        {{dd(print_r($decode_json->coordinates))}}--}}


    <div class="mymap" id="mymap"></div>

    <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=requestAnimationFrame,Element.prototype.classList,URL"></script>
    <script src="https://openlayers.org/en/v4.6.5/build/ol.js"></script>
{{--    <script src="https://openlayers.org/en/v4.6.5/build/ol.js" type="text/javascript"></script>--}}
    <script>

        var image = new ol.style.Circle({
            radius: 5,
            fill: null,
            stroke: new ol.style.Stroke({color: 'red', width: 1})
        });

        var styles = {
            'Point': new ol.style.Style({
                image: image
            }),
            'LineString': new ol.style.Style({
                stroke: new ol.style.Stroke({
                    color: 'green',
                    width: 1
                })
            }),
            'MultiLineString': new ol.style.Style({
                stroke: new ol.style.Stroke({
                    color: 'green',
                    width: 1
                })
            }),
            'MultiPoint': new ol.style.Style({
                image: image
            }),
            'MultiPolygon': new ol.style.Style({
                stroke: new ol.style.Stroke({
                    color: 'yellow',
                    width: 1
                }),
                fill: new ol.style.Fill({
                    color: 'rgba(255, 255, 0, 0.1)'
                })
            }),
            'Polygon': new ol.style.Style({
                stroke: new ol.style.Stroke({
                    color: 'blue',
                    lineDash: [4],
                    width: 3
                }),
                fill: new ol.style.Fill({
                    color: 'rgba(0, 0, 255, 0.1)'
                })
            }),
            'GeometryCollection': new ol.style.Style({
                stroke: new ol.style.Stroke({
                    color: 'magenta',
                    width: 2
                }),
                fill: new ol.style.Fill({
                    color: 'magenta'
                }),
                image: new ol.style.Circle({
                    radius: 10,
                    fill: null,
                    stroke: new ol.style.Stroke({
                        color: 'magenta'
                    })
                })
            }),
            'Circle': new ol.style.Style({
                stroke: new ol.style.Stroke({
                    color: 'red',
                    width: 2
                }),
                fill: new ol.style.Fill({
                    color: 'rgba(255,0,0,0.2)'
                })
            })
        };

        var styleFunction = function(feature) {
            return styles[feature.getGeometry().getType()];
        };

        var crs = <?php echo json_encode($decode_json->crs)?>;
        var type = "<?php echo $decode_json->type?>";
        var coordinates = <?php echo json_encode($decode_json->coordinates[0])?>;

        alert(coordinates);

        var geojsonObject = {
            'type': 'FeatureCollection',
            'crs': {
            'type': 'name',
                'properties': {
                    'name': 'EPSG:3857'
                }
            },
            'features': [{


                'type': 'Feature',
                'geometry': {
                    'type': type,
                    'coordinates': [[[8213223.834701825,2273873.038359702],[8214127.181558787,2274637.408642553],[8214773.421782804,2273810.498522293],[8214127.181558787,2272184.474704613],[8212938.933103959,2272497.171850569],[8213223.834701825,2273873.038359702]]],
                }
                // 'geometry': {
                //     'type': type,
                //     'coordinates': [coordinates],
                // }
            }]
        }

        var vectorSource = new ol.source.Vector({
            features: (new ol.format.GeoJSON()).readFeatures(geojsonObject)
        });

        vectorSource.addFeature(new ol.Feature(new ol.geom.Circle([5e6, 7e6], 1e6)));

        var vectorLayer = new ol.layer.Vector({
            source: vectorSource,
            style: styleFunction
        });

        var map = new ol.Map({
            layers: [
                new ol.layer.Tile({
                    source: new ol.source.OSM()
                }),
                vectorLayer
            ],
            target: 'mymap',
            controls: ol.control.defaults({
                attributionOptions: {
                    collapsible: false
                }
            }),
            view: new ol.View({
                center: [0, 0],
                zoom: 2
            })
        });












    </script>


{{--    <script>--}}
{{--            //open layer code--}}
{{--            // All Global Variable--}}
{{--            var draw--}}
{{--            var flagIsDrawingOn = false--}}
{{--            //var PointType = ['ATM','Tree','Telephone Poles', 'Electricity Poles'];--}}
{{--            //var LineType = ['National Highway','State Highway','River','Telephone Lines'];--}}
{{--            //var PolygonType = ['Water Body','Commercial Land', 'Residential Land','Building'];--}}
{{--            var selectedGeomType--}}


{{--            $.ajaxSetup({--}}
{{--                headers: {--}}
{{--                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                }--}}
{{--            });--}}

{{--            window.app = {};--}}
{{--            var app = window.app;--}}

{{--            app.DrawingApp = function(opt_options) {--}}

{{--                var options = opt_options || {};--}}

{{--                var button = document.createElement('button');--}}
{{--                button.id = 'drawbtn'--}}
{{--                button.innerHTML = '<i class="fas fa-pencil-ruler"></i>';--}}

{{--                var this_ = this;--}}
{{--                var startStopApp = function(e) {--}}
{{--                    e.preventDefault();--}}
{{--                    if (flagIsDrawingOn == false){--}}
{{--                        $('#startdrawModal').modal('show')--}}

{{--                    } else {--}}
{{--                        map.removeInteraction(draw)--}}
{{--                        flagIsDrawingOn = false--}}
{{--                        document.getElementById('drawbtn').innerHTML = '<i class="fas fa-pencil-ruler"></i>'--}}
{{--                        //defineTypeofFeature()--}}
{{--                        $("#enterInformationModal").modal('show')--}}

{{--                    }--}}
{{--                };--}}

{{--                button.addEventListener('click', startStopApp, false);--}}
{{--                button.addEventListener('touchstart', startStopApp, false);--}}

{{--                var element = document.createElement('div');--}}
{{--                element.className = 'draw-app ol-unselectable ol-control';--}}
{{--                element.appendChild(button);--}}

{{--                ol.control.Control.call(this, {--}}
{{--                    element: element,--}}
{{--                    target: options.target--}}
{{--                });--}}

{{--            };--}}
{{--            ol.inherits(app.DrawingApp, ol.control.Control);--}}
{{--            var myview = new ol.View({--}}
{{--                center : [8214563.509192685, 2272903.8536058646],--}}
{{--                projection: 'EPSG:3857',--}}
{{--                zoom:14--}}
{{--            });--}}

{{--            // OSM Layer--}}
{{--            var baseLayer = new ol.layer.Tile({--}}
{{--                source : new ol.source.OSM({--}}
{{--                    attributions:'Surveyor Application'--}}
{{--                })--}}
{{--            });--}}


{{--            // Geoserver Layer--}}
{{--            var featureLayersourse = new ol.source.TileWMS({--}}
{{--                url:'http://localhost:8080/geoserver/survey_app/wms',--}}
{{--                params:{'LAYERS':'survey_app:drawnFeature', 'tiled' : true},--}}
{{--                serverType:'geoserver'--}}
{{--            })--}}
{{--            var featureLayer = new ol.layer.Tile({--}}
{{--                source:featureLayersourse--}}
{{--            })--}}
{{--            // Draw vector layer--}}
{{--            // 1 . Define source--}}
{{--            var drawSource = new ol.source.Vector()--}}
{{--            // 2. Define layer--}}
{{--            var drawLayer = new ol.layer.Vector({--}}
{{--                source : drawSource--}}
{{--            })--}}
{{--            // Layer Array--}}
{{--            var layerArray = [baseLayer/*,featureLayer*/,drawLayer]--}}
{{--            // Map--}}
{{--            var map = new ol.Map({--}}
{{--                controls: ol.control.defaults({--}}
{{--                    attributionOptions: {--}}
{{--                        collapsible: false--}}
{{--                    }--}}
{{--                }).extend([--}}
{{--                    new app.DrawingApp()--}}
{{--                ]),--}}
{{--                target : 'mymap',--}}
{{--                view: myview,--}}
{{--                layers:layerArray,--}}
{{--                //overlays: [popup]--}}
{{--            })--}}



{{--            // Function to start Drawing--}}
{{--            function startDraw(geomType){--}}
{{--                selectedGeomType = geomType--}}
{{--                draw = new ol.interaction.Draw({--}}
{{--                    type:geomType,--}}
{{--                    source:drawSource--}}
{{--                })--}}
{{--                $('#startdrawModal').modal('hide')--}}

{{--                map.addInteraction(draw)--}}
{{--                flagIsDrawingOn = true--}}
{{--                document.getElementById('drawbtn').innerHTML = '<i class="far fa-stop-circle"></i>'--}}
{{--            }--}}


{{--            // Function to add types based on feature--}}
{{--            // function defineTypeofFeature(){--}}
{{--            //     var dropdownoftype = document.getElementById('typeofFeatures')--}}
{{--            //     dropdownoftype.innerHTML = ''--}}
{{--            //     if (selectedGeomType == 'Point'){--}}
{{--            //         for (i=0;i<PointType.length;i++){--}}
{{--            //             var op = document.createElement('option')--}}
{{--            //             op.value = PointType[i]--}}
{{--            //             op.innerHTML = PointType[i]--}}
{{--            //             dropdownoftype.appendChild(op)--}}
{{--            //         }--}}
{{--            //     } else if (selectedGeomType == 'LineString'){--}}
{{--            //         for (i=0;i<LineType.length;i++){--}}
{{--            //             var op = document.createElement('option')--}}
{{--            //             op.value = LineType[i]--}}
{{--            //             op.innerHTML = LineType[i]--}}
{{--            //             dropdownoftype.appendChild(op)--}}
{{--            //         }--}}
{{--            //     }else{--}}
{{--            //         for (i=0;i<PolygonType.length;i++){--}}
{{--            //             var op = document.createElement('option')--}}
{{--            //             op.value = PolygonType[i]--}}
{{--            //             op.innerHTML = PolygonType[i]--}}
{{--            //             dropdownoftype.appendChild(op)--}}
{{--            //         }--}}
{{--            //     }--}}
{{--            // }--}}


{{--            // Function to save information in db--}}
{{--            function savetodb(){--}}
{{--                // get array of all features--}}
{{--                var featureArray = drawSource.getFeatures();--}}

{{--                if(featureArray.length == 1) alert('hello');--}}
{{--                // Define geojson format--}}
{{--                var geogJONSformat = new ol.format.GeoJSON()--}}
{{--                // Use method to convert feature to geojson--}}
{{--                var featuresGeojson = geogJONSformat.writeFeaturesObject(featureArray)--}}
{{--                // Array of all geojson--}}
{{--                var geojsonFeatureArray = featuresGeojson.features--}}

{{--                for (i=0;i<geojsonFeatureArray.length;i++){--}}
{{--                    //var type = document.getElementById('typeofFeatures').value--}}
{{--                    var adresse = document.getElementById('exampleInputtext1').value--}}
{{--                    var geom = JSON.stringify(geojsonFeatureArray[i].geometry)--}}
{{--                    //if (type != ''){--}}
{{--                    $.ajax({--}}
{{--                        url:"{{route('aos.add_location')}}",--}}
{{--                        type:'POST',--}}
{{--                        data :{--}}
{{--                            //typeofgeom : type,--}}
{{--                            adresseofgeom : adresse,--}}
{{--                            stringofgeom : geom--}}
{{--                        },--}}
{{--                        success : function(dataResult){--}}
{{--                            var result = JSON.parse(dataResult)--}}
{{--                            if (result.statusCode == 200){--}}
{{--                                console.log('data added successfully')--}}
{{--                            } else {--}}
{{--                                console.log('data not added successfully')--}}
{{--                            }--}}

{{--                        }--}}
{{--                    });--}}
{{--                    //} else {--}}
{{--                    //    alert('please select type')--}}
{{--                    //}--}}
{{--                }--}}

{{--                // Update layer--}}
{{--                var params = featureLayer.getSource().getParams();--}}
{{--                params.t = new Date().getMilliseconds();--}}
{{--                featureLayer.getSource().updateParams(params);--}}

{{--                // Close the Modal--}}
{{--                $("#enterInformationModal").modal('hide')--}}

{{--                //clearDrawSource ()--}}

{{--            }--}}


{{--            function clearDrawSource (){--}}
{{--                drawSource.clear()--}}
{{--            }--}}
{{--        </script>--}}
</body>
</html>



