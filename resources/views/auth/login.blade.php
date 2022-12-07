<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/register.css">
  <title>Login - Customer</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card card-signin flex-row my-5">
          <div class="card-img-left d-none d-md-flex">
            <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body">
            <h5 class="card-title text-center"><b>Login</b> - Customer</h5>
            <form class="form-signin" method="post" action="{{ url('/login-customer') }}">
              @csrf
              <div class="form-label-group">
                <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required>
                <label for="inputEmail">Email address</label>
              </div>
              <div class="form-label-group">
                <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>
              <hr>

              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="    ">Login</button>
              <a class="d-block text-center mt-2 small" href="{{ url('/register-customer') }}">Sign Up</a>
              <hr class="my-4">
            </form>
          </div>
        </div>
        <a class="text-center btn btn-default" href="{{ url('/') }}">Trở lại trang chủ</a>
      </div>
    </div>
  </div>
</body>

</html>