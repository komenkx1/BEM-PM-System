@extends('layouts/master',['title'=>$paguyuban->slug])
@section('content')
{{-- <!-- PAGUYUBAN -->
<section style="margin-top: 120px">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-12" style="align-items: center">
                <center>
                    <img src="{{$paguyuban->image}}" width="200px">
                </center>
            </div>
            <div class="col-lg-10 col-md-10 col-12">
                <p class="heading museo"
                    style="font-size: 30px; font-weight: bold; margin-top: 70px; margin-left: 30px">
                    {{$paguyuban->nama_paguyuban}}</p>
            </div>
        </div>

        <div class="col-lg-12 mt-4 pt-2">
            <div class="rounded shadow position-relative overflow-hidden">
                <div class="p-4 bg-light border-bottom"></div>
                <div class="p-4">
                    <ul class="nav nav-pills mb-3 rounded-pill justify-content-center d-inline-block border py-1 px-2"
                        id="pills-tab" role="tablist">
                        <li class="nav-item d-inline-block">
                            <a class="nav-link p-1 px-3 rounded-pill active" id="pills-cloud-tab" data-toggle="pill"
                                href="#pills-cloud" role="tab" aria-controls="pills-cloud"
                                aria-selected="false">Tentang</a>
                        </li>

                        <li class="nav-item d-inline-block">
                            <a class="nav-link p-1 px-3 rounded-pill" id="pills-smart-tab" data-toggle="pill"
                                href="#pills-smart" role="tab" aria-controls="pills-smart"
                                aria-selected="false">Kontak</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-cloud" role="tabpanel"
                            aria-labelledby="pills-cloud-tab">
                            <p class="mb-0">{!!$paguyuban->tentang!!}</p>
                        </div>

                        <div class="tab-pane fade" id="pills-smart" role="tabpanel" aria-labelledby="pills-smart-tab">
                            <ul>
                                <li> Ketua : {{$paguyuban->ketua}}</li>
                                <li> Instagram : {{$paguyuban->instagram}}</li>
                                <li> Line : {{$paguyuban->line}}</li>
                                <li> Facebook : {{$paguyuban->facebook}} </li>
                                <li> Alamat : {{$paguyuban->alamat}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- PAGUYUBAN END--> --}}

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="/">Home</a></li>
          <li><a href="{{Route('paguyuban')}}">Paguyuban & Forum Agama</a></li>
          <li>{{$paguyuban->nama_paguyuban}}</li>
        </ol>
        <h2>{{Str::limit($paguyuban->nama_paguyuban,50)}}</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Unit Kegiatan Mahasiswa Single Section ======= -->
    <section id="paguyuban" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

            <div class="col-12 entries">

                <article class="entry entry-single">
    
                  <div class="entry-img text-center m-0">
                    <img src="{{$paguyuban->image}}"  alt="" style="width:300px;">
                    <hr>
                  </div>
    
    
                       <!-- ======= Visi Misi Section ======= -->
      <section id="Detailpaguyuban" class="features p-0 p-lg-3">

        <div class="container" data-aos="fade-up">


          <!-- Feature Tabs -->
          <div class="row feture-tabs m-0" data-aos="fade-up">
            <div class="col-lg-12">
             
                <h2 class="entry-title m-0 p-0 ">
                    <a href="javascript:void(0)" class=" text-dark">Detail paguyuban : {{$paguyuban->nama_paguyuban}}</a>
                  </h2>

              <!-- Tabs -->
              <ul class="nav nav-pills mb-3">
                <li>
                  <a class="nav-link active" data-bs-toggle="pill" href="#tengtang">Tentang</a>
                </li>
                <li>
                  <a class="nav-link" data-bs-toggle="pill" href="#kontak">Kontak</a>
                </li>

                  </li>
              </ul><!-- End Tabs -->

              <!-- Tab Content -->
              <div class="tab-content">

                <div class="tab-pane fade show active" id="tengtang">
                  <p>{!!$paguyuban->tentang!!}</p>

                </div><!-- End Tab 1 Content -->

                <div class="tab-pane fade show" id="kontak">
                    <ul>
                        <li> Ketua : {{$paguyuban->ketua}}</li>
                        <li> Instagram : {{$paguyuban->instagram}}</li>
                        <li> Line : {{$paguyuban->line}}</li>
                        <li> Facebook : {{$paguyuban->facebook}} </li>
                        <li> Alamat : {{$paguyuban->alamat}}</li>
                    </ul>
                </div>
               
                <!-- End Tab 2 Content -->


              </div>

            </div>


          </div><!-- End Feature Tabs -->


        </div>

      </section><!-- End Visi Misi Section -->
    
                
    
                </article><!-- End paguyuban entry -->
    
               
    
    
              </div><!-- End paguyuban entries list -->

    

        </div>

      </div>
    </section><!-- End Unit Kegiatan Mahasiswa Single Section -->

  </main><!-- End #main -->
@endsection