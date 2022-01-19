@extends('admin/layouts/master',['title'=>'Dashboard'])
@section('content')
@include('admin/layouts/header')

<div class="container-fluid mt--6">
  <div class="row">>
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header bg-transparent">
          <div class="row align-items-center">
            <div class="col">
              <h5 class="h3 mb-0">Calender Event</h5>
            </div>
          </div>
        </div>
        <div class="card-body">
          <!-- Chart -->
          <div id="calendar" class="col-centered"></div>
        </div>
      </div>
    </div>
  </div>


</div>

<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="form-horizontal" method="POST" action="{{Route('event.store')}}">
        @csrf
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Add Event</h4>
        </div>
        <div class="modal-body">

          <div class="form-group">
            <div class="col-sm-12">
              <label for="title" class="control-label">Title</label>
              <input type="text" required name="title" class="form-control" id="title" placeholder="Title">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <label for="color" class="control-label">Color</label>
              <select name="color" class="form-control" id="color">
                <option value="">Choose</option>
                <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
                <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
                <option style="color:#008000;" value="#008000">&#9724; Green</option>
                <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
                <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
                <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
                <option style="color:#000;" value="#000">&#9724; Black</option>

              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <label for="start" class="control-label">Start date</label>
              <input type="text" name="start" class="form-control" id="start" readonly="readonly">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <label for="end" class="control-label">End date</label>
              <input type="text" name="end" class="form-control" id="end">
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="form-horizontal" method="POST" id="formEdit" action="">
        @method('put')
        @csrf
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Edit Event</h4>
        </div>
        <div class="modal-body">

          <div class="form-group">
            <div class="col-sm-12">
              <label for="title" class="control-label">Title</label>
              <input type="text" required name="title" class="form-control" id="title" placeholder="Title">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <label for="color" class="control-label">Color</label>
              <select name="color" class="form-control" id="color">
                <option value="">Choose</option>
                <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
                <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
                <option style="color:#008000;" value="#008000">&#9724; Green</option>
                <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
                <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
                <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
                <option style="color:#000;" value="#000">&#9724; Black</option>

              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-12">
              <div class="checkbox">
                <label class="text-danger"><input type="checkbox" name="delete"> Delete event</label>
              </div>
            </div>
          </div>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('footer')
<script src="/assets/fullcalendar/dist/fullcalendar.min.js"></script>

<script>
  $(document).ready(function() {

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,basicWeek,basicDay'
      },
      longPressDelay: 0,
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      selectable: true,
      selectHelper: true,
      dayClick: function(date) {
    },
  
      select: function(start, end) {

        $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
        $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
        $('#ModalAdd').modal('show');
      },
 
      eventRender: function(event, element) {
        element.bind('dblclick', function() {
          $('#ModalEdit #formEdit').attr('action','/event/update/'+event.id);
          $('#ModalEdit #title').val(event.title);
          $('#ModalEdit #color').val(event.color);
          $('#ModalEdit').modal('show');
        });
      },
      eventDrop: function(event, delta, revertFunc) { // si changement de position

        edit(event);

      },
      eventResize: function(event, dayDelta, minuteDelta, revertFunc) { // si changement de longueur

        edit(event);

      },
      events: [
        
      @foreach($events as $event)
      @php
          $start = explode(" ", $event->start);
          $end = explode(" ", $event->end);
          if ($start[1] == '00:00:00') {
            $start = $start[0];
          } else {
            $start = $event['start'];
          }
          if ($end[1] == '00:00:00') {
            $end = $end[0];
          } else {
            $end = $event['end'];
          }
          @endphp
         {
            id: '{{$event->id}}',
            title: '{{$event->title}}',
            start: '{{$event->start}}',
            end: '{{$event->end}}',
            color: '{{$event->color}}',
          },
       @endforeach
      ]
    });

    function edit(event) {
      start = event.start.format('YYYY-MM-DD HH:mm:ss');
      if (event.end) {
        end = event.end.format('YYYY-MM-DD HH:mm:ss');
      } else {
        end = start;
      }

      id = event.id;

      Event = [];
      Event[0] = id;
      Event[1] = start;
      Event[2] = end;

      $.ajax({
        url: '{{Route("edit-date")}}',
        type: "POST",
        data: {
          Event: Event
        },
        success: function(data) {
        alert('tanggal berhasil dirubah')
        }
      });
    }

  });
</script>


@endsection