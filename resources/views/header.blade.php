
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
     
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">
          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <!--<span class="badge bg-primary badge-number">4</span>-->
          </a><!-- End Notification Icon -->
          <li class="nav-item dropdown">
            <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
              <i class="bi bi-chat-left-text"></i>
                <!--<span class="badge bg-success badge-number">3</span>-->
            </a><!-- End Messages Icon -->

            <li class="nav-item dropdown pe-3">
             <!-- End Profile Iamge Icon -->

              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                <li class="dropdown-header">
                  <h6>{{ Auth::user()->name }}</h6>
                  <!-- <span>Admin</span> -->
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>

                <li>
                  <a class="dropdown-item d-flex align-items-center" href={{ url('usersprofile') }}>
                    <i class="bi bi-person"></i>
                    <span>My Profile</span>
                  </a>
                </li>

                <li>
                  <hr class="dropdown-divider">
                </li>

                <li>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </li>
              </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->
          </ul>
        </nav><!-- End Icons Navigation -->
      </header>
        <!-- End Header -->