@extends('layouts/master',['title'=>'Info Asrama'])
@section('content')
<!-- Hero Start -->
<section class="position-relative d-block vh-100" id="home">
    <div class="slide-inner slide-bg-image d-flex align-items-center slider-lembaga"
        style="background: center; height: 100%; background-color:#d7d3c1;">
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="title-heading text-center">
                        <p class="heading animate__animated animate__fadeInLeft" style="margin-top:60px">Asrama dan
                            Rusunawa</p>
                        <p class="heading animate__animated animate__fadeInLeft animate__slow">Universitas Udayana</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero End -->

<!-- ASRAMA -->
<center>
    <div class="container asrama" style="margin-bottom: 30px; margin-top:50px">
        <h4 class="text-muted">Informasi</h4>
        <h2>Asrama dan Rusunawa</h2>
        <p class="text-muted mb-4">Formulir pendaftaran Asrama/Rusunawa Universitas Udayana dapat di download <a
                href="https://www.unud.ac.id/file/FormPermohonanRusunawa.pdf">disini</a></p>
        <img src="/assets/bem_images/asrama/rusun2.jpg" class="img-fluid">
        <img src="/assets/bem_images/asrama/rusun1.jpg" class="img-fluid">
    </div>
</center>
<!-- ASRAMA END -->
@endsection