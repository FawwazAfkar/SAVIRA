<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <div class="sidebar close">
            <div class="logo-details">
              <i class='bx bxl-c-plus-plus'></i>
              <span class="logo_name">CodingLab</span>
            </div>
            <ul class="nav-links">
              <li>
                <a href="#">
                  <i class='bx bx-grid-alt' ></i>
                  <span class="link_name">Dashboard</span>
                </a>
                <ul class="sub-menu blank">
                  <li><a class="link_name" href="#">Category</a></li>
                </ul>
              </li>
              <li>
                <div class="iocn-link">
                  <a href="#">
                    <i class='bx bx-collection' ></i>
                    <span class="link_name">Category</span>
                  </a>
                  <i class='bx bxs-chevron-down arrow' ></i>
                </div>
                <ul class="sub-menu">
                  <li><a class="link_name" href="#">Category</a></li>
                  <li><a href="#">HTML & CSS</a></li>
                  <li><a href="#">JavaScript</a></li>
                  <li><a href="#">PHP & MySQL</a></li>
                </ul>
              </li>
              <li>
                <div class="iocn-link">
                  <a href="#">
                    <i class='bx bx-book-alt' ></i>
                    <span class="link_name">Posts</span>
                  </a>
                  <i class='bx bxs-chevron-down arrow' ></i>
                </div>
                <ul class="sub-menu">
                  <li><a class="link_name" href="#">Posts</a></li>
                  <li><a href="#">Web Design</a></li>
                  <li><a href="#">Login Form</a></li>
                  <li><a href="#">Card Design</a></li>
                </ul>
              </li>
              <li>
                <a href="#">
                  <i class='bx bx-pie-chart-alt-2' ></i>
                  <span class="link_name">Analytics</span>
                </a>
                <ul class="sub-menu blank">
                  <li><a class="link_name" href="#">Analytics</a></li>
                </ul>
              </li>
              <li>
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
              </li>
              <li>
            <div class="profile-details">
              <div class="profile-content">
                <!--<img src="image/profile.jpg" alt="profileImg">-->
              </div>
              <div class="name-job">
                <div class="profile_name">Prem Shahi</div>
                <div class="job">Web Desginer</div>
              </div>
              <i class='bx bx-log-out' ></i>
            </div>
          </li>
        </ul>
        </div>
        <section class="home-section">
        <div class="home-content">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <i class='bx bx-menu' ></i>
                    <x-nav-logo class="w-20 h-20" />
                    <a class="navbar-brand m-1" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
                <main class="py-4">
                    @yield('content')
                </main>
        </section>
    </div>
    
        
    <script>
        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++) {
          arrow[i].addEventListener("click", (e)=>{
         let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
         arrowParent.classList.toggle("showMenu");
          });
        }
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".bx-menu");
        console.log(sidebarBtn);
        sidebarBtn.addEventListener("click", ()=>{
          sidebar.classList.toggle("close");
        });
    </script>
</body>
</html>
