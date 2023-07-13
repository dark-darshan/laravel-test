
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href={{ url('home') }}>
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      @if(Auth::user()->role == 1)
      <li class="nav-item">
        <a class="nav-link collapsed" href={{ url('users') }}>
          <i class="bi bi-person"></i>
          <span>Customer</span>
        </a>
      </li><!-- End Contact Page Nav -->
      @endif
      @if(Auth::user()->role == 2)
      <li class="nav-item">
        <a class="nav-link collapsed" href={{ url('posts') }}>
          <i class="bi bi-file-text"></i>
          <span>Post</span>
        </a>
      </li>
      @endif
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </li><!-- End Contact Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->