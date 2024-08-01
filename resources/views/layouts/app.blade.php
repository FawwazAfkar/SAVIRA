<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- BoxIcons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">


    <!-- DataTables -->
    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.1.2/b-3.1.0/b-colvis-3.1.0/b-html5-3.1.0/b-print-3.1.0/sc-2.4.3/sp-2.3.1/datatables.min.css" rel="stylesheet">
    
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js','resources/css/app.css'])
</head>

<body class="@if(Route::is('login')) login-page @endif">
    <div id="app">
        <!-- Permission for sidebar view -->
        @if (Auth::user())
           <x-sidebar /> 
           <x-navbar />
        @endif

        <!-- Home Section -->
        <section class="home-section">
        <div class="home-content">
            <!-- Main Content -->
                <main class="main-content">
                    @yield('content')
                </main>
            </div>
        </section>
    </div>  

    <!-- Bootstrap Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <!-- Include PDF.js library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.5.141/pdf.min.js"></script>

    <!-- DataTables -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.1.2/b-3.1.0/b-colvis-3.1.0/b-html5-3.1.0/b-print-3.1.0/sc-2.4.3/sp-2.3.1/datatables.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</body>
</html>
