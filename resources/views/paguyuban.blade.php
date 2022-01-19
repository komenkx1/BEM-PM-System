@extends('layouts/master',['title'=>'Paguyuban Dan Forum Agama'])
@section('content')


 <!-- ======= Hero Section ======= -->
 <section id="hero" class="hero d-flex align-items-center" style="background: url(assets/img/kertas4.webp) top center no-repeat;">

    <div class="container">
      <div class="row">
        <div class="col-lg-12 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up" class="text-100">Paguyuban Dan Forum Agama</h1>

          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="#paguyuban"
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




    <!-- ======= paguyuban Section ======= -->
    <section id="paguyuban" class="itemCard">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Informasi</h2>
          <p class="text-dark">Paguyuban Dan Forum Agama</p>
        </header>

       
        <div class="row gy-4" data-aos="fade-left">
            
            @foreach ($paguyubans as $paguyuban)
          <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
              <a href="{{Route('paguyuban.detail',['paguyuban' => $paguyuban->slug])}}">
            <div class="box">
              <h3  class="fw-bold">{{$paguyuban->nama_paguyuban}}</h3>
              <img src="{{$paguyuban->image}}" class="img-fluid" alt="">
             <p></p>
             <a href="{{Route('paguyuban.detail',['paguyuban' => $paguyuban->slug])}}" class="btn btn-danger  readmore-blog "
             style="background-color: hsl(1deg 76% 32%);">Selengkapnya</a>
            </div>
        </a>
          </div>
          @endforeach
       
          </div>

          

        </div>

      </div>

    </section>
    <!-- End paguyuban Section -->

@endsection