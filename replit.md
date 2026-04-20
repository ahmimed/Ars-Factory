# ARS Factory — Laravel Website

## Overview
A bilingual (French/English) business website for ARS Factory, a renovation and interior design company based in Tanger, Morocco. Built with Laravel 12 + SQLite.

## Architecture

### Stack
- **Backend**: Laravel 12, PHP 8.2
- **Database**: SQLite (`database/database.sqlite`)
- **Frontend**: Blade templates, inline CSS (Inter + Cormorant Garamond fonts), vanilla JS
- **Storage**: Laravel `public` disk → `storage/app/public` → symlinked to `public/storage`

### Key Routes (`routes/web.php`)
| Route | Description |
|---|---|
| `/` | Redirects to `/fr` |
| `/{locale}/` | Home page |
| `/{locale}/about` | About page |
| `/{locale}/services` | Services page |
| `/{locale}/projects` | Projects gallery (images from DB) |
| `/{locale}/contact` | Contact form |
| `/language/{locale}` | Switch language (stores in session) |
| `/{locale}/admin/login` | Hidden admin login (not in navbar) |
| `/{locale}/admin/dashboard` | Admin dashboard (auth protected) |
| `/{locale}/admin/images` | POST: upload image |
| `/{locale}/admin/images/{image}` | DELETE: remove image |

### Views Structure
```
resources/views/
├── layouts/
│   └── app.blade.php        # Main layout shell (navbar, footer, CSS, JS)
├── pages/
│   ├── home.blade.php
│   ├── about.blade.php
│   ├── services.blade.php
│   ├── projects.blade.php
│   ├── contact.blade.php
│   └── partials/
│       ├── gallery.blade.php
│       └── why.blade.php
├── auth/
│   └── login.blade.php
└── admin/
    └── dashboard.blade.php
```

### Localization
- `lang/fr/site.php` — French translations (default)
- `lang/en/site.php` — English translations
- Switched via `/language/{locale}` route (stores in session, redirects back)
- `SetLocale` middleware reads route param and sets app locale
- Language switcher (FR | EN) is in the navbar on all pages
- All static text is fully translatable via `__('site.*')` keys

### Admin
- Login URL: `/{locale}/admin/login` (not shown in public navbar)
- Dashboard: image upload (JPG/PNG/WEBP, max 4MB) + delete
- Images stored in `storage/app/public/projects/` and served via `public/storage` symlink
- Admin credentials seeded from env: `ADMIN_EMAIL`, `ADMIN_NAME`, `ADMIN_PASSWORD`

### Features
- Multi-language support (FR/EN) with session-stored preference
- Admin authentication (Laravel session auth) with protected routes
- Guest middleware on login routes (redirects authenticated users away)
- Image gallery management (upload + delete)
- Flash messages (success/error) displayed above content
- Responsive design (mobile hamburger menu, grid breakpoints)
- Lightbox for gallery images
- Reveal animations (IntersectionObserver)
- Contact form with validation

## Development Setup
```bash
composer install --ignore-platform-reqs
# .env is configured for SQLite (DB_CONNECTION=sqlite)
php artisan key:generate
touch database/database.sqlite
php artisan migrate
php artisan db:seed
php artisan storage:link
php artisan serve --host=0.0.0.0 --port=5000
```

## Environment Variables
Set via Replit Secrets/Env:
- `APP_KEY` — Laravel encryption key (auto-generated)
- `DB_CONNECTION=sqlite`
- `DB_DATABASE=/home/runner/workspace/database/database.sqlite`
- `SESSION_DRIVER=file`
- `CACHE_STORE=file`
- `ADMIN_EMAIL` — Admin login email
- `ADMIN_NAME` — Admin display name
- `ADMIN_PASSWORD` — Admin password (secret)

## Workflow
- **Start application**: `php artisan serve --host=0.0.0.0 --port=5000` (port 5000, webview)
