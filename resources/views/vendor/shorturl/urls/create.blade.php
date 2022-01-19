@extends('admin/layouts/master',['title'=>'Add Link'])

@section('content')
<div class="header bg-yellow pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="/bem-admin"><i class="fas fa-home text-dark"></i></a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="{{Route('shorturl.url.index')}}"
                    class="text-dark">Short Link</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Link</li>
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
                <h5 class="h3 mb-0">Add Link</h5>
              </div>
            </div>
          </div>
          <div class="card-body">
            @if (session('short_url'))
            <div class="alert alert-success" role="alert">
               <span class="text-dark">Your shortened url is:</span>  <a class="font-weight-bold" href="{{ session('short_url') }}" title="your shortened url">{{ session('short_url') }}</a> (<a class="copy-clipboard" href="javascript:void(0);" data-clipboard-text="{{ session('short_url') }}">Copy link to clipboard</a>)
            </div>
        @endif
            <form method="POST" action="{{ route('shorturl.url.store') }}">
                @csrf
                <div class="input-group">
                    <input type="text" required class="form-control form-control-lg {{ $errors->has('url') ? 'is-invalid' : '' }}" id="url" name="url" placeholder="Paste an url" aria-label="Paste an url" value="{{ old('url') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Shorten</button>
                    </div>
                </div>
                @if ($errors->has('url'))
                    <small id="url-error"  class="form-text text-danger">
                        {{ $errors->first('url') }}
                    </small>
                @endif
                <div class="row mt-3">
                    <div class="col-lg-4 col-12">
                        <div class="form-group">
                            <label for="code">Custom alias (optional)</label>
                            <input type="text" class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" id="code" name="code" placeholder="Set your custom alias" value="{{ old('code') }}">
                            @if ($errors->has('code'))
                                <small id="code-error" class="form-text text-danger">
                                    {{ $errors->first('code') }}
                                </small>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="form-group">
                            <label for="expires_at">Expires at (optional)</label>
                            <input type="datetime-local" class="form-control {{ $errors->has('expires_at') ? 'is-invalid' : '' }}" id="expires_at" name="expires_at" placeholder="Set your expiration date" value="{{ old('expires_at') }}">
                            @if ($errors->has('expires_at'))
                                <small id="code-error" class="form-text text-danger">
                                    {{ $errors->first('expires_at') }}
                                </small>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  
  
  </div>

@endsection

@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min.js"></script>
    <script>
        var clipboard = new ClipboardJS('.copy-clipboard');

        clipboard.on('success', function(e) {
            e.trigger.innerText = 'Copied!';
        });
    </script>
@endsection