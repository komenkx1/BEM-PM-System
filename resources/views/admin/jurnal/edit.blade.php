@extends('admin/layouts/master',['title'=>'Edit Jurnal'])
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
              <li class="breadcrumb-item active" aria-current="page">Edit Jurnal</li>
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
              <h5 class="h3 mb-0">Edit Jurnal</h5>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form action="{{Route('jurnal.update',['jurnal'=>$jurnal->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="thumbnail row col-md-4 col-12 mx-auto p-3 m-3">
                <img src="{{$jurnal->image}}" class="img-fluid" alt="">
            </div>
            <div class="form-group">
              <div class="form-input mt-2">
                <label for="Judul">Judul</label>
                <input type="text" value="{{$jurnal->title}}" class="form-control" placeholder="Masukan Judul" name="title" required>
              </div>
              <div class="form-input mt-2">
                <label for="Volume">Volume</label>
                <input type="text" value=" {{$jurnal->volume}}" class="form-control" placeholder="Masukan Volume" name="volume" required>
                @if ($errors->has('volume'))
                <span class="text-danger">{{ $errors->first('volume') }}</span>
                @endif
              </div>
              <div class="form-input mt-2">
                <label for="Ringkasan">Ringkasan</label>
                <textarea class="form-control" name="ringkasan" aria-describedby="bodyHelp"
                placeholder="Tulis content">{{$jurnal->ringkasan}}</textarea>
              </div>
              <div class="form-input mt-2">
                <label for="Thumbnail">Thumbnail</label>
                <input type="file" class="form-control" name="thumbnail" placeholder="Masukan File">
                @if ($errors->has('thumbnail'))
                <span class="text-danger">{{ $errors->first('thumbnail') }}</span>
                @endif
              </div>
              <div class="form-input mt-2">
                <label for="Link">Link</label>
                <input type="text" value="{{$jurnal->link}}" class="form-control" placeholder="Masukan Link" name="link" required>
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