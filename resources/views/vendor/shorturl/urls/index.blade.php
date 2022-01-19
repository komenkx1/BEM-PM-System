@extends('admin/layouts/master',['title'=>'Short Link'])

@section('content')


<div class="header bg-yellow pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="/bem-admin"><i class="fas fa-home text-dark"></i></a></li>
              <li class="breadcrumb-item active" aria-current="page">Short Link</li>
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
              <h5 class="h3 mb-0">Short Link List</h5>
            </div>
          </div>
        </div>
        <div class="card-body">
          <!-- Chart -->
          <div class="table-responsive">
            <table id="tbLinks" class=" table align-items-center table-flush border-0">
              <thead class="thead-light">
                <tr>
                  <th>Url</th>
                  <th width="10px">Short Url</th>
                  <th>Counter</th>
                  <th>User</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>

              <tbody>
                @php
                $no = 1;
                @endphp
                @foreach ($urls as $url)
                <tr>
                  <td>{{Str::limit($url->url, 20)}}</td>
                  <td><a href="{{ route('shorturl.redirect', $url->code) }}">{{ $url->code }}</a></td>
                  <td>{{ $url->counter }}</td>
                  <td>{{ optional($url->user)->name }}</td>
                  <td align="center">
                    <button class="btn btn-sm btn-success"
                      data-clipboard-text="{{ route('shorturl.redirect', $url->code) }}">Copy</button>
                    <a class="btn btn-sm btn-primary" href="{{ route('shorturl.url.edit', $url->id) }}"
                      role="button">Edit</a><span <form method="POST"
                      action="{{ route('shorturl.url.destroy', $url->id) }}">
                      @method('DELETE')
                      @csrf
                      <button class="btn btn-sm btn-danger" href="#"
                        onclick="return confirm('Apakah anda yakin menghapus link ini??')" role="button">Delete</button>
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
@endsection

@section('footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min.js"></script>
<script>
  var clipboard = new ClipboardJS('.btn-success');

    clipboard.on('success', function(e) {
        e.trigger.innerText = 'Copied!';
    });
</script>
<script>
  $(document).ready(function() {

        $('#tbLinks').DataTable({
           "columnDefs": [
                { responsivePriority: 1, targets: 1 },
                { responsivePriority: 2, targets: 4 },
                
            ],
            order:false,
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
                    text: 'Add Url',
                    className: "btn btn-md btn-dark",
                    action: function ( e, dt, node, config ) {
                      window.location.href='{{ route("shorturl.url.create") }}';
                    }
                },
                // {
                //     extend: 'excel',
                //     text: 'Export to excel',
                //     title: 'Data Semua Pengurus',
                //     className: "btn btn-md btn-info",
                //     filename: 'Export ALL - ' + d,
                //     init: function(dt, node, config) {
                //         $("#filter").on('change', function() {
                //             config.filename = 'Pengurus ' + this.value + ' - ' + d;
                //             config.title = 'Data Pengurus ' + this.value + ' - ' + d;
                //         })
                //     },
                //     exportOptions: {
                //         rows: {
                //             search: 'applied'
                //         },
                //         orthogonal: 'export',
                //         columns: [0, 1, 2]
                //     }
                // },
            ],
            initComplete: function() {
                $('button.dt-button').removeClass('dt-button');
                $('div.dt-buttons').addClass(' pb-3');

               
            }
        });
 
      

    });

</script>
@endsection