<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Frontend</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('frontend/assets/img/favicon.png ') }}" rel="icon">
  <link href="{{asset('frontend/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.cs') }}s" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/icofont/icofont.min.css ') }}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/boxicons/css/boxicons.min.css ') }}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/venobox/venobox.css ') }}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/owl.carousel/assets/owl.carousel.min.css ') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('frontend/assets/css/style.css')}}" rel="stylesheet">
</head>

<body id=>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <h2>Kawal Corona</h2>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="{{asset('frontend/assets/img/logo.png ') }}" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
        <li class="active"></li>
          <li><a href="#">Home</a></li>
          <li><a href="#datakasus">Data Kasus</a></li>
          <li><a href="#provinsi">Provinsi</a></li>
          <li><a href="#global">Global</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#contact">Contact</a></li>

          
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="container text-center text-md-left" data-aos="fade-up">
      <h1>Welcome to <span>Tracking Covid</span></h1>
      <h2>Perkembangan Virus Corona Di Indonesia</h2>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Counts Section ======= -->
    <section id="datakasus" class="datakasus">
    <section id="counts" class="counts">
      <div class="container">

      <div class="section-title">
        <h2>Data Kasus Covid-19</h2>
      </div>

        <div class="row">

          <div class="col-lg-3 col-6">
            <div class="count-box">
              <i class="icofont-plus"></i> <br>
              <span data-toggle="counter-up">{{$positif}}</span>
              <p>Total Positif</p>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="count-box">
              <i class="icofont-heart-beat-alt"></i> <br>
              <span data-toggle="counter-up">{{$sembuh}}</span>
              <p>Total Sembuh</p>
            </div>
          </div>

          <div class="col-lg-3 col-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="icofont-skull-danger"></i> <br>
              <span data-toggle="counter-up">{{$meninggal}}</span>
              <p>Total Meninggal</p>
            </div>
          </div>

          <div class="col-lg-3 col-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="icofont-globe"></i> <br>
              <span data-toggle="counter-up"></span>
              <p>Kasus Data Global</p>
            </div>
          </div>

        </div><br><br>
      </div>
    </section><!-- End Counts Section -->

    <!-- ======== Table Section Provinsi ======= -->
    <section id="provinsi" class="provinsi">
      <div class="container">

        <div class="section-title" data-aos="zoom-out">
          <h2>Data Kasus Provinsi</h2>
        </div>

        <div class="row content" data-aos="fade-up">
            <div class="table-wrapper-scroll-y my-custom-scrollbar col-lg-12">
              <table class="table table-bordered table-striped mb-0 " width="100%">
                <thead>
                  <tr>
                    <th scope="col"><center>No</center></th>
                    <th scope="col"><center>Provinsi</center></th>
                    <th scope="col"><center>Positif</center></th>
                    <th scope="col"><center>Sembuh</center></th>
                    <th scope="col"><center>Meninggal</center></th>
                  </tr>
                </thead>
              <tbody>
              @php
                $no = 1;
              @endphp
                @foreach($tampil as $data)
                    <tr>
                    <th scope="row"><center>{{ $no++ }}</center></th>
                    <td><center>{{ $data->nama_prov}}</center></td>
                    <td><center>{{ number_format($data->jml_positif)}}</center></td>
                    <td><center>{{ number_format($data->jml_sembuh)}}</center></td>
                    <td><center>{{  ($data->jml_meninggal)}}</center></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
     
    <!-- ======== End Table Section Provinsi ======= -->

    <!-- ======== Table Section Global ======= -->
    <section id="global" class="global">
      <div class="container">

        <div class="section-title" data-aos="zoom-out">
          <h2>Data Kasus Global</h2>
        </div>

          <div class="row content" data-aos="fade-up">
            <div class="table-wrapper-scroll-y my-custom-scrollbar col-lg-12">
              <table class="table table-bordered table-striped mb-0 " width="100%">
                <thead>
                  <tr>
                    <th scope="col"><center>No</center></th>
                    <th scope="col"><center>Negara</center></th>
                    <th scope="col"><center>Positif</center></th>
                    <th scope="col"><center>Sembuh</center></th>
                    <th scope="col"><center>Meninggal</center></th>
                  </tr>
                </thead>
                
              </table>
            </div>
          </div>
        </div>

      </div>
      </section>
    <!-- ======== End Table Section Global ======= -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

      <div class="section-title">
        <h2>About</h2>
      </div>
        <div class="row">
          <div class="col-lg-6">
            <img src="{{asset('frontend/assets/img/covid.jpg ') }}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <h3>Apa Itu Virus Corona?</h3>
            <p>
            Infeksi coronavirus merupakan penyakit yang disebabkan oleh virus corona dan menimbulkan gejala utama berupa gangguan pernapasan. Penyakit ini menjadi sorotan karena kemunculannya di akhir tahun 2019 pertama kali di Wuhan, China. Lokasi kemunculannya pertama kali ini, membuat coronavirus juga dikenal dengan sebutan Wuhan virus.
            Selain China, coronavirus juga menyebar secara cepat ke berbagai negara lain, termasuk Jepang, Thailand, Jepang, Korea Selatan, bahkan hingga ke Amerika Serikat.
            </p>
            <p>Cara pencegahan agar tidak tertular virus corona :</p>
            <ul>
              <li><i class="bx bx-check-double"></i> Kenakan masker jika pembatasan fisik tidak dimungkinkan.</li>
              <li><i class="bx bx-check-double"></i> Cuci tangan Anda secara rutin. Gunakan sabun dan air, atau cairan pembersih tangan berbahan alkohol.</li>
              <li><i class="bx bx-check-double"></i> Jika demam, batuk, atau kesulitan bernapas, segera cari bantuan medis.</li>
              <li><i class="bx bx-check-double"></i> Jaga jarak aman hindari kerumunan banyak orang.</li>
              <li><i class="bx bx-check-double"></i> Jangan sentuh mata, hidung, atau mulut Anda.</li>
            </ul>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->
    
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
        </div>

        <div class="row mt-5 justify-content-center">

          <div class="col-lg-10">

            <div class="info-wrap">
              <div class="row">
                <div class="col-lg-4 info">
                  <i class="icofont-google-map"></i>
                  <h4>Location:</h4>
                  <p>Komplek Bojong Malaka Indah<br>Kec.Baleendah</p>
                </div>

                <div class="col-lg-4 info mt-4 mt-lg-0">
                  <i class="icofont-envelope"></i>
                  <h4>Email:</h4>
                  <p>rosmayanie65@gmail.com</p>
                </div>

                <div class="col-lg-4 info mt-4 mt-lg-0">
                  <i class="icofont-phone"></i>
                  <h4>Call:</h4>
                  <p>+62 899-0147-1860<br>+62 857-2224-8698</p>
                </div>
              </div>
            </div>

          </div>

        </div>
        
        <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
    </section><!-- End Contact Section -->

  <!-- Vendor JS Files -->
  <script src="{{asset('frontend/assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/counterup/counterup.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('frontend/assets/js/main.js')}}"></script>

</body>

</html>