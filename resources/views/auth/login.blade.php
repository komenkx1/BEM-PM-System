<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="/assets/bem_css/floating-labels.css" rel="stylesheet">
</head>
<body>

<form class="form-signin" method="post" action="{{ route('login') }}">
    @csrf
      <div class="text-center mb-4">
        <img class="mb-4" src="/assets/img/icon.png" alt="" width="30%" height="30%">
        <h1 class="h3 mb-3 font-weight-normal">Welcome to the Admin Page</h1>
        <p>"Integrasi Ragam Karya Guna Menjadikan BEM PM Universitas Udayana sebagai Wadah untuk Berkontribusi Aktif dalam Mewujudkan Kebermanfaatan bagi Udayana, Bali, dan Indonesia"</p>
      </div>

   

     <div class="form-label-group">
        <input type="text" name="username" id="inputUsername" class="form-control  @error('username') is-invalid @enderror" placeholder="Username" required autofocus>
        @error('username')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
        <label for="inputUsername">Username</label>
      </div>
               
      <div class="form-label-group">
        <input type="password" name="password" id="inputPassword" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
        @error('password')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
        <label for="inputPassword">Password</label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted text-center">RHH &copy; 2020-2021</p>
    </form>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Alert!</h4>
          <hr>
        </div>
        <div class="modal-body">

          @if ($message = Session::get('success'))
          <strong>{{ $message }}</strong>
          @endif
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
    <!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
     @if ($message = Session::get('success'))
        $('#myModal').modal("show");
@endif
</script>
</body>
</html>
