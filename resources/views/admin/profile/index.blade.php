@extends('admin/layouts/master',['title'=>'Profile'])
@section('content')

<div class="header bg-yellow pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="/bem-admin"><i class="fas fa-home text-dark"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">

        <div class="col-xl-12 order-xl-1">
            @include('admin/layouts/notif')

            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Edit profile </h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{Route('profile.update',['user'=>Auth::user()->id])}}" method="POST">
                        @csrf
                        @method('put')
                        <h6 class="heading-small text-muted mb-4">User information</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">Username</label>
                                        <input type="text" id="input-username" name="username" class="form-control"
                                            placeholder="Username" value="{{Auth::user()->username}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-3" />
                        <h6 class="heading-small text-muted mb-4">Reset Password</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="old-password">Password Lama</label>
                                        <input type="password" id="old-password" name="password" class="form-control"
                                            placeholder="Password Lama">
                                        @if ($message = Session::get('danger'))
                                        <span class="text-danger">{{ $message }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="new-password">Passwrod Baru</label>
                                        <input type="password" id="new-password" name="new_password"
                                            class="form-control" placeholder="Passwrod Baru">
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>

                <button type="submit" class="btn btn-dark p-3 m-3">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection