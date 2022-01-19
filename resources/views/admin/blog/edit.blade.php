@extends('admin/layouts/master',['title'=>'Edit Post'])
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
                                    class="text-dark">Blog</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Postingan</li>
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
                            <h5 class="h3 mb-0">Edit Postingan Blog</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{Route('blog-admin.update',['post'=>$post->pid])}}" method="POST"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="thumbnail row col-md-4 col-12 mx-auto p-3 m-3">
                            <img src="{{$post->image}}" class="img-fluid" alt="">
                        </div>
                        <div class="form-group">
                            <div class="form-input mt-2">
                                <label for="Judul">Judul</label>
                                <input type="text" value="{{$post->ptitle}}" class="form-control"
                                    placeholder="Masukan Judul" name="ptitle" required>
                            </div>
                            <div class="form-input mt-2">
                                <label for="Ringkasan">Ringkasan</label>
                                <input type="text" value="{{$post->psumm}}" class="form-control"
                                    placeholder="Masukan Ringkasan" name="psumm" required>
                            </div>
                            <div class="form-input mt-2">
                                <label for="Thumbnail">Thumbnail</label>
                                <input type="file" class="form-control" name="pimage" placeholder="Masukan File">
                                @if ($errors->has('pimage'))
                                <span class="text-danger">{{ $errors->first('pimage') }}</span>
                                @endif
                            </div>
                            <div class="form-input mt-2">
                                <label for="Content">Content</label>
                                <textarea class="form-control ckeditor" id="editor1" name="pbody"
                                    aria-describedby="bodyHelp"
                                    placeholder="Tulis content">{!!$post->ptitle!!}</textarea>
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