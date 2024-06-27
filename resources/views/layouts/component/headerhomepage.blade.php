<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Agrul - Organic Farm Agriculture Template">

    <!-- ========== Page Title ========== -->
    <title>{{ config('app.name') }}</title>

    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="{{url('assetsdepan/img/favicon.png')}}" type="image/x-icon">

    <!-- ========== Start Stylesheet ========== -->
    <link href="{{url('assetsdepan/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('assetsdepan/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{url('assetsdepan/css/themify-icons.css')}}" rel="stylesheet">
    <link href="{{url('assetsdepan/css/elegant-icons.css')}}" rel="stylesheet">
    <link href="{{url('assetsdepan/css/flaticon-set.css')}}" rel="stylesheet">
    <link href="{{url('assetsdepan/css/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{url('assetsdepan/css/swiper-bundle.min.css')}}" rel="stylesheet">
    <link href="{{url('assetsdepan/css/animate.css')}}" rel="stylesheet">
    <link href="{{url('assetsdepan/css/validnavs.css')}}" rel="stylesheet">
    <link href="{{url('assetsdepan/css/helper.css')}}" rel="stylesheet">
    <link href="{{url('assetsdepan/css/style.css')}}" rel="stylesheet">
    <link href="{{url('assetsdepan/css/unit-test.css')}}" rel="stylesheet">
    <link href="{{url('assetsdepan/style.css')}}" rel="stylesheet">
   
	  <!-- Load Leaflet from CDN -->
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
		 integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
		 crossorigin=""/>
 <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
     integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
     crossorigin=""></script>

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

	  <style>
		#map { height:500px;, position: absolute; top:0; bottom:0; right:0; left:0; }
	  </style>
	  <style>
		#mapke2 { height:500px;, position: absolute; top:0; bottom:0; right:0; left:0; }
	  </style>      

    <!-- ========== End Stylesheet ========== -->

</head>

<body>

    <!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

    <!-- Preloader Start -->
    <div class="se-pre-con"></div>
    <!-- Preloader Ends -->

    <!-- Start Header Top 
    ============================================= -->
    <div class="top-bar-area text-light">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-9">
                    <div class="flex-item left">
                        <p>
                            Selamat Datang di Website ini!
                        </p>
                        <ul>
                            <li>
                                <i class="fas fa-map-marker-alt"></i> Kota Tomohon
                            </li>
                            <li>
                                <i class="fas fa-phone-alt"></i> +62 823-4734-3578
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 text-end">
                    <div class="social">
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top -->

    <!-- Header 
    ============================================= -->
    <header>
        <!-- Start Navigation -->
        <nav class="navbar mobile-sidenav inc-shape navbar-common navbar-sticky navbar-default validnavs">

            <!-- Start Top Search -->
            <div class="top-search">
                <div class="container-xl">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                        <input type="text" class="form-control" placeholder="Search">
                        <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                    </div>
                </div>
            </div>
            <!-- End Top Search -->

            <div class="container d-flex justify-content-between align-items-center">            
                

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="index.html">
                        <img src="{{url('assetsdepan/img/logo1.png')}}" class="logo" alt="Logo">
                    </a>
                </div>
                <!-- End Header Navigation -->

                <!-- Main Nav -->
                <div class="main-nav-content">
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar-menu">

                        <img src="{{url('assetsdepan/img/logo1.png')}}" alt="Logo">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                            <i class="fa fa-times"></i>
                        </button>
                        
                        <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="dropdown">
                            <a href="{{ route ('homepage.home') }}" data-toggle="dropdown" >Home</a>
						</li>
                        <li class="dropdown">
                            <a href="{{ route ('homepage.hasilproduksi') }}" data-toggle="dropdown" >Hasil Produksi Pertanian</a>
						</li>                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Kecamatan</a>
                            <ul class="dropdown-menu">
                            @forelse ($menukecamatan as $tampilmenukecamatan)
                                <li><a href="{{ route ('homepage.detailkecamatan',$tampilmenukecamatan->id) }}">{{$tampilmenukecamatan->nama_kecamatan}}</a></li>
								@empty
									<h3 class="text-center">Tidak ada data</h3>
								@endforelse 
                            </ul>
                        </li>                        
                        <li class="dropdown">
                            <a href="{{ route ('login') }}" data-toggle="dropdown" >Login</a>
						</li>                        

                        </ul>
                    </div><!-- /.navbar-collapse -->

                    <div class="attr-right">
                        <!-- Start Atribute Navigation -->
                        <div class="attr-nav">
                            <ul>
                                <li class="contact">
                                    <div class="call">
                                        <div class="icon">
                                            <i class="fas fa-comments-alt-dollar"></i>
                                        </div>
                                        <div class="info">
                                            <p>Have any Questions?</p>
                                            <h5><a href="mailto:admin@gmail.com">admin@gmail.com</a></h5>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- End Atribute Navigation -->

                    </div>

                    <!-- Overlay screen for menu -->
                    <div class="overlay-screen"></div>
                    <!-- End Overlay screen for menu -->

                </div>
                <!-- Main Nav -->

            </div>   
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Header -->