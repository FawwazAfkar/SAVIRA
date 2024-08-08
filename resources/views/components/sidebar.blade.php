<div class="sidebar close">

    <div class="logo-details">
      <a href="{{ route('home') }}">
        <div class="logo_icon"><x-nav-logo /></div>
      </a>
      <div class="logo_text">
        <span class="logo_name">SAVIRA</span>
        <span class="logo_desc">Sistem Penyimpanan Arsip Vital Regional <br> Banyumas</span>
      </div>
    </div>
    <ul class="nav-links">
      <li>
        <a href="{{ route('home') }}">
          <i class='bx bxs-dashboard'></i>
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
          <span class="link_name">Daftar Unit Kerja</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{ route('daftar-instansi') }}">Daftar Unit Kerja</a></li>
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
          <div class="logoutbtn">
            <a href="{{ route('logout') }}" onclick="event.preventDefault();">
              <i class='bx bx-log-out' ></i>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </div>
        </div>
  </li>
</ul>
</div>

<div id="overlay" class="overlay"></div>
