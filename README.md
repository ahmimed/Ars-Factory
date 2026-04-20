# ARS Factory Laravel Website

Modern Laravel website for ARS Factory with public pages, multilingual French/English content, admin authentication, and dynamic project image management.

## Features

- Home, About, Services, Projects/Gallery, Contact pages
- Admin login and dashboard
- Upload/delete project images
- Images stored in `storage/app/public/projects` and referenced in the `images` database table
- Dynamic public gallery with masonry layout, hover effects, lazy loading, and lightbox
- Laravel localization for French and English
- Basic SEO meta tags
- Responsive modern design

## Local setup

```bash
cd artifacts/ars-factory
composer install
cp .env.example .env
php artisan key:generate
```

Create a MySQL database:

```sql
CREATE DATABASE ars_factory CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

Update `.env` if your MySQL credentials differ:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ars_factory
DB_USERNAME=root
DB_PASSWORD=
```

Create the admin user and tables:

```bash
php artisan migrate --seed
php artisan storage:link
php artisan serve
```

Open:

- Website: `http://127.0.0.1:8000/fr`
- English: `http://127.0.0.1:8000/en`
- Admin login: `http://127.0.0.1:8000/fr/admin/login`

Default admin credentials from `.env.example`:

```text
Email: admin@arsfactory.com
Password: password
```

Change `ADMIN_EMAIL` and `ADMIN_PASSWORD` in `.env`, then run:

```bash
php artisan db:seed
```