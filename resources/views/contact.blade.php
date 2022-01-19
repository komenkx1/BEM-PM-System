@extends('layouts/master',['title'=>'Contact us'])
@section('content')





  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Kontak Kami</h1>

          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="#contact"
                class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Scroll Down</span>
                <i class="bi bi-arrow-down"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="assets/img/contact.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

<!-- ======= Team Section ======= -->
<section id="contact" class="team">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <p class="text-dark">Narahubung</p>
        <hr>
      </header>
      <div class="row gy-4">

        <div class="col-lg-3 mx-auto col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="member">
            <div class="member-imgs">
              <img src="assets/img/NGURAH-01.webp" class="img-fluid" alt="">
              <div class="social">
                <a target="blank" href="https://wa.me/628814813118"><i class="bi bi-whatsapp"></i></a>
                <a target="blank" href="https://www.instagram.com/ngurahdinataa/"><i class="bi bi-instagram"></i></a>
              </div>
            </div>
            <div class="member-info">
                <h4 class="mt-3">Ngurah Dinata</h4>
                <span>Menteri Kominfo</span>
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="row gy-4">

        <div class="col-lg-3 mx-auto col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="member">
            <div class="member-imgs">
              <img src="assets/img/SHILTA.webp" class="img-fluid" alt="">
              <div class="social">
                <a target="blank" href="https://wa.me/6289607817873"><i class="bi bi-whatsapp"></i></a>
                <a target="blank" href="https://www.instagram.com/shilta_inda/"><i class="bi bi-instagram"></i></a>
              </div>
            </div>
            <div class="member-info">
              <h4 class="mt-3">Shilta Inda</h4>
              <span>Web Developer</span>
            </div>
          </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="col-lg-3 mx-auto col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
          <div class="member">
            <div class="member-imgs">
              <img src="assets/img/WAHYU.webp" class="img-fluid" alt="">
              <div class="social">
                <a target="blank" href="https://wa.me/6288219157496"><i class="bi bi-whatsapp"></i></a>
                <a target="blank" href="https://www.instagram.com/mangwahyu19/"><i class="bi bi-instagram"></i></a>
              </div>
            </div>
            <div class="member-info">
              <h4 class="mt-3">Komang Wahyu</h4>
              <span>Web Developer</span>
            
            </div>
          </div>
        </div>


      </div>

    </div>

  </section><!-- End Team Section -->
   


  </main><!-- End #main -->
@endsection
