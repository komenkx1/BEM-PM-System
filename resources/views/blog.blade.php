@extends('layouts/master',['title'=>'Blog'])
@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Blog</li>
        </ol>
        <h2>Blog</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">
       
          <div class="col-lg-8 entries">
            @if ($posts->count() == 0)
            <div class="alert alert-danger" role="alert">
              Artikel Tidak Ditemukan!
            </div>
            @endif
            @foreach ($posts as $post)
            <article class="entry">

              <div class="entry-img">
                <img src="{{$post->image}}" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="{{Route('blog.detail',['blog'=>$post->pslug])}}">{{$post->ptitle}}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="{{Route('blog.detail',['blog'=>$post->pslug])}}">BEM PM UDAYANA</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="{{Route('blog.detail',['blog'=>$post->pslug])}}"><time datetime="{{date("Y-m-d",strtotime($post->ptime))}}">{{date("Y-m-d",strtotime($post->ptime))}}</time></a></li>
                </ul>
              </div>

              <div class="entry-content">
                <p>
                 {{$post->psumm}}
                </p>
                <div class="read-more">
                  <a href="{{Route('blog.detail',['blog'=>$post->pslug])}}">Read More</a>
                </div>
              </div>

            </article><!-- End blog entry -->
            @endforeach
          

            <div class="text-center d-flex justify-content-center position-relative">
                {{ $posts->onEachSide(5)->links() }}
            </div>

          </div><!-- End blog entries list -->

          @include('layouts/sidebar')

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->
@endsection
@section('footer')

<!-- Typewriter -->
<script>
    var TxtType = function(el, toRotate, period) {
         this.toRotate = toRotate;
         this.el = el;
         this.loopNum = 0;
         this.period = parseInt(period, 10) || 2000;
         this.txt = '';
         this.tick();
         this.isDeleting = false;
     };
 
     TxtType.prototype.tick = function() {
         var i = this.loopNum % this.toRotate.length;
         var fullTxt = this.toRotate[i];
 
         if (this.isDeleting) {
         this.txt = fullTxt.substring(0, this.txt.length - 1);
         } else {
         this.txt = fullTxt.substring(0, this.txt.length + 1);
         }
 
         this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';
 
         var that = this;
         var delta = 200 - Math.random() * 100;
 
         if (this.isDeleting) { delta /= 2; }
 
         if (!this.isDeleting && this.txt === fullTxt) {
         delta = this.period;
         this.isDeleting = true;
         } else if (this.isDeleting && this.txt === '') {
         this.isDeleting = false;
         this.loopNum++;
         delta = 500;
         }
 
         setTimeout(function() {
         that.tick();
         }, delta);
     };
 
     window.onload = function() {
         var elements = document.getElementsByClassName('typewrite');
         for (var i=0; i<elements.length; i++) {
             var toRotate = elements[i].getAttribute('data-type');
             var period = elements[i].getAttribute('data-period');
             if (toRotate) {
               new TxtType(elements[i], JSON.parse(toRotate), period);
             }
         }
         // INJECT CSS
         var css = document.createElement("style");
         css.type = "text/css";
         css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
         document.body.appendChild(css);
     };
</script>

<!--Read More -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(function() {
 
         $('.item').each(function(event) {
             var max_length = 100;
 
             if ($(this).html().length > max_length) {
 
                 var short_content = $(this).html().substr(0, max_length);
                 var long_content = $(this).html().substr(max_length);
 
                 $(this).html(short_content +
                     '<a href="#" class="read_more">...Read More</a>' +
                     '<span class="more_text" style="display:none;">' + long_content + '</span>');
 
                 $(this).find('a.read_more').click(function(event) {
 
                     event.preventDefault();
                     $(this).hide();
                     $(this).parents('.item').find('.more_text').show();
 
                 });
 
             }
 
         });
 
 
     });
</script>
@endsection