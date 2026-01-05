<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Diskon - PowerPOS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">

        <!-- Brand -->
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            <i class="bi bi-percent"></i> Aplikasi Diskon
        </a>

        <!-- Button responsive (HP) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('barang.*') ? 'active' : '' }}" 
                       href="{{ route('barang.index') }}">
                        <i class="bi bi-box"></i> Barang
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('transaksi.*') ? 'active' : '' }}" 
                       href="{{ route('transaksi.index') }}">
                        <i class="bi bi-receipt"></i> Transaksi
                    </a>
                </li>

            </ul>
        </div>

    </div>
</nav>



    <main class="py-4">
        @yield('content')
    </main>
    
</body>
</html>