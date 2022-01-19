<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{$title ?? 'BEM PM UDAYANA - Integrasi Karya'}}</title>
  <meta content="BEM PM UDAYANA" description="Badan Eksekutif Mahasiswa Pemerintahan Mahasiswa Universitas Udayana ">

  <!-- Favicons -->
  <link href="/assets/img/icon.png" rel="icon">
  <link href="/assets/img/icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
 
  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">

  <style type="text/css">
    .preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background-color: #fff;
    }
    .preloader .loading {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%,-50%);
        font: 14px arial;
    }
</style>  
</head>

<body>
<!-- LOADER -->
<div class="preloader">
  <div class="loading">
      <img src="/assets/img/loader-bem-fix.gif" width="80">
      <p>Harap Tunggu</p>
  </div>
</div>
<!-- END LOADER -->
 
    @include('layouts/header-home')

  
    @yield('content')

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">


    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="/" class="logo d-flex align-items-center">
              <img src="/assets/img/logo-dark.png" alt="">

            </a>
            <p>Integrasi Ragam Karya Guna Menjadikan BEM PM Universitas Udayana sebagai Wadah untuk Berkontribusi Aktif
              dalam Mewujudkan Kebermanfaatan bagi Udayana, Bali, dan Indonesia</p>
            <div class="social-links mt-3">
              <a href="https://twitter.com/BEM_Udayana" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="https://www.youtube.com/channel/UCXb4WEhsHyKtMdqPaKJ4okQ" class="youtube"><i class="bi bi-youtube"></i></a>
              <a href="https://www.instagram.com/bem_udayana/?hl=id" class="instagram"><i class="bi bi-instagram bx bxl-instagram"></i></a>
            </div>
          </div>


          <div class="col-lg-4 col-6 footer-links">
            <h4>Sekretariat Kami</h4>
            <p>Jalan Dr. Goris No. 10, Student Center Lt. 2, Denpasar, Bali, Indonesia<p>
          </div>

          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>Kontak</h4>
            <p>
              <strong>Phone:</strong> 081 338 955 721<br>
              <strong>Email:</strong> contact@bemudayana.id<br>
            </p>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright text-dark">
        &copy; Copyright <strong><span>BEM UDAYANA</span></strong>. All Rights Reserved
      </div>

    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="/assets/vendor/aos/aos.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>
  <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/assets/vendor/purecounter/purecounter.js"></script>
  <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js" integrity="sha512-jNDtFf7qgU0eH/+Z42FG4fw3w7DM/9zbgNPe3wfJlCylVDTT3IgKW5r92Vy9IHa6U50vyMz5gRByIu4YIXFtaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.js" integrity="sha512-FwqNPb8ENFXApJKNgRgYq5ok7VoOf5ImaOdzyF/xe/T5jdd/S0xq0CXBLDhpzaemxpQ61X3nLVln6KaczwhKgA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="//code.tidio.co/0gyszvehigkd3fbzbigtu1gpjtehqloa.js" async></script>
  
  <!-- Template Main JS File -->
  <!-- Loader -->
  <script>
    $(document).ready(function(){

      $('.load-img-fungsio').lazyload({ threshold : 200 });
      // $('.preloader').fadeOut();
            $('.preloader').delay(1000).fadeOut('slow');
            $('body').delay(350).css({
                'overflow': 'visible'
            });
    })
</script>

  <script src="/assets/js/main.js"></script>

</body>

</html>