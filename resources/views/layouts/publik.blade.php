<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta-description', 'Blog terkini dengan berbagai artikel menarik dari berbagai kategori.')">
    <title>@yield('title', 'Beranda') — Aplikasi Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #198754;
            --primary-light: #20a86a;
            --primary-dark: #146c43;
            --primary-glow: rgba(25, 135, 84, 0.15);
            --dark: #0f1117;
            --dark-soft: #1a1d25;
            --body-bg: #f8f9fc;
            --card-bg: #ffffff;
            --text-primary: #1f2937;
            --text-secondary: #6b7280;
            --border-color: #e5e7eb;
            --gradient-primary: linear-gradient(135deg, #198754 0%, #20c997 100%);
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.06);
            --shadow-md: 0 4px 16px rgba(0,0,0,0.08);
            --shadow-lg: 0 10px 40px rgba(0,0,0,0.12);
            --shadow-hover: 0 8px 30px rgba(25, 135, 84, 0.15);
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --radius-xl: 20px;
        }

        * {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            margin: 0;
            padding: 0;
        }

        body {
            background: var(--body-bg);
            color: var(--text-primary);
            line-height: 1.7;
            -webkit-font-smoothing: antialiased;
        }

        /* ===== NAVBAR ===== */
        .navbar-publik {
            background: var(--dark) !important;
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255,255,255,0.05);
            padding: 0;
            position: sticky;
            top: 0;
            z-index: 1030;
            transition: all 0.3s ease;
        }
        .navbar-publik .container { padding-top: 0.8rem; padding-bottom: 0.8rem; }
        .navbar-publik .navbar-brand {
            font-weight: 800;
            font-size: 1.35rem;
            color: #fff !important;
            display: flex;
            align-items: center;
            gap: 0.6rem;
            letter-spacing: -0.5px;
        }
        .navbar-publik .navbar-brand .brand-icon {
            width: 38px;
            height: 38px;
            background: var(--gradient-primary);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            box-shadow: 0 4px 15px rgba(25, 135, 84, 0.3);
        }
        .navbar-publik .nav-link {
            color: rgba(255,255,255,0.7) !important;
            font-weight: 500;
            font-size: 0.9rem;
            padding: 0.5rem 1rem !important;
            border-radius: var(--radius-sm);
            transition: all 0.25s ease;
            position: relative;
        }
        .navbar-publik .nav-link:hover,
        .navbar-publik .nav-link.active {
            color: #fff !important;
            background: rgba(255,255,255,0.08);
        }
        .navbar-publik .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 50%;
            transform: translateX(-50%);
            width: 20px;
            height: 3px;
            background: var(--primary);
            border-radius: 2px;
        }
        .navbar-toggler { border-color: rgba(255,255,255,0.2); }
        .navbar-toggler-icon { filter: invert(1); }

        /* ===== HERO SECTION ===== */
        .hero-section {
            background: var(--dark);
            padding: 3rem 0 4rem;
            position: relative;
            overflow: hidden;
        }
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(ellipse at 20% 50%, rgba(25, 135, 84, 0.15) 0%, transparent 50%),
                radial-gradient(ellipse at 80% 20%, rgba(32, 201, 151, 0.1) 0%, transparent 50%);
        }
        .hero-section .container { position: relative; z-index: 1; }
        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(25, 135, 84, 0.15);
            color: #20c997;
            padding: 0.4rem 1rem;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 1rem;
            border: 1px solid rgba(25, 135, 84, 0.2);
        }
        .hero-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: #fff;
            line-height: 1.2;
            letter-spacing: -1px;
            margin-bottom: 0.75rem;
        }
        .hero-subtitle {
            font-size: 1.1rem;
            color: rgba(255,255,255,0.6);
            max-width: 600px;
        }

        /* ===== ARTICLE CARD ===== */
        .article-card {
            background: var(--card-bg);
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border-color);
            transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            margin-bottom: 1.5rem;
        }
        .article-card:hover {
            box-shadow: var(--shadow-hover);
            transform: translateY(-4px);
            border-color: rgba(25, 135, 84, 0.2);
        }
        .article-card .card-img-wrapper {
            position: relative;
            overflow: hidden;
            height: 240px;
        }
        .article-card .card-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .article-card:hover .card-img-wrapper img {
            transform: scale(1.05);
        }
        .article-card .card-img-wrapper .category-badge {
            position: absolute;
            top: 1rem;
            left: 1rem;
            z-index: 2;
        }
        .category-badge .badge {
            background: var(--gradient-primary);
            color: #fff;
            font-weight: 600;
            font-size: 0.75rem;
            padding: 0.4rem 0.85rem;
            border-radius: 50px;
            box-shadow: 0 2px 8px rgba(25, 135, 84, 0.3);
            letter-spacing: 0.3px;
        }
        .article-card .card-body {
            padding: 1.5rem;
        }
        .article-card .card-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--text-primary);
            line-height: 1.4;
            margin-bottom: 0.75rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            transition: color 0.2s;
        }
        .article-card:hover .card-title { color: var(--primary); }
        .article-card .card-meta {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1rem;
            font-size: 0.85rem;
            color: var(--text-secondary);
        }
        .article-card .card-meta .author-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--primary-glow);
        }
        .article-card .card-meta .author-avatar-placeholder {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: var(--gradient-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 700;
            font-size: 0.8rem;
            flex-shrink: 0;
        }
        .article-card .card-text {
            color: var(--text-secondary);
            font-size: 0.92rem;
            line-height: 1.7;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            margin-bottom: 1.25rem;
        }
        .btn-read-more {
            background: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
            padding: 0.5rem 1.25rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.85rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }
        .btn-read-more:hover {
            background: var(--primary);
            color: #fff;
            transform: translateX(4px);
            box-shadow: 0 4px 15px rgba(25, 135, 84, 0.3);
        }
        .btn-read-more i { transition: transform 0.3s; }
        .btn-read-more:hover i { transform: translateX(4px); }

        /* ===== SIDEBAR ===== */
        .sidebar-widget {
            background: var(--card-bg);
            border-radius: var(--radius-lg);
            padding: 1.5rem;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border-color);
            position: sticky;
            top: 80px;
        }
        .widget-title {
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 1.25rem;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid var(--primary);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .widget-title i { color: var(--primary); }
        .category-list { list-style: none; padding: 0; margin: 0; }
        .category-list li { margin-bottom: 0.35rem; }
        .category-list a {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.65rem 1rem;
            border-radius: var(--radius-sm);
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.25s ease;
            border: 1px solid transparent;
        }
        .category-list a:hover {
            background: var(--primary-glow);
            color: var(--primary);
            border-color: rgba(25, 135, 84, 0.15);
        }
        .category-list a.active {
            background: var(--primary);
            color: #fff;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(25, 135, 84, 0.25);
        }
        .category-list a .count {
            background: rgba(0,0,0,0.06);
            padding: 0.15rem 0.6rem;
            border-radius: 50px;
            font-size: 0.78rem;
            font-weight: 600;
        }
        .category-list a.active .count {
            background: rgba(255,255,255,0.2);
            color: #fff;
        }

        /* ===== RELATED ARTICLE ===== */
        .related-article {
            display: flex;
            gap: 1rem;
            padding: 0.85rem 0;
            border-bottom: 1px solid var(--border-color);
            text-decoration: none;
            transition: all 0.2s;
        }
        .related-article:last-child { border-bottom: none; }
        .related-article:hover { transform: translateX(4px); }
        .related-article .thumbnail {
            width: 72px;
            height: 72px;
            border-radius: var(--radius-sm);
            object-fit: cover;
            flex-shrink: 0;
        }
        .related-article .related-title {
            font-size: 0.88rem;
            font-weight: 600;
            color: var(--text-primary);
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            margin-bottom: 0.35rem;
            transition: color 0.2s;
        }
        .related-article:hover .related-title { color: var(--primary); }
        .related-article .related-date {
            font-size: 0.78rem;
            color: var(--text-secondary);
        }

        /* ===== BREADCRUMB ===== */
        .breadcrumb-custom {
            background: transparent;
            padding: 0;
            margin-bottom: 1.5rem;
        }
        .breadcrumb-custom .breadcrumb-item a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
        }
        .breadcrumb-custom .breadcrumb-item.active {
            color: var(--text-secondary);
            font-size: 0.9rem;
        }

        /* ===== DETAIL ARTICLE ===== */
        .detail-header-img {
            width: 100%;
            max-height: 450px;
            object-fit: cover;
            border-radius: var(--radius-lg);
            margin-bottom: 1.5rem;
            box-shadow: var(--shadow-md);
        }
        .detail-title {
            font-size: 2rem;
            font-weight: 800;
            line-height: 1.3;
            color: var(--text-primary);
            letter-spacing: -0.5px;
            margin-bottom: 1rem;
        }
        .detail-meta {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem 0;
            border-top: 1px solid var(--border-color);
            border-bottom: 1px solid var(--border-color);
            margin-bottom: 2rem;
        }
        .detail-meta .author-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--primary-glow);
        }
        .detail-meta .author-avatar-placeholder {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: var(--gradient-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 700;
            font-size: 1.1rem;
            flex-shrink: 0;
        }
        .detail-content {
            font-size: 1.05rem;
            line-height: 1.9;
            color: #374151;
        }
        .detail-content p { margin-bottom: 1.5rem; }
        .detail-content img {
            max-width: 100%;
            border-radius: var(--radius-md);
            margin: 1rem 0;
        }

        /* ===== FOOTER ===== */
        .footer-publik {
            background: var(--dark);
            color: rgba(255,255,255,0.6);
            padding: 2.5rem 0;
            margin-top: 4rem;
        }
        .footer-publik .footer-brand {
            font-weight: 700;
            font-size: 1.2rem;
            color: #fff;
            margin-bottom: 0.5rem;
        }
        .footer-publik a {
            color: rgba(255,255,255,0.6);
            text-decoration: none;
            transition: color 0.2s;
        }
        .footer-publik a:hover { color: var(--primary-light); }
        .footer-divider {
            border-top: 1px solid rgba(255,255,255,0.08);
            margin: 1.5rem 0;
        }

        /* ===== EMPTY STATE ===== */
        .empty-state {
            text-align: center;
            padding: 3rem 1rem;
        }
        .empty-state i { font-size: 4rem; color: #d1d5db; margin-bottom: 1rem; }
        .empty-state h5 { color: var(--text-secondary); font-weight: 600; }
        .empty-state p { color: #9ca3af; }

        /* ===== ANIMATIONS ===== */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-fadeInUp {
            animation: fadeInUp 0.5s ease forwards;
        }
        .article-card:nth-child(1) { animation-delay: 0.05s; }
        .article-card:nth-child(2) { animation-delay: 0.1s; }
        .article-card:nth-child(3) { animation-delay: 0.15s; }
        .article-card:nth-child(4) { animation-delay: 0.2s; }
        .article-card:nth-child(5) { animation-delay: 0.25s; }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .hero-title { font-size: 1.75rem; }
            .hero-subtitle { font-size: 1rem; }
            .detail-title { font-size: 1.5rem; }
            .sidebar-widget { position: static; margin-top: 2rem; }
        }
    </style>
    @stack('styles')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-publik">
        <div class="container">
            <a class="navbar-brand" href="{{ route('publik.index') }}">
                <span class="brand-icon"><i class="bi bi-journal-richtext"></i></span>
                Aplikasi Blog
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarPublik">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarPublik">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('publik.index') && !request()->query('kategori') ? 'active' : '' }}" href="{{ route('publik.index') }}">
                            <i class="bi bi-house-fill me-1"></i> Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('publik.index') }}#artikel">
                            <i class="bi bi-file-earmark-text me-1"></i> Artikel
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('publik.index') }}#kategori">
                            <i class="bi bi-bookmark me-1"></i> Kategori
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-info-circle me-1"></i> Tentang
                        </a>
                    </li>
                    @auth
                    <li class="nav-item ms-lg-2">
                        <a class="nav-link" href="{{ route('dashboard') }}" style="color: var(--primary-light) !important;">
                            <i class="bi bi-speedometer2 me-1"></i> Dashboard
                        </a>
                    </li>
                    @else
                    <li class="nav-item ms-lg-2">
                        <a class="nav-link" href="{{ route('login') }}" style="color: var(--primary-light) !important;">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Login
                        </a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    @yield('content')

    <!-- Footer -->
    <footer class="footer-publik">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="footer-brand"><i class="bi bi-journal-richtext text-success me-2"></i>Aplikasi Blog</div>
                    <p class="mb-0" style="font-size: 0.9rem;">Platform blog modern untuk berbagi artikel dan pengetahuan.</p>
                </div>
                <div class="col-md-3">
                    <h6 class="text-white mb-3" style="font-weight: 600;">Navigasi</h6>
                    <ul class="list-unstyled" style="font-size: 0.9rem;">
                        <li class="mb-2"><a href="{{ route('publik.index') }}"><i class="bi bi-chevron-right me-1"></i>Beranda</a></li>
                        <li class="mb-2"><a href="{{ route('publik.index') }}#artikel"><i class="bi bi-chevron-right me-1"></i>Artikel</a></li>
                        <li class="mb-2"><a href="{{ route('publik.index') }}#kategori"><i class="bi bi-chevron-right me-1"></i>Kategori</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h6 class="text-white mb-3" style="font-weight: 600;">Kontak</h6>
                    <ul class="list-unstyled" style="font-size: 0.9rem;">
                        <li class="mb-2"><i class="bi bi-envelope me-2"></i>admin@blog.com</li>
                        <li class="mb-2"><i class="bi bi-geo-alt me-2"></i>Indonesia</li>
                    </ul>
                </div>
            </div>
            <div class="footer-divider"></div>
            <div class="text-center" style="font-size: 0.85rem;">
                &copy; {{ date('Y') }} Aplikasi Blog. Dibuat dengan <i class="bi bi-heart-fill text-danger"></i> untuk UAS Pemrograman Web.
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
