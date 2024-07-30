    
<!-- Style -->
<link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<!-- Sidebar HTML -->
<div class="sidebar close">
    <div class="logo-details">
      <i class='bx'>
        <x-nav-logo class="w-20 h-20" />
      </i>
    <span class="logo_name">SAVIRA</span>

    </div>
    <ul class="nav-links">
      <li>
        <a href="{{ route('home') }}">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{ route('home') }}">Dashboard</a></li>
        </ul>
      </li>

      @can('manageUsers')
      <li>
          <a href="{{ route('daftar-user') }}">
            <i class='bx bxs-user-rectangle' ></i>
            <span class="link_name">Daftar User</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="{{ route('daftar-user') }}">Daftar User</a></li>
          </ul>
      </li>
      @endcan

      @can('manageInstansis')
      <li>
        <a href="{{ route('daftar-instansi') }}">
          <i class='bx bx-buildings' ></i>
          <span class="link_name">Daftar Instansi</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{ route('daftar-instansi') }}">Daftar Instansi</a></li>
        </ul>
      </li>
      @endcan
      

      <li>
          <a href="{{ route('daftar-arsip') }}">
            <i class='bx bx-archive' ></i>
            <span class="link_name">Daftar Arsip</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="{{ route('daftar-arsip') }}">Daftar Arsip</a></li>
          </ul>
      </li>

    <li>
        <div class="profile-details">
          <div class="name-job">
              <div class="profile_name">{{ Auth::user()->name }}</div>
              <div class="job">{{ Auth::user()->instansi->nama_instansi }}</div>
          </div>
          <div>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class='bx bx-log-out'></i>
              </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </div>
        </div>
  </li>
</ul>
</div>