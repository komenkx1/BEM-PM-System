@extends('admin/layouts/master',['title'=>'Request Sertifikat'])
@section('content')
    <style>
        p,
        span {
            font-weight: 500;
        }

    </style>
    <div class="modal fade bd-example-modal-lg" id="modalDetail" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 id="myModalLabel">Detail Sertifikat</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <div class="desc container">
                        <label for="">Deskripsi Kegiatan | <span id="nomorSertif">Nomor Sertifikat :
                                jsdfjsfsjdf/fsoifjosdofisjd/sfjsdf</span> </label>
                        <p id="descKegiatan">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatum inventore
                            nesciunt quam, omnis ipsum suscipit, ex, magnam sed repellat qui eveniet cumque vel odit amet
                            reiciendis atque? Perferendis, doloribus similique?</p>
                    </div>
                    <hr>
                    <div class="row container gx-auto">
                        <div class="col-md-6 ">
                            <p>Nama Pembicara <br><span id="namaPembicara">-</span></p>
                        </div>
                        <div class="col-md-4 ">
                            <p>Tanggal <br><span id="tanggal">-</span></p>
                        </div>
                        <div class="col-md-2 ">
                            <p>Jenis Cap <br><span id="jenisCap">-</span></p>
                        </div>
                        <div class="col-md-6">
                            <p>Tempat Acara <br><span id="tempat">-</span></p>
                        </div>
                        <div class="col-md-4">
                            <p>Tanda Tangan Menteri <br><span id="ttdMenteri">-</span></p>
                        </div>
                        <div class="col-md-6">
                            <p>Nama Menteri <br><span id="namaMenteri">-</span></p>
                        </div>
                        <div class="col-md-4">
                            <p>Nim Menteri <br><span id="nimMenteri">-</span></p>
                        </div>
                        <div class="col-md-12 gx-auto d-flex justify-content-center">
                            <a href="#" target="_blank" class="btn btn-primary" id="btnPeserta">Download FIle Peserta</a>
                            <a href="#" target="_blank" class="btn btn-primary" id="btnTtd">Download FIle Tanda Tangan
                                Menteri</a>

                        </div>

                    </div>
                    <hr>
                    <div class="info-sertif">

                    </div>
                </div>
                <div class="modal-footer">

                    <form id="formVerif" action="" method="post">
                        @method('patch')
                        @csrf
                        <button
                            class="btn btn-success">Verifikasi</button>

                    </form>

                    <button class="btn btn-default modal-dismiss" data-dismiss="modal" aria-hidden="true">Close</button>

                </div>
            </div>
        </div>
    </div>
    <div class="header bg-yellow pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/bem-admin"><i class="fas fa-home text-dark"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">E-Setifikat</li>
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
                @include('admin/layouts/notif')
                <div class="card">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="h3 mb-0">Request Sertifikat List</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="table-responsive table">
                            <table id="tbPengurus" class=" datatable stripe align-items-center table-flush border-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Tipe Sertifikat</th>
                                        <th>Kementerian</th>
                                        <th>Jabatan</th>
                                        <th>Nama Kegiatan</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($pengajuans as $pengajuan)

                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $pengajuan->tipe_sertifikat }}</td>
                                            <td>{{ $pengajuan->kementrian_yang_mengajukan }}</td>
                                            <td>{{ $pengajuan->jabatan }}</td>
                                            <td>{{ $pengajuan->nama_kegiatan }}</td>
                                            <td>{{ $pengajuan->status ? 'terverifikasi' : '-' }}</td>
                                            <td class="text-center d-lg-flex justify-content-center">
                                                <button class="btn btn-sm btn-info sertif-detail"
                                                    data-id="{{ $pengajuan->id }}" data-nama="{{ $pengajuan->id }}">View
                                                    Detail</button>
                                                | 
                                                <form id="formDelete"
                                                    action="{{ Route('sertifikat.destroy', ['pengajuans' => $pengajuan->id]) }}"
                                                    method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" onclick=" return confirm('Apakah Anda Ingin Menghapus Data Ini?') "
                                                        class="btn btn-sm btn-danger">Hapus</button>
                                                </form>
                                            </td>

                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

@endsection

@section('footer')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.sertif-detail', function() {
                $('#modalDetail').modal('show');
                var id = $(this).data('id');
                var nama = $(this).data('nama');
                $.get("/bem-admin/sertifikat-list/detail/" + id, function(data) {
                    $('#namaPembicara').html(data.nama_lengkap_pembicara);
                    $('#nomorSertif').html(data.nomor_sertif);
                    $('#descKegiatan').html(data.deskripsi_kegiatan);
                    $('#tanggal').html(data.hari_tanggal);
                    $('#jenisCap').html(data.cap);
                    $('#tempat').html(data.bertempat_di);
                    $('#ttdMenteri').html(data.tambah_ttd_menteri);
                    $('#namaMenteri').html(data.nama_lengkap_menteri ?? '-');
                    $('#nimMenteri').html(data.nim_menteri ?? '-');
                    $('#btnPeserta').attr('href', '/bem-admin/download/' + data.file_excel_nama);
                    if (data.tambah_ttd_menteri == "Tidak") {
                    $('#btnTtd').addClass("d-none");                        
                    }else{
                    $('#btnTtd').removeClass("d-none");                        
                    $('#btnTtd').attr('href', '/bem-admin/download/' + data.file_ttd_menteri);
                    }
                    if (data.status == 0) {
                        $('#formVerif').removeClass("d-none");
                        $('#formVerif').attr('action', '/bem-admin/sertifikat-list/verifikasi/' +
                            id);
                    } else {
                        $('#formVerif').addClass("d-none");

                    }
                })
            });
            $('#tbPengurus').DataTable({
                "bAutoWidth": true,
                "columnDefs": [{
                        responsivePriority: 1,
                        targets: 2
                    },
                    {
                        responsivePriority: 2,
                        targets: 4
                    },
                    {
                        orderable: false,
                        targets: 4
                    }
                ],
                bInfo: false,
                responsive: true,
                dom: 'Bfrtip',
                deferRender: true,
                rowReorder: {
                    selector: 'td:nth-child(3)'
                },
                lengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"]
                ],
                buttons: [


                ],
                initComplete: function() {
                    $('button.dt-button').removeClass('dt-button');
                    $('div.dt-buttons').addClass(' pb-3');


                }
            });



        });
    </script>

@endsection
