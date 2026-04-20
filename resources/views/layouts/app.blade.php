<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', __('site.meta.home_title'))</title>
    <meta name="description" content="@yield('description', __('site.meta.home_description'))">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
            --gold: #d4af37;
            --dark: #0a0a0a;
            --text: #1a1a2e;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #fff;
            color: var(--text);
            line-height: 1.6;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, .logo { font-family: 'Cormorant Garamond', serif; }

        /* ── Navbar ── */
        .navbar {
            position: fixed;
            top: 0; left: 0; width: 100%;
            background: rgba(0,0,0,0.96);
            backdrop-filter: blur(10px);
            z-index: 1000;
            padding: 1rem 5%;
            transition: padding .3s;
        }
        .navbar.scrolled { padding: .7rem 5%; }
        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: #fff;
            text-decoration: none;
            letter-spacing: 1px;
        }
        .logo span { color: var(--gold); }
        .nav-links { display: flex; gap: 2.5rem; align-items: center; }
        .nav-links a {
            color: #fff;
            text-decoration: none;
            font-size: .85rem;
            font-weight: 500;
            letter-spacing: 1px;
            transition: color .3s;
            position: relative;
        }
        .nav-links a:hover { color: var(--gold); }
        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px; left: 0;
            width: 0; height: 2px;
            background: var(--gold);
            transition: width .3s;
        }
        .nav-links a:hover::after,
        .nav-links a.active::after { width: 100%; }
        .nav-links a.active { color: var(--gold); }
        .menu-toggle { display: none; font-size: 1.8rem; color: #fff; cursor: pointer; }

        /* ── Buttons ── */
        .btn {
            padding: .9rem 2.2rem;
            font-weight: 600;
            text-decoration: none;
            border-radius: 40px;
            transition: all .3s;
            font-size: .88rem;
            letter-spacing: 1px;
            display: inline-block;
            cursor: pointer;
            border: none;
            font-family: 'Inter', sans-serif;
        }
        .btn.primary { background: var(--gold); color: #000; }
        .btn.primary:hover { background: #e6c454; transform: translateY(-3px); box-shadow: 0 10px 20px rgba(0,0,0,.2); }
        .btn.ghost { border: 1px solid #fff; color: #fff; background: transparent; }
        .btn.ghost:hover { background: #fff; color: #000; transform: translateY(-3px); }

        /* ── Common ── */
        .section {
            padding: 100px 5%;
            max-width: 1400px;
            margin: 0 auto;
        }
        .eyebrow {
            font-size: .78rem;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 1rem;
            display: block;
        }
        h2.section-title {
            font-size: 2.8rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        .section-subtitle {
            color: #666;
            max-width: 680px;
            margin: 0 auto 3rem;
            font-size: 1.05rem;
            text-align: center;
        }
        .gold-accent { color: var(--gold); }

        /* ── Hero (home) ── */
        .hero {
            min-height: 100vh;
            background: linear-gradient(rgba(0,0,0,.65), rgba(0,0,0,.65)),
                        url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80') center/cover no-repeat fixed;
            display: flex;
            align-items: center;
            color: #fff;
            padding: 120px 5% 80px;
            gap: 4rem;
            max-width: 100%;
        }
        .hero-content { max-width: 600px; }
        .hero-content .eyebrow { color: var(--gold); }
        .hero-content h1 { font-size: 4.5rem; line-height: 1.15; margin-bottom: 1.5rem; }
        .hero-content p { font-size: 1.1rem; margin-bottom: 2rem; opacity: .9; }
        .hero-actions { display: flex; gap: 1.2rem; flex-wrap: wrap; }
        .hero-card {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            flex-shrink: 0;
        }
        .material-card {
            padding: 1.5rem 2rem;
            border-radius: 16px;
            min-width: 180px;
        }
        .material-card span { font-size: 2rem; font-family: 'Cormorant Garamond', serif; display: block; }
        .material-card strong { font-size: .85rem; letter-spacing: 1px; }
        .dark-card { background: rgba(255,255,255,.08); color: #fff; }
        .gold-card { background: var(--gold); color: #000; }
        .light-card { background: #fff; color: var(--text); }

        /* ── Page hero (inner pages) ── */
        .page-hero {
            padding-top: 160px !important;
            text-align: center;
        }
        .page-hero h1 { font-size: 3.5rem; margin-bottom: 1rem; }
        .page-hero p { color: #555; max-width: 640px; margin: 0 auto 2rem; font-size: 1.05rem; }

        /* ── Split section ── */
        .split {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: start;
        }
        .split h2 { font-size: 2.5rem; }
        .split p { color: #555; font-size: 1.05rem; }

        /* ── Info grid (about) ── */
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 5% 100px;
        }
        .info-card {
            background: #f8f9fa;
            border-radius: 16px;
            padding: 2.5rem;
            border-left: 4px solid var(--gold);
        }
        .info-card span { font-size: .75rem; letter-spacing: 3px; text-transform: uppercase; color: var(--gold); display: block; margin-bottom: .8rem; }
        .info-card h2 { font-size: 1.8rem; margin-bottom: 1rem; }
        .info-card p { color: #555; line-height: 1.7; }

        /* ── Why section ── */
        .why-section {
            background: #f0f2f5;
            border-radius: 24px;
            margin: 0 5% 80px;
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 3rem;
            align-items: center;
            max-width: calc(1400px - 10%);
            margin-left: auto;
            margin-right: auto;
            padding: 3rem !important;
        }
        .why-section h2 { font-size: 2.2rem; }
        .why-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; }
        .why-grid article { display: flex; align-items: center; gap: 1rem; }
        .why-grid span {
            width: 10px; height: 10px;
            background: var(--gold);
            border-radius: 50%;
            flex-shrink: 0;
        }
        .why-grid strong { font-size: .95rem; }

        /* ── Services grid ── */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 2rem;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 5% 100px;
        }
        .service-card {
            background: #f8f9fa;
            border-radius: 16px;
            padding: 2.5rem 2rem;
            border-bottom: 3px solid transparent;
            transition: all .3s;
        }
        .service-card:hover { transform: translateY(-8px); border-bottom-color: var(--gold); box-shadow: 0 20px 30px rgba(0,0,0,.05); }
        .service-card span { font-size: 2.5rem; font-family: 'Cormorant Garamond', serif; color: var(--gold); display: block; margin-bottom: 1rem; }
        .service-card h2 { font-size: 1.5rem; margin-bottom: .8rem; }
        .service-card p { color: #666; font-size: .95rem; }

        /* ── Gallery ── */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            grid-auto-rows: 260px;
            gap: 1.2rem;
        }
        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 12px;
            cursor: pointer;
            border: none;
            background: #eee;
            padding: 0;
        }
        .gallery-item img { width: 100%; height: 100%; object-fit: cover; transition: transform .5s; }
        .gallery-item:hover img { transform: scale(1.07); }
        .gallery-item span {
            position: absolute;
            bottom: 0; left: 0; right: 0;
            padding: 1.2rem;
            background: linear-gradient(transparent, rgba(0,0,0,.75));
            color: #fff;
            font-size: .85rem;
            transform: translateY(100%);
            transition: transform .3s;
        }
        .gallery-item:hover span { transform: translateY(0); }
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: #999;
            background: #f8f9fa;
            border-radius: 16px;
            font-size: 1rem;
        }

        /* ── Contact ── */
        .contact-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 5% 80px;
        }
        .contact-form { display: flex; flex-direction: column; gap: 1.2rem; }
        .contact-form label { display: flex; flex-direction: column; gap: .4rem; font-size: .9rem; font-weight: 500; }
        .contact-form input,
        .contact-form textarea {
            padding: .9rem 1rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            transition: border-color .2s;
        }
        .contact-form input:focus,
        .contact-form textarea:focus { outline: none; border-color: var(--gold); }
        .contact-form textarea { resize: vertical; }
        .contact-form small { color: #c00; font-size: .8rem; }
        .contact-card {
            background: #f8f9fa;
            border-radius: 16px;
            padding: 2.5rem;
            display: flex;
            flex-direction: column;
            gap: 1.8rem;
        }
        .contact-card span { font-size: .75rem; letter-spacing: 2px; text-transform: uppercase; color: var(--gold); display: block; margin-bottom: .3rem; }
        .contact-card a { color: var(--text); text-decoration: none; }
        .contact-card a:hover { color: var(--gold); }
        .map-section { height: 340px; }
        .map-section iframe { width: 100%; height: 100%; border: 0; display: block; }

        /* ── Auth ── */
        .auth-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding-top: 80px !important;
        }
        .auth-card {
            background: #fff;
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 20px 60px rgba(0,0,0,.1);
            width: 100%;
            max-width: 440px;
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
        }
        .auth-card h1 { font-size: 2rem; }
        .auth-card label { display: flex; flex-direction: column; gap: .4rem; font-size: .9rem; font-weight: 500; }
        .auth-card input {
            padding: .9rem 1rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
        }
        .auth-card input:focus { outline: none; border-color: var(--gold); }
        .checkbox-label { flex-direction: row !important; align-items: center; gap: .6rem !important; }
        .form-errors { background: #fff2f2; border: 1px solid #fcc; border-radius: 8px; padding: 1rem; }
        .form-errors p { color: #c00; font-size: .88rem; }

        /* ── Admin ── */
        .admin-layout {
            display: grid;
            grid-template-columns: 340px 1fr;
            gap: 3rem;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 5% 100px;
        }
        .upload-card {
            background: #f8f9fa;
            border-radius: 16px;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
            height: fit-content;
        }
        .upload-card label { display: flex; flex-direction: column; gap: .5rem; font-size: .9rem; font-weight: 500; }
        .upload-card input[type="file"] { font-size: .85rem; }
        .upload-card small { color: #888; font-size: .78rem; }
        .admin-gallery h2 { font-size: 1.6rem; margin-bottom: 1.5rem; }
        .admin-image-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1rem;
        }
        .admin-image-grid article { position: relative; border-radius: 12px; overflow: hidden; background: #eee; aspect-ratio: 1; }
        .admin-image-grid img { width: 100%; height: 100%; object-fit: cover; display: block; }
        .admin-image-grid form {
            position: absolute;
            top: .5rem; right: .5rem;
        }
        .admin-image-grid button {
            background: rgba(0,0,0,.7);
            color: #fff;
            border: none;
            padding: .35rem .7rem;
            border-radius: 6px;
            font-size: .75rem;
            cursor: pointer;
            transition: background .2s;
        }
        .admin-image-grid button:hover { background: #c00; }

        /* ── Section heading ── */
        .section-heading { display: flex; flex-direction: column; align-items: flex-start; margin-bottom: 2rem; gap: .5rem; }
        .section-heading h2 { font-size: 2.5rem; }
        .section-heading a { color: var(--gold); font-size: .85rem; letter-spacing: 1px; text-decoration: underline; }

        /* ── CTA band ── */
        .cta-band {
            background: linear-gradient(rgba(0,0,0,.82),rgba(0,0,0,.82)),
                        url('https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80') center/cover fixed;
            padding: 100px 5%;
            text-align: center;
            color: #fff;
        }
        .cta-band h2 { font-size: 3rem; margin-bottom: 1rem; }
        .cta-band p { margin-bottom: 2rem; opacity: .85; }

        /* ── Footer ── */
        .footer {
            background: var(--dark);
            color: #aaa;
            padding: 3rem 5% 1rem;
        }
        .footer-content {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 2rem;
            max-width: 1400px;
            margin: 0 auto;
        }
        .footer-logo { font-size: 1.8rem; font-weight: 700; font-family: 'Cormorant Garamond', serif; }
        .footer-links a { color: #aaa; text-decoration: none; margin-right: 1.5rem; transition: color .3s; }
        .footer-links a:hover { color: var(--gold); }
        .social a { color: #aaa; font-size: 1.3rem; margin-left: 1rem; transition: color .3s; }
        .social a:hover { color: var(--gold); }
        .copyright { text-align: center; padding-top: 2rem; margin-top: 2rem; border-top: 1px solid #222; font-size: .8rem; }

        /* ── Lightbox ── */
        .lightbox {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,.95);
            z-index: 1100;
            justify-content: center;
            align-items: center;
        }
        .lightbox.active { display: flex; }
        .lightbox img { max-width: 90%; max-height: 90%; object-fit: contain; }
        .close-lightbox { position: absolute; top: 20px; right: 30px; color: #fff; font-size: 3rem; cursor: pointer; line-height: 1; }

        /* ── Reveal animation ── */
        .reveal {
            opacity: 0;
            transform: translateY(28px);
            transition: opacity .7s ease, transform .7s ease;
        }
        .reveal.visible { opacity: 1; transform: translateY(0); }

        /* ── Flash messages ── */
        .flash {
            max-width: 1400px;
            margin: 90px auto 0;
            padding: 1rem 5%;
        }
        .flash-success, .flash-error {
            padding: .9rem 1.4rem;
            border-radius: 8px;
            font-size: .9rem;
        }
        .flash-success { background: #e6f9ee; color: #1a6b3c; border: 1px solid #b2e4c9; }
        .flash-error   { background: #fff2f2; color: #c00;    border: 1px solid #fcc; }

        /* ── Language switcher ── */
        .lang-switch { display: flex; gap: .6rem; align-items: center; }
        .lang-switch a {
            font-size: .75rem;
            letter-spacing: 1px;
            color: #aaa;
            text-decoration: none;
            padding: .2rem .5rem;
            border-radius: 4px;
            transition: all .2s;
        }
        .lang-switch a:hover,
        .lang-switch a.active { color: var(--gold); }

        /* ── Responsive ── */
        @media (max-width: 992px) {
            .hero { flex-direction: column; text-align: center; }
            .hero-card { flex-direction: row; }
            .hero-actions { justify-content: center; }
            .split, .info-grid, .contact-layout, .admin-layout { grid-template-columns: 1fr; }
            .why-section { grid-template-columns: 1fr; }
            .why-grid { grid-template-columns: 1fr; }
            .navbar .nav-links {
                position: fixed;
                top: 70px; left: -100%;
                width: 100%;
                height: calc(100vh - 70px);
                background: #000;
                flex-direction: column;
                padding: 2rem;
                transition: left .3s;
                gap: 1.5rem;
            }
            .navbar .nav-links.active { left: 0; }
            .menu-toggle { display: block; }
            .admin-layout { grid-template-columns: 1fr; }
        }
        @media (max-width: 768px) {
            .hero-content h1 { font-size: 3rem; }
            .hero-card { flex-direction: column; align-items: center; }
            .info-grid, .services-grid { padding: 0 5% 60px; }
            .page-hero h1 { font-size: 2.5rem; }
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar" id="navbar">
    <div class="nav-container">
        <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="logo"><span>ARS</span> Factory</a>
        <div class="menu-toggle" id="menuToggle"><i class="fas fa-bars"></i></div>
        <div class="nav-links" id="navLinks">
            <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">{{ strtoupper(__('site.nav.home')) }}</a>
            <a href="{{ route('about', ['locale' => app()->getLocale()]) }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">{{ strtoupper(__('site.nav.about')) }}</a>
            <a href="{{ route('services', ['locale' => app()->getLocale()]) }}" class="{{ request()->routeIs('services') ? 'active' : '' }}">{{ strtoupper(__('site.nav.services')) }}</a>
            <a href="{{ route('projects', ['locale' => app()->getLocale()]) }}" class="{{ request()->routeIs('projects') ? 'active' : '' }}">{{ strtoupper(__('site.nav.projects')) }}</a>
            <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">{{ strtoupper(__('site.nav.contact')) }}</a>
            <div class="lang-switch">
                <a href="{{ url('/language/fr') }}" class="{{ app()->getLocale() === 'fr' ? 'active' : '' }}">FR</a>
                <span style="color:#444;">|</span>
                <a href="{{ url('/language/en') }}" class="{{ app()->getLocale() === 'en' ? 'active' : '' }}">EN</a>
            </div>
        </div>
    </div>
</nav>

<!-- Flash messages -->
@if (session('success'))
    <div class="flash"><div class="flash-success">{{ session('success') }}</div></div>
@elseif (session('error'))
    <div class="flash"><div class="flash-error">{{ session('error') }}</div></div>
@endif

<!-- Page content -->
@yield('content')

<!-- Footer -->
<footer class="footer">
    <div class="footer-content">
        <div>
            <div class="footer-logo"><span style="color:var(--gold);">ARS</span> Factory</div>
            <p style="margin-top:.6rem;font-size:.9rem;">{!! nl2br(e(__('site.footer.tagline'))) !!}</p>
        </div>
        <div class="footer-links">
            <a href="{{ route('home', ['locale' => app()->getLocale()]) }}">{{ __('site.nav.home') }}</a>
            <a href="{{ route('about', ['locale' => app()->getLocale()]) }}">{{ __('site.nav.about') }}</a>
            <a href="{{ route('services', ['locale' => app()->getLocale()]) }}">{{ __('site.nav.services') }}</a>
            <a href="{{ route('projects', ['locale' => app()->getLocale()]) }}">{{ __('site.nav.projects') }}</a>
            <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}">{{ __('site.nav.contact') }}</a>
        </div>
        <div class="social">
            <a href="https://www.instagram.com/arsgroupe75" target="_blank" rel="noopener"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
        </div>
    </div>
    <div class="copyright">{{ __('site.footer.copyright', ['year' => date('Y')]) }}</div>
</footer>

<!-- Lightbox -->
<div id="lightbox" class="lightbox">
    <span class="close-lightbox" id="closeLightbox">&times;</span>
    <img id="lightboxImg" src="" alt="">
</div>

<script>
    // Navbar scroll
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
        navbar.classList.toggle('scrolled', window.scrollY > 60);
    });

    // Mobile menu
    const menuToggle = document.getElementById('menuToggle');
    const navLinks   = document.getElementById('navLinks');
    menuToggle.addEventListener('click', () => navLinks.classList.toggle('active'));

    // Reveal on scroll
    const reveals = document.querySelectorAll('.reveal');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); observer.unobserve(e.target); } });
    }, { threshold: 0.12 });
    reveals.forEach(el => observer.observe(el));

    // Lightbox
    const lightbox    = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightboxImg');
    const closeLb     = document.getElementById('closeLightbox');

    document.addEventListener('click', (e) => {
        const item = e.target.closest('[data-lightbox-src]');
        if (item) {
            lightboxImg.src = item.dataset.lightboxSrc;
            lightbox.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    });
    function closeLightbox() {
        lightbox.classList.remove('active');
        lightboxImg.src = '';
        document.body.style.overflow = '';
    }
    closeLb.addEventListener('click', closeLightbox);
    lightbox.addEventListener('click', (e) => { if (e.target === lightbox) closeLightbox(); });
    document.addEventListener('keydown', (e) => { if (e.key === 'Escape') closeLightbox(); });
</script>

</body>
</html>
