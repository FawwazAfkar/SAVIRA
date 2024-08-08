<nav class="navbar navbar-expand-md navbar-white bg-white"> 
    <div class="container-fluid">
        <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto"> 
                <li class="nav-item">
                    <i class='bx bx-menu' id="menu-btn" ></i>
                </li>
                <li class="nav-item">
                    <a class="title" href="{{ url('/home') }}">
                        {{ __('SAVIRA') }}
                    </a>
                </li>
            </ul>
        <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <div class="user-info-box d-flex align-items-center gap-2 p-2">
                        <div class="d-flex flex-column">
                            <b>{{ Auth::user()->name }}</b>
                            <small>{{ Auth::user()->role }}</small>
                        </div>
                        <i class='bx bxs-user-badge user-icon'></i>
                    </div>
                </li>
            </ul>
    </div>
</nav>