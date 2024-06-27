@include('layouts.component.header')

<!-- Main Container -->
<style>
    #map {
        height: 500px;
        ,
        position: absolute;
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
    }

</style>
<style>
    #mapke2 {
        height: 500px;
        ,
        position: absolute;
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
    }

</style>
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb push bg-body-extra-light rounded-pill px-4 py-2">
            <a class="breadcrumb-item" href="javascript:void(0)">Produksi</a>
            <span class="breadcrumb-item active">Detail Zonasi Lahan Produksi</span>
        </nav>

        <!-- Dynamic Table Responsive -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Data Zonasi Lahan Produksi 
                </h3>
            </div>
            <div class="block-content block-content-full">
                 <div class="row">
                        <label class="col-sm-3 col-form-label">Kecamatan</label>
                        <div class="col-sm-9">
                            <input type="text" readonly class="form-control" value="{{$data->kecamatan}}"/>
                            
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <label class="col-sm-3 col-form-label">Produksi</label>
                        <div class="col-sm-9">
                            <input type="text" readonly value="{{$data->produksi}}" class="form-control"/>
                           
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <label class="col-sm-3 col-form-label">Titik Zonasi di Map</label>
                        <div class="col-sm-12">
                            <div id="map"></div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <label class="col-sm-3 col-form-label">Latitude Longitude</label>
                        <div class="col-sm-12">
                            <input type="hidden" id="value_zone" name="zone_collections" />
                            <div id="zone_collections">
                                {{$data->zone_collections}}
                            </div>
                        </div>
                    </div>
                    <br>

                   

                
            </div>
        </div>
        <!-- Dynamic Table Responsive -->

    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    function getProduksi(id) {
        $.get("{{url('api/get_produksi')}}/" + id, function (data) {
            // var element = JSON.parse(data);
            //   alert(JSON.stringify(data) + ":" + "{{url('api/get_reporter')}}/" + id);
            createOptions('id_produksi', data['data']);


        });
    }

    function createOptions(id, data) {
        var selectElement = document.getElementById(id);
        while (selectElement.options.length) {
            selectElement.remove(0);
        }
        for (let i = 0; i < data.length; i++) {
            var tmp = new Option(data[i]["nama_produksi"], data[i]["id"]);
            selectElement.options.add(tmp);
        }
    }

</script>

<!-- Load Leaflet from CDN -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
    integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
    integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

<!-- Load Esri Leaflet from CDN -->
<script src="https://unpkg.com/esri-leaflet@3.0.2/dist/esri-leaflet.js"
    integrity="sha512-myckXhaJsP7Q7MZva03Tfme/MSF5a6HC2xryjAM4FxPLHGqlh5VALCbywHnzs2uPoF/4G/QVXyYDDSkp5nPfig=="
    crossorigin=""></script>

<!-- Load Esri Leaflet Geocoder from CDN -->
<link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@3.0.0/dist/esri-leaflet-geocoder.css"
    integrity="sha512-IM3Hs+feyi40yZhDH6kV8vQMg4Fh20s9OzInIIAc4nx7aMYMfo+IenRUekoYsHZqGkREUgx0VvlEsgm7nCDW9g=="
    crossorigin="">
<script src="https://unpkg.com/esri-leaflet-geocoder@3.0.0/dist/esri-leaflet-geocoder.js"
    integrity="sha512-vZbMwAf1/rpBExyV27ey3zAEwxelsO4Nf+mfT7s6VTJPUbYmD2KSuTRXTxOFhIYqhajaBU+X5PuFK1QJ1U9Myg=="
    crossorigin=""></script>
<script src='https://unpkg.com/wicg-inert@latest/dist/inert.min.js'></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet-draw@1.0.2/dist/leaflet.draw.css" />
<script src="https://unpkg.com/leaflet-draw@1.0.2/dist/leaflet.draw-src.js"></script>


<script>
    String.prototype.removeCharAt = function (i) {
        var tmp = this.split(''); // convert to an array
        tmp.splice(i - 1, 1); // remove 1 element from the array (adjusting for non-zero-indexed counts)
        return tmp.join(''); // reconstruct the string
    }
    var cloudmadeUrl = 'http://{s}.tile.cloudmade.com/BC9A493B41014CAABB98F0471D759707/997/256/{z}/{x}/{y}.png';
    cloudmade = new L.TileLayer(cloudmadeUrl, {
        maxZoom: 18
    });
    var layer1 = JSON.parse('{!!$data->zone_collections!!}');
    


    var map = L.map('map', {
        layers: [cloudmade]
    }).setView([1.3234339197073528, 124.84063540933153], 12);
    const apiKey =
        "AAPKe1e02d452ac74e9b9a57913d49e6ca73XntLgl_BvHud8Lw7nn-265FcxkM-UOu2yJhz4CRUaUda6WCx5pElHcaF15IvkHoL";

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    


    // var editableLayers = L.featureGroup().addTo(map);
    // var tmp = [];
    // var drawControl = new L.Control.Draw({
    //     edit: {
    //         featureGroup: editableLayers
    //     },
    //     draw: {
    //       polygon: {
    //         allowIntersection: false, // Restricts shapes to simple polygons
    //         drawError: {
    //           color: '#e1e100', // Color the shape will turn when intersects
    //           message: '<strong>Oh snap!<strong> you can\'t draw that!' // Message that will show when intersect
    //         },
    //         shapeOptions: {
    //           color: '#97009c'
    //         }
    //       },
    //       marker:false,
    //       rectangle:false,
    //       circle:false,
    //       polyline:false,
    //       circlemarker:false,
    //       area:false
    //     }
    // }).addTo(map);


    function drawSavedPolygon(){
      var poly1 = [];
      layer1.forEach((latlng)=>{
        poly1.push([latlng.lat,latlng.lng]);
      });
     
      var polygon1= L.polygon(poly1,{color:'{{$data->warna}}'}).addTo(map);
    //   editableLayers.addLayer(polygon1);
      
    }
    drawSavedPolygon();
    // map.on(L.Draw.Event.CREATED, function (e) {
    //     var type = e.layerType,
    //         layer = e.layer;
    //     var LatLngsString = JSON.stringify(layer.getLatLngs());
    //     LatLngsString = LatLngsString.removeCharAt(1);
    //     LatLngsString = LatLngsString.removeCharAt(LatLngsString.length-1);
    //     var txt = document.getElementById('zone_collections');
    //     txt.innerHTML = LatLngsString;
    //     var val = document.getElementById('value_zone');
    //     val.value = LatLngsString;
        
    //     // alert(JSON.stringify(layer.getLatLngs()));
    //     editableLayers.addLayer(layer);
    // });
    // map.on('draw:edited',function(e){
    //   var layers = e.layers;
    //   layers.eachLayer(function(layer){
    //     var LatLngsString = JSON.stringify(layer.getLatLngs());
    //     LatLngsString = LatLngsString.removeCharAt(1);
    //     LatLngsString = LatLngsString.removeCharAt(LatLngsString.length-1);
    //     var txt = document.getElementById('zone_collections');
    //     txt.innerHTML = LatLngsString;
    //     var val = document.getElementById('value_zone');
    //     val.value = LatLngsString;
    //   });
      
    // });
    //         map.on('draw:editvertex', function(e) {
    //     for (thisLayer in e.target._layers) {
    //         if (e.target._layers.hasOwnProperty(thisLayer)) {
    //             if (e.target._layers[thisLayer].hasOwnProperty("edited")) {
    //                 console.log("we think we found the polygon?");
    //                 console.log(e.target._layers[thisLayer]);
    //                 alert(JSON.stringify(e.target._layers[thisLayer]));
    //                 // the updated Polygon array points are here:
    //                 newPolyLatLngArray = e.target._layers[thisLayer].editing.latlngs[0];
    //             }
    //         }
    //     };
    // });

    function getLatLng() {
        alert(JSON.stringify(editableLayers.layer));
    }

</script>
@include('layouts.component.footer')
