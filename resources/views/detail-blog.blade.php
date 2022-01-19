@extends('layouts/master',['title'=>$blog->ptitle])
@section('content')


<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="/">Home</a></li>
          <li><a href="{{Route('blog')}}">Blog</a></li>
          <li>{{Str::limit($blog->ptitle,50)}}</li>
        </ol>
        <h2>{{Str::limit($blog->ptitle,50)}}</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

            <article class="entry entry-single">

              <div class="entry-img">
                <img src="{{$blog->image}}" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="javascript:void(0)">{{$blog->ptitle}}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="javascript:void(0)">BEM PM UDAYANA</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="javascript:void(0)"><time datetime="{{date("Y-m-d",strtotime($blog->ptime))}}">{{date("Y-m-d",strtotime($blog->ptime))}}</time></a></li>
                </ul>
              </div>

              <div class="entry-content">
                {!!$blog->pbody!!}

              </div>

            

            </article><!-- End blog entry -->

            <div class="blog-author d-flex align-items-center">
              <img src="/assets/img/icon.png" class=" float-left" alt="">
              <div>
                <h4>BEM PM UNUD</h4>
                <div class="social-links">
                  <a href="https://twitter.com/BEM_Udayana" class="twitter"><i class="bi bi-twitter"></i></a>
                  <a href="https://www.youtube.com/channel/UCXb4WEhsHyKtMdqPaKJ4okQ" class="youtube"><i class="bi bi-youtube"></i></a>
                  <a href="https://www.instagram.com/bem_udayana/?hl=id" class="instagram"><i class="bi bi-instagram bx bxl-instagram"></i></a>
                </div>
                <p>Badan Eksekutif Mahasiswa Pemerintahan mahasiswa Universitas Udayana</p>
              </div>
            </div><!-- End blog author bio -->



          </div><!-- End blog entries list -->

          @include('layouts/sidebar')

        </div>

      </div>
    </section><!-- End Blog Single Section -->

  </main><!-- End #main -->

@endsection