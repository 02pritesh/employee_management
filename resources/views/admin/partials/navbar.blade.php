<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
            <style>
                span.aa {
                    padding-top: 5px; /* Adjust the value as needed */
                }
            </style>

            <a class="navbar-brand brand-logo" href="#">
                <h5 style="color:white; text-align: center;">
                    <span style="display: block;">Employee</span>
                    <span class="aa" style="display: block;">Management</span>
                </h5>
                            </a>
                        {{-- <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset('assets/images/logo-mini.svg')}}" alt="logo"/></a> --}}
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="typcn typcn-th-menu"></span>
          </button>
        </div>
      </div>

      <div class="navbar-menu-wrapper d-flex align-items-center  justify-content-end">
        <ul class="navbar-nav mr-lg-2">

        <li class="nav-item ml-0">
            <h4 class="mb-0"> Admin Dashboard</h4>
          </li>

        </ul>
          {{-- <li class="nav-item nav-profile dropdown">
            <a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="images/faces/face5.jpg" alt="profile"/>
              <span class="nav-profile-name">Eugenia Mullins</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="typcn typcn-cog-outline text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item">
                <i class="typcn typcn-eject text-primary"></i>
                Logout
              </a>
            </div>
          </li>
           <li class="nav-item nav-user-status dropdown">
              <p class="mb-0">Last login was 23 hours ago.</p>
          </li>
        </ul> --}}
        <ul class="navbar-nav navbar-nav-right">
          {{-- <li class="nav-item nav-date dropdown">
            <a class="nav-link d-flex justify-content-center align-items-center" href="javascript:;">
              <h6 class="date mb-0">Today : Mar 23</h6>
              <i class="typcn typcn-calendar"></i>
            </a>
          </li> --}}
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
                @if(Session::has('file'))
                <img src="{{ asset('public/assets/uploads/img').'/'.Session::get('profile') }}" class="rounded-circle" style="width: 50px; height: 50px;">

                @else
                <img src="{{asset('public/assets/images/faces/face3.jpg')}}" alt="image"  class="rounded-circle" class="profile-pic" style="width:50px; height:50px;">
                {{-- <span class="count"></span> --}}
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header"  style="width:157px; background: #844fc1; color:white;">
                 {{Session::get('username')}}

              </p>
              <a class="dropdown-item preview-item">
                <a class="dropdown-item preview-thumbnail"  href="{{ url('Profile', ['id' => Session::get('id')]) }}">
                    <i class="typcn typcn-cog-outline text-primary" ></i>
                    My Profile
                  </a>
                <div class="preview-thumbnail ">
                    <a class="dropdown-item" href="{{url('logout')}}">
                        <i class="typcn typcn-eject text-primary"></i>
                        Logout
                      </a>
                </div>
                {{-- <div class="preview-item-content flex-grow"> --}}
                  {{-- <h6 class="preview-subject ellipsis font-weight-normal">David Grey --}}
                  {{-- <p class="font-weight-light small-text text-muted mb-0">
                    The meeting is cancelled
                  </p> --}}
                {{-- </div> --}}
              {{-- <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="images/faces/face2.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-normal">Tim Cook
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    New product launch
                  </p>
                </div>
              </a> --}}
              {{-- <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="{{asset('assets/images/faces/face3.jpg')}}" alt="image"  class="rounded-circle" class="profile-pic" style="width:40px; height:40px;">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-normal"> Johnson
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    Upcoming board meeting
                  </p>
                </div>
              </a> --}}
            </div>
          </li>
      {{-- <li class="nav-item dropdown mr-0">
        <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
          <i class="typcn typcn-bell mx-0"></i>
          <span class="count"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
          <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-success">
                <i class="typcn typcn-info mx-0"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <h6 class="preview-subject font-weight-normal">Application Error</h6>
              <p class="font-weight-light small-text mb-0 text-muted">
                Just now
              </p>
            </div>
          </a>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-warning">
                <i class="typcn typcn-cog-outline mx-0"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <h6 class="preview-subject font-weight-normal">Settings</h6>
              <p class="font-weight-light small-text mb-0 text-muted">
                Private message
              </p>
            </div>
          </a>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-info">
                <i class="typcn typcn-user mx-0"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <h6 class="preview-subject font-weight-normal">New user registration</h6>
              <p class="font-weight-light small-text mb-0 text-muted">
                2 days ago
              </p>
            </div>
          </a>
        </div>
      </li> --}}
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="typcn typcn-th-menu"></span>
    </button>
      </div>
    </nav>
