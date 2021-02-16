<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Lumia Bootstrap Template - Index</title>
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

<body id="page-top">
  <?php
    $datapositif = file_get_contents("https://api.kawalcorona.com/positif");
    $positif =json_decode($datapositif, true);
    $datasembuh = file_get_contents("https://api.kawalcorona.com/sembuh");
    $sembuh = json_decode($datasembuh, true);
    $datameninggal = file_get_contents("https://api.kawalcorona.com/meninggal");
    $meninggal = json_decode($datameninggal, true);
    $dataid = file_get_contents("https://api.kawalcorona.com/indonesia");
    $id = json_decode($dataid, true);
    $dataidprovinsi = file_get_contents("https://api.kawalcorona.com/indonesia/provinsi");
    $idprovinsi = json_decode($dataidprovinsi, true);
    $datadunia = file_get_contents("https://api.kawalcorona.com/");
    $dunia = json_decode($datadunia, true);
  ?>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <h1><a href="">Kawal Corona</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href=""><img src="{{asset('frontend/assets/img/logo.png ') }}" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#portfolio">Data</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#contact">Contact Us</a></li>

        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="container text-center text-md-left" data-aos="fade-up">
      <h1><span>Corona Virus</span></h1>
      <h2>Perkembangan Virus Corona Di Indonesia</h2>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">
    <section id="counts" class="counts">
      <div class="container">

        <div class="row">

          <div class="col-lg-3 col-6">
            <div class="count-box">
              <i class="icofont-simple-smile"></i>
              <span data-toggle="counter-up">232</span>
              <p>Total Positif</p>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="count-box">
              <i class="icofont-document-folder"></i>
              <span data-toggle="counter-up">521</span>
              <p>Total Sembuh</p>
            </div>
          </div>

          <div class="col-lg-3 col-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="icofont-live-support"></i>
              <span data-toggle="counter-up">1,463</span>
              <p>Total Meninggal</p>
            </div>
          </div>

          <div class="col-lg-3 col-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="icofont-users-alt-5"></i>
              <span data-toggle="counter-up">15</span>
              <p>Indonesia</p>
            </div>
          </div>

      <!--- global--->
      <tr>
        <div class="section-title" data-aos="zoom-out">
          <h2>Data Kasus Coronavirus di Indonesia Berdasarkan Provinsi</h2>
        </div>
        <div class="card-body" >
          <div style="height:600px;overflow:auto;margin-right:15px;">
          <table class="table table-striped"  fixed-header  >
          <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Provinsi</th>
            <th scope="col">Positif</th>
            <th scope="col">Sembuh</th>
            <th scope="col">Meninggal</th>
          </tr>
          </thead>
          <tbody>      
            @php
              $no = 1;    
            @endphp
            <?php
              for ($i= 0; $i <= 191; $i++){
            ?>
            <tr>
              <td> <?php echo $i+1 ?></td>
              <td> <?php echo $dunia[$i]['attributes']['Country_Region'] ?></td>
              <td> <?php echo $dunia[$i]['attributes']['Confirmed'] ?></td>
              <td><?php echo $dunia[$i]['attributes']['Recovered']?></td>
              <td><?php echo $dunia[$i]['attributes']['Deaths']?></td>
            </tr>
            <?php 
            } ?>
            </table>
            </tbody>
            </table>
          </tbody>                     
        </div>
      </div>
    </tr>

      <!--- global--->
      <tr>
        <div class="section-title" data-aos="zoom-out">
          <h2>Data Kasus Corona Virus Global</h2>
        </div>
        <div class="card-body" >
          <div style="height:600px;overflow:auto;margin-right:15px;">
          <table class="table table-striped"  fixed-header  >
          <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Negara</th>
            <th scope="col">Positif</th>
            <th scope="col">Sembuh</th>
            <th scope="col">Meninggal</th>
          </tr>
          </thead>
          <tbody>      
            @php
              $no = 1;    
            @endphp
            <?php
              for ($i= 0; $i <= 191; $i++){
            ?>
            <tr>
              <td> <?php echo $i+1 ?></td>
              <td> <?php echo $dunia[$i]['attributes']['Country_Region'] ?></td>
              <td> <?php echo $dunia[$i]['attributes']['Confirmed'] ?></td>
              <td><?php echo $dunia[$i]['attributes']['Recovered']?></td>
              <td><?php echo $dunia[$i]['attributes']['Deaths']?></td>
            </tr>
            <?php 
            } ?>
            </table>
          </tbody>                     
        </div>
      </div>
    </tr>
        </div>
      </div>
    </section><!-- End Portfolio Section -->

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

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Services</h2>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="icon-box">
              <h4>Novel coronavirus (COVID-19): Hal-hal yang perlu anda ketahui</h4>
              <p>Unicef Indonesia</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-lg-0">
            <div class="icon-box">
              <h4>Daftar 100 rumah sakit rujukan penanganan virus corona</h4>
              <p>Kompas</p>
            </div>
          </div>
          <div class="col-md-6 mt-4">
            <div class="icon-box">
              <h4>Media informasi resmi penyakit infeksi emerging</h4>
              <p>Kementrian kesehatan</p>
            </div>
          </div>
          <div class="col-md-6 mt-4">
            <div class="icon-box">
              <h4>Coronavirus disiase (COVID-19) advice for the public</h4>
              <p>WHO</p>
            </div>
          </div>
          
        </div>

      </div>
    </section><!-- End Services Section -->

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

        <div class="row mt-5 justify-content-center">
          <div class="col-lg-10">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Masukkan Nama" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Pesan" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Komentar"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Kirim Pesan</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

    <div class="container d-md-flex py-4">
      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          &copy; Copyright <strong><span>Rosmayani</span></strong>. All Rights Reserved
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

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