<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
  <div class="scrollbar-inner">
    <!-- Brand -->
    <div class="sidenav-header  align-items-center">
      <a class="navbar-brand" href="/">
        <img src="/assets/img/icon.png" class="navbar-brand-img" alt="...">
      </a>
    </div>
    <div class="navbar-inner">
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Nav items -->
        <ul class="navbar-nav">

          <li class="nav-item">
            <a class="nav-link" href="{{Route('dashboard')}}">
              <i class="ni ni-tv-2 text-primary"></i>
              <span class="nav-link-text">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{Route('shorturl.url.index')}}">
              <i class="ni ni-curved-next text-danger"></i>
              <span class="nav-link-text">Short Link</span>
            </a>
          </li>

          @if (Auth::user()->role == 'admin' || Auth::user()->role == 'super admin')
          <li class="nav-item">
            <a class="nav-link" href="{{Route('blog-admin')}}">
              <i class="ni ni-single-copy-04 text-orange"></i>
              <span class="nav-link-text">Blog</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://www.tidio.com/panel/login" target="blank">
              <i class="fas fa-external-link-alt"></i>
              <span class="nav-link-text">HotLines</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{Route('jurnal')}}">
              <i class="ni ni-book-bookmark text-green"></i>
              <span class="nav-link-text">Jurnal</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{Route('poadcast')}}">
              <i class="ni ni-sound-wave text-purple"></i>
              <span class="nav-link-text">Poadcast</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{Route('sertifikat')}}">
              <i class="ni ni-single-copy-04 text-black"></i>
              <span class="nav-link-text">E-Sertifikat</span>
            </a>
          </li>
          @endif

          @if (Auth::user()->role == 'super admin')

          <li class="nav-item">
            <a class="nav-link" href="{{Route('user')}}">
              <i class="ni ni-single-02 text-orange"></i>
              <span class="nav-link-text">User</span>
            </a>
          </li>

          @endif
        </ul>

      </div>
    </div>
  </div>
</nav>