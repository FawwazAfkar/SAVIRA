    
<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

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

      <li>
          <a href="{{ route('daftar-user') }}">
            <i class='bx bxs-user-rectangle' ></i>
            <span class="link_name">Daftar User</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="{{ route('daftar-user') }}">Daftar User</a></li>
          </ul>
      </li>

      <li>
        <a href="{{ route('daftar-instansi') }}">
          <i class='bx bx-buildings' ></i>
          <span class="link_name">Daftar Instansi</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{ route('daftar-instansi') }}">Daftar Instansi</a></li>
        </ul>
      </li>
      
      <li>
          <a href="{{ route('daftar-arsip') }}">
            <i class='bx bx-archive' ></i>
            <span class="link_name">Daftar Arsip</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="{{ route('daftar-arsip') }}">Daftar Arsip</a></li>
          </ul>
      </li>

      {{-- <li>
        <a href="#">
          <i class='bx bx-line-chart' ></i>
          <span class="link_name">Chart</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Chart</a></li>
        </ul>
      </li>

      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-plug' ></i>
            <span class="link_name">Plugins</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Plugins</a></li>
          <li><a href="#">UI Face</a></li>
          <li><a href="#">Pigments</a></li>
          <li><a href="#">Box Icons</a></li>
        </ul>
      </li>

      <li>
        <a href="#">
          <i class='bx bx-compass' ></i>
          <span class="link_name">Explore</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Explore</a></li>
        </ul>
      </li>

      <li>
        <a href="#">
          <i class='bx bx-history'></i>
          <span class="link_name">History</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">History</a></li>
        </ul>
      </li>

      <li>
        <a href="#">
          <i class='bx bx-cog' ></i>
          <span class="link_name">Setting</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Setting</a></li>
        </ul>
      </li> --}}

    <li>
        <div class="profile-details">
        <div class="profile-content">
            <!--<img src="image/profile.jpg" alt="profileImg">-->
        </div>
        <div class="name-job">
            <div class="profile_name">Pengguna</div>
            <div class="job">Dinas Arsip dan Perpustakaan Daerah Kabupaten Banyumas</div>
        </div>
        <i class='bx bx-log-out' ></i>
        </div>
  </li>
</ul>
</div>