@include('layouts.component.headerhomepage')

    <!-- Start Banner Area 
    ============================================= -->
    <div class="banner-area navigation-circle text-light banner-style-one zoom-effect overflow-hidden">
        <!-- Slider main container -->
        <div class="banner-fade">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
            @foreach ($produksiterbaru as $tampilproduksi)  
                <!-- Single Item -->
                <div class="swiper-slide banner-style-one">
                    <div class="banner-thumb bg-cover shadow dark" style="background: url({{ url ('gambarproduksi/') }}/{{ $tampilproduksi->gambar }});"></div>
                    <div class="container">
                        <div class="row align-center">
                            <div class="col-xl-7">
                                <div class="content">
                                    <h4>{{$tampilproduksi->created_at }}</h4>
                                    <h2><strong>{{$tampilproduksi->foreign_kecamatan->nama_kecamatan }}</strong> {{$tampilproduksi->nama_produksi }}</h2>
                                    <div class="button">
                                        <a class="btn btn-theme secondary btn-md radius animation" href="{{ route ('homepage.detailproduksi', $tampilproduksi->id) }}">Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->
            @endforeach

            </div>

            <!-- Navigation -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

        </div>        
    </div>
    <!-- End Main -->

    <!-- Start About 
    ============================================= -->
    <div class="about-style-one-area default-padding">

        <!-- Shape -->
        <div class="shape-right-top">
            <img src="{{url('assetsdepan/img/shape/leaf.png')}}" alt="Image not found">
        </div>
        <!-- End Shape -->

        <div class="container">
            <div class="row align-center">
                <div class="col-xl-5 col-lg-6 about-style-one pr-50 pr-md-15 pr-xs-15">
                    <div class="thumb">
                        <img src="{{url('assetsdepan/img/panen.jpeg')}}" alt="Image Not Found">
                        <div class="sub-item">
                            <img src="{{url('assetsdepan/img/1.jpg')}}" alt="Image Not Found">
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6 about-style-one">
                    <div class="row align-center">
                        <div class="col-xl-7 col-lg-12">
                            <h2 class="heading">Sedikit Penjelasan <br> Mengenai Website ini</h2>
                            <p>
                             website ini di rancang akan mempermudahkan masyarakat atau pihak terkait untuk menemukan data informasi wilayah zonasi pertanian di Kota Tomohon. Sistem yang akan dirancang akan menggunakan teknologi Sistem Informasi Geografis (SIG) dengan Metode RAD (Rapid Application Development). Sistem Informasi Geografis (SIG) adalah sistem informasi khusus yang mengelola data yang memiliki informasi spasial. SIG juga merupakan sistem komputer yang memiliki kemampuan untuk membangun, menyimpan, mengelola dan menampilkan informasi bereferensi geografis, misalnya data yang diidentifikasi menurut lokasinya, dalam sebuah database     
                           </p>
                            <ul class="check-solid-list mt-20">
                                <li>Database</li>
                                <li>Responsive</li>
                                <li>UI yang terstruktur</li>
                            </ul>
                        </div>
                        <div class="col-xl-5 col-lg-12 pl-50 pl-md-15 pl-xs-15">
                            <div class="top-product-item">
                                <img src="{{url('assetsdepan/img/icon/1.svg')}}" alt="Icon">
                                <h5><a href="#">Produksi</a></h5>
                                <p>
                                    Data Produksi akan langsung ditambah oleh pengelola website
                                </p>
                            </div>
                            <div class="top-product-item">
                                <img src="{{url('assetsdepan/img/icon/2.svg')}}" alt="Icon">
                                <h5><a href="#">Wilayah Pertanian</a></h5>
                                <p>
                                    Wilayah Pertanian akan ditampilkan dalam bentuk MAPS
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About -->

    <!-- Start Why Choose Us 
    ============================================= -->
    <div class="choose-us-style-one-area overflow-hidden default-padding bg-gray">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-6 choose-us-style-one">
                    <div class="thumb">
                        <img src="{{url('assetsdepan/img/panen.jpeg')}}" alt="Image Not Found">
                        <div class="shape">
                            <img class="wow fadeInDown" src="{{url('assetsdepan/img/shape/22.png')}}" alt="Image not found">
                        </div>
                        <div class="product-produce">
                            <div class="icon">
                                <i class="flaticon-farmer"></i>
                            </div>
                            <div class="fun-fact">
                                <div class="counter">
                                    <div class="timer" data-to="{{$countproduksi}}" data-speed="2000">{{$countproduksi}}</div>
                                </div>
                                <span class="medium">Hasil Produksi Pertanian</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 choose-us-style-one">
                    <h5 class="sub-title">FAQ</h5>
                    <h2 class="title">Frequently Asked  <br>Questions</h2>
                    <div class="accordion accordion-regular mt-35" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Apakah pengunjung dapat menambah data ?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>
                                    Data-data yang yang berada dalam website ini hanya bisa di tambah oleh pengelola website.
                                </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Apakah pengunjung dapat mengakses seluruh halaman website ?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>
                                       Pengunjung tidak dapat mengakses seluruh halaman yang ada pada website ini.  </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Apakah pengunjung dapat mendapat akses login ?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>
                                      Tempat login hanya bisa diakses oleh pengelola website.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Why Choose us -->

    <!-- Start Gallery 
    ============================================= -->
    <div class="gallery-style-one-area default-padding-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h5 class="sub-title">Galleri</h5>
                        <h2 class="title">Galleri</h2>
                        <div class="devider"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container container-stage">
            <div class="row">
                <div class="col-xl-12">
                    <div class="carousel-stage-right carousel-style-one swiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Single Item -->
                            <div class="swiper-slide">
                                <div class="gallery-style-one">
                                    <img src="{{url('assetsdepan/img/g1.jpeg')}}" alt="Thumb">
                                    <div class="overlay">
                                        <span>Foto Galleri</span>
                                        <h4><a href="#">Foto Galleri 1</a></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="gallery-style-one">
                                    <img src="{{url('assetsdepan/img/g2.jpeg')}}" alt="Thumb">
                                    <div class="overlay">
                                        <span>Foto Galleri</span>
                                        <h4><a href="#">Foto Galleri 2</a></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="gallery-style-one">
                                    <img src="{{url('assetsdepan/img/g3.jpeg')}}" alt="Thumb">
                                    <div class="overlay">
                                        <span>Foto Galleri</span>
                                        <h4><a href="#">Foto Galleri 3</a></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="gallery-style-one">
                                    <img src="{{url('assetsdepan/img/g4.jpeg')}}" alt="Thumb">
                                    <div class="overlay">
                                        <span>Foto Galleri</span>
                                        <h4><a href="#">Foto Galleri 4</a></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="gallery-style-one">
                                    <img src="{{url('assetsdepan/img/g5.jpeg')}}" alt="Thumb">
                                    <div class="overlay">
                                        <span>Foto Galleri</span>
                                        <h4><a href="#">Foto Galleri 5</a></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="gallery-style-one">
                                    <img src="{{url('assetsdepan/img/g6.jpeg')}}" alt="Thumb">
                                    <div class="overlay">
                                        <span>Foto Galleri</span>
                                        <h4><a href="#">Foto Galleri 6</a></h4>
                                    </div>
                                </div>
                            </div>                                                        
                        </div>

                        <!-- Pagination -->
                        <div class="swiper-pagination"></div>

                    </div>
                </div>
            </div>
        </div>        
    </div>
    <!-- End Gallery -->

    <!-- Start Fun Factor Area
    ============================================= -->
    <div class="fun-facts-area default-padding">
        <div class="shape-left">
            <img src="{{url('assetsdepan/img/shape/27.png')}}" alt="Image Not Found">
        </div>
        <div class="container">
            <div class="item-inner">
                <div class="shape-right">
                    <img src="{{url('assetsdepan/img/shape/26.png')}}" alt="Image Not Found">
                </div>
                <div class="row">
                    <div class="col-lg-4 fun-fact-style-one">
                        <div class="heading">
                            <div class="sub-title">Total</div>
                            <h2 class="title">Total Seluruh <br>Data Statistik</h2>
                        </div>
                    </div>
                    <div class="col-lg-8 fun-fact-style-one text-end">
                        <div class="row">
                            <!-- Single item -->
                            <div class="col-lg-4 col-md-4 item">
                                <div class="fun-fact">
                                    <div class="counter">
                                        <div class="timer" data-to="1" data-speed="2000">1</div>
                                    </div>
                                    <span class="medium">Total User</span>
                                </div>
                            </div>
                            <!-- End Single item -->

                            <!-- Single item -->
                            <div class="col-lg-4 col-md-4 item">
                                <div class="fun-fact">
                                    <div class="counter">
                                        <div class="timer" data-to="{{$countkecamatan}}" data-speed="2000">{{$countkecamatan}}</div>
                                    </div>
                                    <span class="medium">Total Kecamatan</span>
                                </div>
                            </div>
                            <!-- End Single item -->

                            <!-- Single item -->
                            <div class="col-lg-4 col-md-4 item">
                                <div class="fun-fact">
                                    <div class="counter">
                                        <div class="timer" data-to="{{$countproduksi}}" data-speed="2000">{{$countproduksi}}</div>
                                    </div>
                                    <span class="medium">Data Produksi</span>
                                </div>
                            </div>
                            <!-- End Single item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Fun Factor Area -->

    <!-- Start Contact Us 
    ============================================= -->
    <div class="contact-area bg-gray default-padding" style="background-image: url(assets/img/shape/28.png);">
        <div class="container">
            <div class="row align-center">
                
                <div class="col-tact-stye-one col-lg-12">
                    <div class="contact-form-style-one mb-md-50">
                        <h5 class="sub-title">Maps Area</h5>
                        <h2 class="heading">Maps Area</h2>
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
    
    

    @foreach ($mapsproduksi as $tampilmaps)  
    var marker = L.marker([{{$tampilmaps->lokasi_gps}}]).addTo(map).bindPopup("<div class='card' ><img class='card-img-top' src='{{ url ('gambarproduksi/') }}/{{ $tampilmaps->gambar }}' style='object-fit:cover;height:150px' alt='gambar_wisata'><div class='card-body' style='font-size: 16px;'><a href='{{ route ('homepage.detailproduksi',$tampilmaps->id) }}' class='btn btn-primary'>Detail</a> </div></div>");
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
            polygon = L.polygon(layer,{color:zoneColor}).addTo(map).bindPopup("<div class='card' ><img class='card-img-top' src='{{ url ('gambarproduksi/') }}/{{ $tampilmaps->gambar }}' alt='gambar_wisata' style='object-fit:cover;height:150px' ><div class='card-body' style='font-size: 16px;'><p style='display:block;width:100%'>{{$z->produksi}}</p><a href='{{ route ('homepage.detailproduksi',$tampilmaps->id) }}' class='btn btn-success btn-sm'>Detail</a> </div></div>");;
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