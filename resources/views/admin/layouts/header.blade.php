<div class="header bg-yellow pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="/bem-admin"><i class="fas fa-home text-dark"></i></a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboards</li>
            </ol>
          </nav>
        </div>
      </div>
      <!-- Card stats -->
      <div class="row">
        <div class="col-xl-6 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row p-3">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Total Postingan Blog</h5>
                  <span class="h2 font-weight-bold mb-0">{{$posts->count()}}</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                    <i class="ni ni-single-copy-04"></i>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row p-3">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Total Users</h5>
                  <span class="h2 font-weight-bold mb-0">{{$users->count()}}</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                    <i class="ni ni-single-02"></i>
                  </div>
                </div>
              </div>
             
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>