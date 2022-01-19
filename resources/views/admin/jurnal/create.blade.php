@extends('admin/layouts/master',['title'=>'Tambah Jurnal'])
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
                  class="text-dark">Jurnal</a></li>
              <li class="breadcrumb-item active" aria-current="page">Tambah Jurnal</li>
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
              <h5 class="h3 mb-0">Tambah Jurnal</h5>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form action="{{Route('jurnal.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <div class="form-input mt-2">
                <label for="Judul">Judul</label>
                <input type="text" class="form-control" placeholder="Masukan Judul" name="title" required>
              </div>
              <div class="form-input mt-2">
                <label for="Volume">Volume</label>
                <input type="text" class="form-control" placeholder="Masukan Volume" name="volume" required>
                @if ($errors->has('volume'))
                <span class="text-danger">{{ $errors->first('volume') }}</span>
                @endif
              </div>
              <div class="form-input mt-2">
                <label for="Ringkasan">Ringkasan</label>
                <textarea class="form-control" name="ringkasan" aria-describedby="bodyHelp"
                placeholder="Tulis content"></textarea>
              </div>
              <div class="form-input mt-2">
                <label for="Thumbnail">Thumbnail</label>
                <input type="file" class="form-control" name="thumbnail" placeholder="Masukan File" required>
                @if ($errors->has('thumbnail'))
                <span class="text-danger">{{ $errors->first('thumbnail') }}</span>
                @endif
              </div>
              <div class="form-input mt-2">
                <label for="Link">Link</label>
                <input type="text" class="form-control" placeholder="Masukan Link" name="link" required>
              </div>
            </div>
            <button class="btn btn-dark float-right " type="submit">Create</button>
          </form>
        </div>
      </div>
    </div>
  </div>


</div>
@endsection