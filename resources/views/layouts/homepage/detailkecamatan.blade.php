@include('layouts.component.headerhomepage')

    <!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area text-center shadow dark bg-fixed text-light" style="background-image: url({{ url('assetsdepan/img/banner.jpg')}} );">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h1>{{ $detailkecamatan->nama_kecamatan }}</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
                            <li class="active">Kecamatan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Star Project Details Area
    ============================================= -->
    <div class="project-details-area default-padding">
        <div class="container">
            <div class="project-details-items">
                <div class="top-info">
                    <div class="row">
                        <div class="col-xl-12 left-info">
                            <h2>{{ $detailkecamatan->nama_kecamatan }}</h2>
                            <div  style="overflow:auto">
                                <?php echo $detailkecamatan->informasi_tambahan;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Project Details Area -->

    <!-- Start Contact Us 
    ============================================= -->
    <div class="contact-area bg-gray default-padding" style="background-image: url(assets/img/shape/28.png);">
        <div class="container">
            <div class="row align-center">
                
                <div class="col-tact-stye-one col-lg-12">
                    <div class="contact-form-style-one mb-md-50">
                        <h5 class="sub-title">Maps Area</h5>
                        <h2 class="heading">Maps Area Khusus Bagian {{ $detailkecamatan->nama_kecamatan }}</h2>
                        <div id="map"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Contact -->

    <script>

    var map = L.map('map').setView([1.3234339197073528, 124.84063540933153], 12);
    const apiKey = "AAPKe1e02d452ac74e9b9a57913d49e6ca73XntLgl_BvHud8Lw7nn-265FcxkM-UOu2yJhz4CRUaUda6WCx5pElHcaF15IvkHoL";
    
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    
    

    @foreach ($produksikecamatan as $tampilmaps)  
    var marker = L.marker([{{ $tampilmaps->lokasi_gps }}]).addTo(map).bindPopup("<div class='card'><img class='card-img-top' src='{{ url ('gambarproduksi/') }}/{{ $tampilmaps->gambar }}' alt='gambar_wisata' style='object-fit:cover;height:150px'><div class='card-body'><a href='{{ route ('homepage.detailproduksi',$tampilmaps->id) }}' class='btn btn-success'>{{ $tampilmaps->nama_produksi}} ({{ $tampilmaps->created_at}})</a> </div></div>");
    @endforeach

    function drawZone(){
        // alert("Called Draw Zone");
        
        let layers = [];
        let layerCoords = [];
        let layer = [];
        let zoneColor = '';
        var polygon;
        @foreach($zonasi as $z)
            layerCoords = {!!$z->zone_collections!!};
            layer = [];
            zoneColor = '{!!$z->warna!!}';
            layerCoords.forEach((latlng)=>{
                layer.push([latlng.lat,latlng.lng]);
            });
            polygon = L.polygon(layer,{color:zoneColor}).addTo(map).bindPopup("<div class='card' ><img class='card-img-top' src='{{ url ('gambarproduksi/') }}/{{ $tampilmaps->gambar }}' alt='gambar_wisata' style='object-fit:cover;height:150px'><br><br><div class='card-body' style='font-size: 16px;'><p style='display:block;width:100%'>{{$z->produksi}}</p><a href='{{ route ('homepage.detailproduksi',$tampilmaps->id) }}' class='btn btn-success btn-sm'>Detail</a> </div></div>");;
            // polygon.on('click',function(){
            //     map.fitBounds(this.getBounds());
            // });
        @endforeach
    }
    @if(count($zonasi)>0)
        drawZone();
    @endif

</script>    

@include('layouts.component.footerhomepage')