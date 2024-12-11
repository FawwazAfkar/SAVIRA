<nav class="navbar navbar-expand-md navbar-white bg-white shadow-sm"> 
    <div class="container-fluid">
            <!-- offcanvasToggler -->
            <!-- <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                Toggle offcanvas
            </button> -->
            <!-- Sidebar Toggler -->
            <i class='bx bx-menu' data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample"></i>

            
            <!-- Brand -->
            <a class="title" href="{{ url('/home') }}">
                SAVIRA
            </a>
        <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto"> 
                <li class="nav-item">
                    
                </li>
            </ul>
        <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <div class="user-info-box">
                        <div class="user-info-text">
                            <b class="user-name">{{ Auth::user()->name }}</b>
                            <small class="user-role">{{ Auth::user()->role }}</small>
                        </div>
                        <i class='bx bxs-user-badge user-icon'></i>
                    </div>
                </li>
            </ul>
    </div>
</nav>