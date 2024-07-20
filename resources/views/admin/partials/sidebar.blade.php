<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link {{ url('adminuser') == url()->current() ? 'active' : '' }}" href="{{url('adminuser')}}">
            <i class="fa-solid fa-gauge menu-icon"></i>              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ url('register') == url()->current() ? 'active' : '' }}" data-toggle="" href="{{url('register')}}" aria-expanded="false" aria-controls="form-elements">
                <i class="fa-solid fa-user menu-icon"></i>
                 <span class="menu-title">Registration</span>
            </a>
        </li>
          <li class="nav-item">
            <a class="nav-link {{ url('employee') == url()->current() ? 'active' : '' }}" data-toggle="" href="{{url('employee')}}" aria-expanded="false" aria-controls="ui-basic">
                <i class="fa-solid fa-user menu-icon"></i>
              <span class="menu-title">Employee</span>
            </a>
            <!-- <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
              </ul>
            </div> -->
          </li>

            <!-- <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic Elements</a></li>
              </ul>
            </div> -->
          </li>
          <li class="nav-item">
            <a class="nav-link {{ url('leave-application') == url()->current() ? 'active' : '' }}" data-toggle="" href="{{url('leave-application')}}" aria-expanded="false" aria-controls="charts">
                <i class="fa-solid fa-user menu-icon"></i>
                 <span class="menu-title">Leave</span>
            </a>
            <!-- <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a></li>
              </ul>
            </div> -->
          </li>
          <li class="nav-item">
            <a class="nav-link {{ url('function') == url()->current() ? 'active' : '' }}" data-toggle="" href="{{url('function')}}" aria-expanded="false" aria-controls="tables">
                <i class=" fa-solid fa-calendar-days menu-icon"></i>
                <span class="menu-title">Add Event</span>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ url('Notification') == url()->current() ? 'active' : '' }}" data-toggle="" href="{{url('Notification')}}" aria-expanded="false" aria-controls="icons">
                <i class=" fa-solid fa-thin fa-bell  menu-icon"></i>
                <span class="menu-title">Notification</span>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ url('holidays') == url()->current() ? 'active' : '' }}" data-toggle="" href="{{url('holidays')}}" aria-expanded="false" aria-controls="auth">
                <i class=" fa-solid fa-calendar-days menu-icon"></i>
                <span class="menu-title">Holiday</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ url('emp_salary') == url()->current() ? 'active' : '' }}" data-toggle="" href="{{url('emp_salary')}}" aria-expanded="false" aria-controls="error">
                <i class=" fa-solid fa-indian-rupee-sign menu-icon"></i>
                <span class="menu-title pl-1">Salary</span>
            </a>
            <!-- <div class="collapse" id="error">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
              </ul>
            </div> -->

            
          </li>

          {{-- <li class="nav-item">
            <a class="nav-link {{ url('module') == url()->current() ? 'active' : '' }}" data-toggle="" href="{{url('module')}}" aria-expanded="false" aria-controls="auth">
              <i class=" fa-solid fa-indian-rupee-sign menu-icon"></i>
                <span class="menu-title">View Module</span>
            </a>
          </li> --}}


          <li class="nav-item">
            <a class="nav-link {{ url('add-project') == url()->current() ? 'active' : '' }}" data-toggle="" href="{{url('add-project')}}" aria-expanded="false" aria-controls="auth">
              <i class="fa-solid fa-user menu-icon"></i>
                <span class="menu-title">Add Project</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ url('project-info') == url()->current() ? 'active' : '' }}" data-toggle="" href="{{url('project-info')}}" aria-expanded="false" aria-controls="auth">
                <i class=" fa-solid fa-calendar-days menu-icon"></i>
                <span class="menu-title">Project Details</span>
            </a>
          </li>
{{-- 
          <li class="nav-item">
            <a class="nav-link {{ url('add-employee-developer') == url()->current() ? 'active' : '' }}" data-toggle="" href="{{url('add-employee-developer')}}" aria-expanded="false" aria-controls="auth">
              <i class="fa-solid fa-user menu-icon"></i>
                <span class="menu-title">Add Employee-developer</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ url('employee-developer-detail') == url()->current() ? 'active' : '' }}" data-toggle="" href="{{url('employee-developer-detail')}}" aria-expanded="false" aria-controls="auth">
              <i class=" fa-solid fa-calendar-days menu-icon"></i>
                <span class="menu-title">Emp-Developer Details</span>
            </a>
          </li> --}}

          <li class="nav-item">
            <a class="nav-link {{ url('asign-project') == url()->current() ? 'active' : '' }}" data-toggle="" href="{{url('asign-project')}}" aria-expanded="false" aria-controls="auth">
              <i class=" fa-solid fa-calendar-days menu-icon"></i>
                <span class="menu-title">Asign Project</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ url('asign-project-detail') == url()->current() ? 'active' : '' }}" data-toggle="" href="{{url('asign-project-detail')}}" aria-expanded="false" aria-controls="auth">
              <i class=" fa-solid fa-calendar-days menu-icon"></i>
                <span class="menu-title">Asign Project Details</span>
            </a>
          </li>

        </ul>
      </nav>
