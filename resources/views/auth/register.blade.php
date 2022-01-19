<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="/assets/bem_css/floating-labels.css" rel="stylesheet">
</head>

<body>

    <form class="form-signin" method="post" action="{{ route('register') }}">
        @csrf
        <div class="text-center mb-4">
            <img class="mb-4" src="/assets/bem_images/icon.png" alt="" width="30%" height="30%">
            <h1 class="h3 mb-3 font-weight-normal">Welcome to the Admin Page</h1>
            <p>"Integrasi Ragam Karya Guna Menjadikan BEM PM Universitas Udayana sebagai Wadah untuk Berkontribusi Aktif dalam Mewujudkan Kebermanfaatan bagi Udayana, Bali, dan Indonesia"</p>
        </div>


        <div class="form-label-group">

            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                placeholder="Input name" required autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <label for="name">Name</label>
        </div>
        <div class="form-label-group">
            <input type="text" name="username" id="inputUsername"
                class="form-control @error('username') is-invalid @enderror" placeholder="Username" required autofocus>
            @error('username')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <label for="inputUsername">Username</label>
        </div>

        <div class="form-label-group">
            <input type="password" name="password" id="inputPassword"
                class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <label for="inputPassword">Password</label>
        </div>
        <div class="form-label-group">
            <input type="password" name="password_confirmation" id="inputrePassword" class="form-control"
                placeholder="Password" required>
            <label for="inputrePassword">Re-enter Password</label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" name="signup-submit" type="submit">Sign up</button>
        <p class="mt-5 mb-3 text-muted text-center">RHH &copy; 2020-2021</p>
    </form>

    <!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>