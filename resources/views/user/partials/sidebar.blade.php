<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link {{ url('dashboard') == url()->current() ? 'active' : '' }}" href="{{url('dashboard')}}">
              <i class="fa-solid fa-gauge menu-icon"></i>             
               <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ url('Userprofile') == url()->current() ? 'active' : '' }} " data-toggle="" href="{{url('Userprofile')}}" aria-expanded="false" aria-controls="ui-basic">
              <!-- <i class="typcn typcn-document-text menu-icon"></i> -->
              <i class="fa-solid fa-user  menu-icon "></i>
              <span class="menu-title">My Profile</span>
              <!-- <i class="menu-arrow"></i> -->
            </a>
            <div class="" id="ui-basic">

            </div>
          </li>


          <li class="nav-item">
            <a class="nav-link  " data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="fa-solid fa-calendar-days menu-icon"></i>
              <span class="menu-title">Attandence</span>
              <i class="fa-solid fa-caret-down menu-arrow"></i>            
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link  {{ url('attandence') == url()->current() ? 'active' : '' }}" href="{{ url('attandence') }}">
                    <span class="menu-title">Attendance</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ url('attandence_show') == url()->current() ? 'active' : '' }}" href="{{ url('attandence_show') }}">
                    <span class="menu-title">View Attendance</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>

            <li class="nav-item">
            <a class="nav-link {{ url('event') == url()->current() ? 'active' : '' }}" data-toggle="" href="{{url('event')}}" aria-expanded="false" aria-controls="form-elements">
            <i class="fa-solid fa-calendar-days menu-icon"></i>
             <span class="menu-title">Company Events</span>
            </a>
        <li>


          <li class="nav-item">
            <a class="nav-link {{ url('leave') == url()->current() ? 'active' : '' }}" data-toggle="" href="{{url('leave')}}" aria-expanded="false" aria-controls="icons">
              <i class="fa-solid fa-calendar-days menu-icon"></i>
              <span class="menu-title">Leave</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link  {{ url('holiday') == url()->current() ? 'active' : '' }}" data-toggle="" href="{{url('holiday')}}" aria-expanded="false" aria-controls="auth">
            <i class=" fa-solid fa-calendar-days menu-icon"></i>
              <span class="menu-title">Holiday</span>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link  {{ url('notification') == url()->current() ? 'active' : '' }}" data-toggle="" href="{{url('notification')}}" aria-expanded="false" aria-controls="auth">
            <i class=" fa-solid fa-thin fa-bell  menu-icon"></i>
              <span class="menu-title">Notification</span>
            </a>
         </li>
          <li class="nav-item">
            <a class="nav-link  {{ url('salary') == url()->current() ? 'active' : '' }}" data-toggle="" href="{{url('salary')}}"aria-expanded="false" aria-controls="auth">
            <i class=" fa-solid fa-indian-rupee-sign menu-icon"></i>
              <span class="menu-title">Salary</span>
            </a>
         </li>


        </ul>
      </nav>
