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
{{--sweet alert2--}}
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Openlayers JS -->
<script src="https://openlayers.org/en/v4.6.5/build/ol.js" type="text/javascript"></script>

<script src="https://cdn.rawgit.com/crlcu/multiselect/v2.5.1/dist/js/multiselect.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js" integrity="sha512-zMfrMAZYAlNClPKjN+JMuslK/B6sPM09BGvrWlW+cymmPmsUT1xJF3P4kxI3lOh9zypakSgWaTpY6vDJY/3Dig==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>

    $(document).ready(function () {
        $('#multiselect_administratif').multiselect();
        $('#multiselect_finance').multiselect();
        $('#multiselect_tech').multiselect();

        $("html").niceScroll({
            horizrailenabled: false,
        });
        $(".niceScroll").niceScroll({
            horizrailenabled: false,
        });

    });


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


        var layerArray = [baseLayer]

        var map = new ol.Map({
            target : 'mymap',
            view: myview,
            layers:layerArray,
        })


</script>

@yield('scriptsSection')

@stack('scripts')

@livewireScripts
