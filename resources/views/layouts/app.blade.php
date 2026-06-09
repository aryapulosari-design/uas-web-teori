<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistem Manajemen Blog - Panel Admin">
    <title>@yield('title', 'Dashboard') — CMS Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #198754;
            --primary-dark: #146c43;
            --sidebar-bg: #1a1d23;
            --sidebar-hover: #2d3139;
            --sidebar-active: #198754;
            --body-bg: #f0f2f5;
            --card-shadow: 0 2px 12px rgba(0,0,0,0.08);
        }
        * { font-family: 'Inter', sans-serif; }
        body { background: var(--body-bg); min-height: 100vh; }

        /* Sidebar */
        .sidebar {
            width: 260px;
            min-height: 100vh;
            background: var(--sidebar-bg);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            transition: all 0.3s;
        }
        .sidebar .brand {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .sidebar .brand h4 {
            color: #fff;
            font-weight: 700;
            margin: 0;
            font-size: 1.2rem;
        }
        .sidebar .brand small { color: rgba(255,255,255,0.5); font-size: 0.75rem; }
        .sidebar .nav-link {
            color: rgba(255,255,255,0.7);
            padding: 0.75rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 0.9rem;
            transition: all 0.2s;
            border-left: 3px solid transparent;
        }
        .sidebar .nav-link:hover {
            color: #fff;
            background: var(--sidebar-hover);
            border-left-color: var(--primary);
        }
        .sidebar .nav-link.active {
            color: #fff;
            background: var(--sidebar-hover);
            border-left-color: var(--primary);
            font-weight: 600;
        }
        .sidebar .nav-link i { font-size: 1.1rem; width: 20px; text-align: center; }
        .sidebar .nav-section {
            color: rgba(255,255,255,0.4);
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            padding: 1.25rem 1.5rem 0.5rem;
            font-weight: 600;
        }

        /* Main Content */
        .main-content {
            margin-left: 260px;
            min-height: 100vh;
        }

        /* Top Navbar */
        .top-navbar {
            background: #fff;
            padding: 0.75rem 2rem;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 999;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }
        .top-navbar .page-title { font-size: 1.1rem; font-weight: 600; color: #1f2937; }
        .top-navbar .user-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        .top-navbar .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--primary);
        }

        /* Content Area */
        .content-area { padding: 2rem; }

        /* Cards */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            transition: transform 0.2s;
        }
        .card:hover { transform: translateY(-2px); }
        .card-header {
            background: transparent;
            border-bottom: 1px solid #f0f0f0;
            font-weight: 600;
            padding: 1rem 1.25rem;
        }

        /* Stat Cards */
        .stat-card {
            border-radius: 16px;
            padding: 1.5rem;
            color: #fff;
            position: relative;
            overflow: hidden;
        }
        .stat-card::after {
            content: '';
            position: absolute;
            top: -20px;
            right: -20px;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: rgba(255,255,255,0.1);
        }
        .stat-card .stat-icon {
            font-size: 2.5rem;
            opacity: 0.8;
        }
        .stat-card .stat-number {
            font-size: 2rem;
            font-weight: 700;
            margin: 0.25rem 0;
        }
        .stat-card .stat-label {
            font-size: 0.85rem;
            opacity: 0.9;
        }

        /* Buttons */
        .btn-primary {
            background: var(--primary);
            border-color: var(--primary);
        }
        .btn-primary:hover {
            background: var(--primary-dark);
            border-color: var(--primary-dark);
        }
        .btn-outline-primary {
            color: var(--primary);
            border-color: var(--primary);
        }
        .btn-outline-primary:hover {
            background: var(--primary);
            border-color: var(--primary);
        }

        /* Table */
        .table th {
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            color: #6b7280;
            letter-spacing: 0.5px;
        }
        .table td { vertical-align: middle; }

        /* Badge */
        .badge-success {
            background: rgba(25,135,84,0.1);
            color: var(--primary);
            font-weight: 500;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); }
            .main-content { margin-left: 0; }
        }
    </style>
    @stack('styles')
</head>
<body>
    <!-- Sidebar -->
    <nav class="sidebar">
        <div class="brand">
            <h4><i class="bi bi-journal-richtext text-success"></i> Blog CMS</h4>
            <small>Panel Administrasi</small>
        </div>

        <div class="mt-3">
            <div class="nav-section">Menu Utama</div>
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="bi bi-grid-1x2-fill"></i> Dashboard
            </a>

            <div class="nav-section mt-3">Kelola Konten</div>
            <a href="{{ route('artikel.index') }}" class="nav-link {{ request()->routeIs('artikel.*') ? 'active' : '' }}">
                <i class="bi bi-file-earmark-text-fill"></i> Artikel
            </a>
            <a href="{{ route('kategori_artikel.index') }}" class="nav-link {{ request()->routeIs('kategori_artikel.*') ? 'active' : '' }}">
                <i class="bi bi-bookmark-fill"></i> Kategori
            </a>

            <div class="nav-section mt-3">Kelola Pengguna</div>
            <a href="{{ route('penulis.index') }}" class="nav-link {{ request()->routeIs('penulis.*') ? 'active' : '' }}">
                <i class="bi bi-people-fill"></i> Penulis
            </a>

            <div class="nav-section mt-3">Lainnya</div>
            <a href="{{ route('publik.index') }}" class="nav-link" target="_blank">
                <i class="bi bi-globe"></i> Lihat Website
            </a>
            <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-left"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navbar -->
        <div class="top-navbar">
            <div class="page-title">@yield('page-title', 'Dashboard')</div>
            <div class="user-info">
                <span class="text-muted" style="font-size: 0.9rem;">{{ Auth::user()->nama_lengkap ?? 'Admin' }}</span>
                @if(Auth::user() && Auth::user()->foto)
                    <img src="{{ asset('storage/foto/' . Auth::user()->foto) }}" alt="Avatar" class="user-avatar">
                @else
                    <div class="user-avatar bg-success d-flex align-items-center justify-content-center text-white" style="font-size:0.9rem; font-weight:600;">
                        {{ substr(Auth::user()->nama_lengkap ?? 'A', 0, 1) }}
                    </div>
                @endif
            </div>
        </div>

        <!-- Content -->
        <div class="content-area">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
