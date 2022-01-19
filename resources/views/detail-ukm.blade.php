@extends('layouts/master',['title'=>$ukm->nama_ukm])
@section('content')


<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="/">Home</a></li>
          <li><a href="{{Route('ukm')}}">Unit Kegiatan Mahasiswa</a></li>
          <li>{{$ukm->nama_ukm}}</li>
        </ol>
        <h2>{{Str::limit($ukm->nama_ukm,50)}}</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Unit Kegiatan Mahasiswa Single Section ======= -->
    <section id="ukm" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

            <div class="col-12 entries">

                <article class="entry entry-single">
    
                  <div class="entry-img text-center m-0">
                    <img src="{{$ukm->image}}"  alt="" style="width:300px;">
                    <hr>
                  </div>
    
    
                       <!-- ======= Visi Misi Section ======= -->
      <section id="DetailUKM" class="features p-0 p-lg-3">

        <div class="container" data-aos="fade-up">


          <!-- Feature Tabs -->
          <div class="row feture-tabs m-0" data-aos="fade-up">
            <div class="col-lg-12">
             
                <h2 class="entry-title m-0 p-0 ">
                    <a href="javascript:void(0)" class=" text-dark">Detail UKM : {{$ukm->nama_ukm}}</a>
                  </h2>

              <!-- Tabs -->
              <ul class="nav nav-pills mb-3">
                <li>
                  <a class="nav-link active" data-bs-toggle="pill" href="#sejarah">Sejarah</a>
                </li>
                <li>
                  <a class="nav-link" data-bs-toggle="pill" href="#fungsionaris">fungsionaris</a>
                </li>
                <li>
                    <a class="nav-link" data-bs-toggle="pill" href="#kegiatan">kegiatan</a>
                  </li>
                  <li>
                    <a class="nav-link" data-bs-toggle="pill" href="#prestasi">prestasi</a>
                  </li>
              </ul><!-- End Tabs -->

              <!-- Tab Content -->
              <div class="tab-content">

                <div class="tab-pane fade show active" id="sejarah">
                  <p>{!!$ukm->sejarah!!}</p>

                </div><!-- End Tab 1 Content -->

                <div class="tab-pane fade show" id="fungsionaris">
                    <p>{!!$ukm->fungsionaris!!}</p>
                </div>
                <div class="tab-pane fade show" id="kegiatan">
                    <p>{!!$ukm->kegiatan!!}</p>
                </div>

                <div class="tab-pane fade show" id="prestasi">
                    <p>{!!$ukm->prestasi!!}</p>
                </div>
                <!-- End Tab 2 Content -->


              </div>

            </div>


          </div><!-- End Feature Tabs -->


        </div>

      </section><!-- End Visi Misi Section -->
    
                
    
                </article><!-- End ukm entry -->
    
               
    
    
              </div><!-- End ukm entries list -->

    

        </div>

      </div>
    </section><!-- End Unit Kegiatan Mahasiswa Single Section -->

  </main><!-- End #main -->

@endsection