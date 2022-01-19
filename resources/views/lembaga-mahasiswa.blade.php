@extends('layouts/master',['title'=>'Lembaga Mahasiswa'])
@section('content')


  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center" style="background: url(assets/img/kertas.jpg) top center no-repeat;">

    <div class="container">
      <div class="row">
       
        <div class="col-lg-12 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up" class="text-100">Lembaga Mahasiswa</h1>

          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="#lembaga"
                class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Scroll Down</span>
                <i class="bi bi-arrow-down"></i>
              </a>
            </div>
          </div>
        </div>
   
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">



    <!-- ======= Lembaga Section ======= -->
    <section id="lembaga" class="itemCard">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Informasi</h2>
          <p class="text-dark">Lembaga Mahasiswa</p>
        </header>

        <div class="row gy-4" data-aos="fade-left">
            
            @foreach ($lembagas as $lembaga)
          <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
              <a href="{{$lembaga->instagram_lembaga}}">
            <div class="box">
              <h3  class="fw-bold">{{$lembaga->nama_lembaga}}</h3>
              <img src="{{$lembaga->image}}" class="img-fluid" alt="">
             <p></p>
             <a href="{{$lembaga->instagram_lembaga}}" class="btn btn-danger  readmore-blog "
             style="background-color: hsl(1deg 76% 32%);">Selengkapnya</a>
            </div>
        </a>
          </div>
          @endforeach
       
          </div>

          

        </div>

      </div>

    </section>
    <!-- End Lembaga Section -->

   
    <!-- END JURNAL -->


  </main><!-- End #main -->

<!-- END LEMBAGA -->
@endsection