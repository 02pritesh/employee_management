
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
                {{-- <img src="{{asset('public/assets/images/logo-dark.svg')}}" alt="logo"> --}}
                <h4> Employee Management</h4>
              </div>

              <form   action="{{url('forget_password') }}" method="post">
               @csrf

                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                                        {{Session::get('success')}}
                    </div>
                    @endif
                <form class="pt-3">
                <div class="form-group">
                    <label> Enter your valid  email  address here </label>
                  <input type="email" class="form-control form-control-lg"   style="border:0.5px solid;"name = "email" id="exampleInputEmail1" placeholder="Enter varified email here">
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="">SIGN IN</button>
                </div>



            </div>
      </form>

                <!-- <div class="mb-2">
                  <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="typcn typcn-social-facebook mr-2"></i>Connect using facebook
                  </button>
                </div> -->
                {{-- <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="register.html" class="text-primary">Create</a>
                </div> --}}
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
  <!-- base:js -->
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


