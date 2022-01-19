@extends('admin/layouts/master',['title'=>'Edit Poadcast'])
@section('content')
<div class="header bg-yellow pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="/bem-admin"><i class="fas fa-home text-dark"></i></a></li>
              <li class="breadcrumb-item" aria-current="page"><a href="{{Route('blog-admin')}}"
                  class="text-dark">Poadcast</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Poadcast</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid mt--6">
  <div class="row">>
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header bg-transparent">
          <div class="row align-items-center">
            <div class="col">
              <h5 class="h3 mb-0">Edit Poadcast</h5>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form action="{{Route('poadcast.update',['poadcast'=>$poadcast->id])}}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="form-group">
              <div class="form-input mt-2">
                <label for="Judul">Judul</label>
                <input type="text" value="{{$poadcast->title}}" class="form-control" placeholder="Masukan Judul" name="title" required>
              </div>
              
              <div class="form-input mt-2">
                <label for="Link">Link</label>
                <input type="text" value="{{$poadcast->link}}" class="form-control" placeholder="Masukan Link" name="link" required>
              </div>
            </div>
            <button class="btn btn-dark float-right " type="submit">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>


</div>
@endsection