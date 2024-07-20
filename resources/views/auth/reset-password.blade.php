
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>PolluxUI</title>
  <!-- base:css -->
  <link rel="stylesheet" href="{{asset('public/assets/vendors/typicons/typicons.css')}}">
  <link rel="stylesheet" href="{{asset('public/assets/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('public/assets/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('public/assets/images/favicon.png')}}" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
          <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
              <div class="col-lg-4 mx-auto">
                <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                  <div class="brand-logo">
                    <img src="{{asset('public/assets/images/logo-dark.svg')}}" alt="logo">
                  </div>

    <form method="POST" action="{{ url('reset-password') }}">
        @csrf
        <input type="hidden" name="token" value="{{request('token')}}">
        <form class="pt-3">
            <div class="form-group">
                <label for="password">New Password:</label>

              <input type="text" class="form-control form-control-lg"  name="new_password" id="exampleInputEmail1" placeholder="Username">
              <span class="text-danger">@error('password')
                {{ $message }}
                @enderror
            </span>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label><br>

              <input type="password" class="form-control form-control-lg" name="confirm_password"  id="exampleInputPassword1" placeholder="Password">
              <span class="text-danger">@error('password')
                {{ $message }}
                @enderror
            </span>
            </div>
            <div class="mt-3">
              <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="">Reset Password</button>
            </form>












    <script src="../../vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="{{asset('public/assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('public/assets/js/hoverable-collapse.')}}"></script>
    <script src="{{asset('public/assets/js/template.js')}}"></script>
    <script src="{{asset('public/assets/js/settings.js')}}"></script>
    <script src="{{asset('public/assets/js/todolist.js')}}"></script>
    <!-- endinject -->
  </body>

  </html>
