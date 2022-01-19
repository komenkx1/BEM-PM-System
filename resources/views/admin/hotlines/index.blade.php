@extends('admin/layouts/master',['title'=>'Hotline'])
@section('content')

<!-- Modal -->
<div class="modal fade" id="DeletemodalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 id="myModalLabel">Delete Confirmation</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="error-text">
          <i class="fa fa-warning modal-icon"></i>
          apakah anda yakin ingin menghapus item ini?
        </p>
      </div>
      <div class="modal-footer">
        <form id="formDelete" action="#" method="post">
          @method('delete')
          @csrf
          <button class="btn btn-default modal-dismiss" data-dismiss="modal" aria-hidden="true">Cancel</button>
          <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
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
              <li class="breadcrumb-item"><a href="/bem-admin"><i class="fas fa-home text-dark"></i></a></li>
              <li class="breadcrumb-item active" aria-current="page">Hotline</li>
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
              <h5 class="h3 mb-0">Hotline Page</h5>
            </div>
          </div>
        </div>
        <div class="card-body">
          <!-- Chart -->
          <div class="table-responsive table">
            <iframe src="https://www.tidio.com/panel/login" width="100%" height="500px" frameborder="0"></iframe>
            {{-- <table id="tbPengurus" class=" datatable stripe align-items-center table-flush border-0">
              <thead class="thead-light">
                <tr>
                  <th>No</th>
                  <th>Email | WA | Id Line</th>
                  <th>Nama</th>
                  <th>Pesan</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>

              <tbody>
                @php
                $no = 1;
                @endphp
                @foreach ($hotlines as $hotline)

                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$hotline->email_ht}}</td>
                  <td>{{$hotline->nama_ht}}</td>
                  <td>{{$hotline->pesan_ht}}</td>
                  <td class="text-center"><button class="btn btn-sm btn-danger trash" data-id="{{$hotline->id}}"
                      data-nama="{{$hotline->nama_ht}}">Hapus</button></td>
                </tr>

                @endforeach
              </tbody>
            </table> --}}
          </div>
        </div>
      </div>
    </div>
  </div>


</div>

@endsection

@section('footer')
{{-- <script>
  $(document).ready(function() {
    $(document).on('click','.trash', function () { 
     $('#DeletemodalForm').modal('show');
      var id = $(this).data('id');
      var nama = $(this).data('nama');
      $('#formDelete').attr('action', '/bem-admin/hotline/destroy/' + id);
    });
        $('#tbPengurus').DataTable({
           "bAutoWidth": true,
           "columnDefs": [
                { responsivePriority: 1, targets: 2 },
                { responsivePriority: 2, targets: 4 },
                { orderable: false, targets: 4}
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
                {
                    extend: 'pdf',
                    text: 'Export to pdf',
                    title: 'Data Hotlines',
                    className: "btn btn-md btn-success",
                    filename: 'Data Hotline',
                    exportOptions: {
                        rows: {
                            search: 'applied'
                        },
                        orthogonal: 'export',
                        columns: [0, 1, 2,3]
                    }
                },
            ],
            initComplete: function() {
                $('button.dt-button').removeClass('dt-button');
                $('div.dt-buttons').addClass(' pb-3');

               
            }
        });
 
      

    });

</script> --}}

@endsection