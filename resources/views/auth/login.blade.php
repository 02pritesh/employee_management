<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>PolluxUI</title>
  <!-- base:css -->
  <link rel="stylesheet" href="{{asset('assets/vendors/typicons/typicons.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('assets/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />
</head>

<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <h4 class="" style='color:;'>Employee Management</h4>
                {{-- <img src="{{asset('assets/images/logo-dark.svg')}}" alt="logo"> --}}
              </div>

              <form   action="{{url('login')}}" method="post">
               @csrf

               @if (Session::has('success'))
          <div  id="success-message" class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>

                       @elseif(Session::has('fail'))
                       <div  id="success-message"  class="alert alert-danger " role="alert">
                        {{Session::get('fail')}}
                    </div>

                  @endif
                <form class="pt-3">
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg"  name = "email" id="exampleInputEmail1" placeholder="Username">
                  <span class="text-danger">@error('email')
                    {{ $message }}
                @enderror
                </span>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg"  name="password"  id="exampleInputPassword1" placeholder="Password">
                  <span class="text-danger">@error('password')
                    {{ $message }}
                    @enderror
                </span>
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="">SIGN IN</button>
                </div>
        <div class="row">
          <!-- <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div> -->
          <!-- /.col -->
          <div class="">
          </div>
          <!-- /.col -->
        </div>
      </form>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="{{ url('password') }}" class="auth-link text-black">Forgot password?</a>
                </div>
                <!-- <div class="mb-2">
                  <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="typcn typcn-social-facebook mr-2"></i>Connect using facebook
                  </button>
                </div> -->
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="register.html" class="text-primary">Create</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
  <!-- base:js -->
  <script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{asset('assets/js/off-canvas.js')}}"></script>
  <script src="{{asset('assets/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('assets/js/template.js')}}"></script>
  <script src="{{asset('assets/js/settings.js')}}"></script>
  <script src="{{asset('assets/js/todolist.js')}}"></script>
  <script>
    // JavaScript to hide the success message after a delay
    setTimeout(function() {
        document.getElementById('success-message').style.display = 'none';
    }, 2000); // 5000 milliseconds = 5 seconds (adjust as needed)
</script>
  <!-- endinject -->
</body>

</html>
