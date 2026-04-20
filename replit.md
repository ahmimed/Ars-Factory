# ARS Factory — Laravel Website

## Overview
A bilingual (French/English) business website for ARS Factory, a renovation and interior design company based in Tanger, Morocco. Built with Laravel 11 + SQLite.

## Architecture

### Stack
- **Backend**: Laravel 11, PHP 8.2 (with `--ignore-platform-reqs`)
- **Database**: SQLite (`database/database.sqlite`)
- **Frontend**: Blade templates, inline CSS, vanilla JS
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
- `lang/fr/site.php` — French translations
- `lang/en/site.php` — English translations
- Switched via `/language/{locale}` route (stores in session)
- `SetLocale` middleware reads session and sets app locale

### Admin
- Login URL: `/{locale}/admin/login` (not shown in public navbar)
- Dashboard: image upload (JPG/PNG/WEBP, max 4MB) + delete
- Images stored in `storage/app/public/` and served via `public/storage` symlink

## Development Setup
```bash
composer install --ignore-platform-reqs
cp .env.example .env
php artisan key:generate
php artisan storage:link
php artisan migrate
php artisan serve --host=0.0.0.0 --port=5000
```

## Workflow
- **Start application**: `php artisan serve --host=0.0.0.0 --port=5000` (port 5000, webview)
