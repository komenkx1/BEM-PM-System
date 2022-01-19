  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center">
        <img src="/assets/img/logo-dark.png" alt="">

      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link @if($title == "BEM PM UDAYANA - Integrasi Karya") scrollto active @endif" href="@if($title == "BEM PM UDAYANA - Integrasi Karya")  #hero @else / @endif">Beranda</a></li>
          @if ($title == "BEM PM UDAYANA - Integrasi Karya")
          <li><a class="nav-link scrollto" href="#about">Tentang Kami</a></li>
          <li><a class="nav-link scrollto" href="#team">Fungsionaris</a></li>
          <!-- <li><a class="nav-link scrollto" href="#proker">Program Kerja</a></li> -->
          <li><a class="nav-link scrollto" href="#podCastJurnal">Jurnal & Podcast</a></li>          
          @endif
          <li><a class="nav-link @if($title == "BEM PM UDAYANA - Integrasi Karya") scrollto @elseif($title == "Blog") active  @endif " href="@if($title == "BEM PM UDAYANA - Integrasi Karya")  #recent-blog-posts @else {{Route('blog')}} @endif">Blog</a></li>
          <li class="dropdown"><a href="javascript:void(0)" class="@if($title == "Lembaga Mahasiswa" || $title == "Unit Kegiatan Mahasiswa" || $title == "Paguyuban Dan Forum Agama") active @endif" ><span>Informasi</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Open Recruitment</a></li>
               <li><a href="https://uplace.bemudayana.id/">Udayana Market Place</a></li>
              <li><a href="https://studentday.bemudayana.id/">Student Day</a></li>
              <li><a href="#">IMUN</a></li>
              <li><a href="{{Route('lembaga-mahasiswa')}}" class="@if($title == "Lembaga Mahasiswa") active @endif" >Lembaga Mahasiswa</a></li>
              <li><a href="{{Route('ukm')}}" class="@if($title == "Unit Kegiatan Mahasiswa") active @endif" >UKM</a></li>
              <li><a href="{{Route('paguyuban')}}" class="@if($title == "Paguyuban Dan Forum Agama") active @endif">Paguyuban Dan Forum Agama</a></li>
            </ul>
          </li>
          <li><a  href="{{Route('kontak')}}" class="@if($title == "Contact us") active @endif">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->