<laravel-boost-guidelines>
# Aroma Rasa — Artisanal Patisserie (Laravel 13)

Etalase UMKM kue artisanal: guest checkout tanpa login (Identity-as-Order: nama + WA 10-13 digit + fulfillment), katalog + Live Oven + tracker AR-XXXX + admin kanban. Stack Laravel 13 / PHP 8.4 / Vite 8 / Tailwind 4 / SQLite (`database/database.sqlite`).

## Prerequisites

Verify PHP 8.3+, Composer 2+, and Node 24+ are available:

```sh
php -v
composer -V
node -v
```

If PHP/Composer are missing, install:

- macOS: `/bin/bash -c "$(curl -fsSL https://php.new/install/mac/8.5)"`
- Windows: `Set-ExecutionPolicy Bypass -Scope Process -Force; iex ((New-Object System.Net.WebClient).DownloadString('https://php.new/install/windows/8.5'))`
- Linux: `/bin/bash -c "$(curl -fsSL https://php.new/install/linux/8.5)"`

After installation, restart terminal; if agent needs restarted shell, ask user to reopen and rerun prompt.

## Agent Setup

Install Laravel Boost from application root before making application changes:

```sh
composer require laravel/boost --dev
php artisan boost:install
```

Boost replaces these bootstrap instructions with guidelines tailored to the application. After installation, read `AGENTS.md` again and continue with the user's original request using the generated guidelines.

## Development Commands

- Full Setup: `composer run setup` (composer install, .env copy, key:generate, migrate --force, npm install --ignore-scripts, vite build)
- Dev Vite: `npm run dev`  |  Dev App: `php artisan serve`
- Production Build: `npm run build` (reads `vite.config.js` input `resources/css/app.css` + `resources/js/app.js`)
- Migrate/Seed: `php artisan migrate --force` + `php artisan db:seed` (creates 4 categories, 6 products, order AR-8821, oven_status)
- Run Tests: `composer run test` (config:clear then `php artisan test`) or `php artisan test`
- Format: `./vendor/bin/pint`

## Project Structure & Conventions

- Routes: all in `routes/web.php` — SPA `GET /` → `view('aroma-rasa')` + JSON API `GET /api/products`, `GET /api/oven-status`, `POST /api/orders`, `GET /api/orders/{invoice}` (no `routes/api.php`). Legacy aliases `/catalog`, `/checkout`, `/order/track/{invoice}` kept.
- Models: `app/Models/` — `Category`, `Product`, `Order`, `OrderItem`, `OvenStatus`. Uses `protected $fillable` + `$casts` (decimal:2, array), relations `HasMany`/`BelongsTo`. `OvenStatus` requires `protected $table = 'oven_status'` (singular, not `oven_statuses`).
- Orders: Identity-as-Order, no auth. `Order::generateInvoiceNumber()` → `AR-ymd####` harian. `getWhatsAppPayload()` + `getWhatsAppUrl()` → `wa.me/6281234567890?text=[urlencode]` (JetBrains Mono di UI).
- Styles: Tailwind 4 via `@import "tailwindcss";` in `resources/css/app.css` with `@source` for pagination/views. `@theme --font-sans` Instrument Sans default; PRD tokens Playfair Display / Plus Jakarta Sans / JetBrains Mono di-override di view.
- Views: single SPA `resources/views/aroma-rasa.blade.php` (katalog + Live Oven + checkout modal + tracker + admin). `welcome.blade.php` legacy.
- Validation: `customer_phone` regex `^\d{10,13}$`, `fulfillment_method` pickup/delivery, delivery_fee Rp 20.000 hardcode.

## Pitfalls

- `oven_status` table singular — Eloquent tanpa `$table` akan query `oven_statuses` dan SQLSTATE no such table.
- `.npmrc` has `ignore-scripts=true` — `npm install` tidak run scripts; pakai `composer run setup` atau `npm install --ignore-scripts` manual.
- Superuser: `export COMPOSER_ALLOW_SUPERUSER=1` jika Composer warn root.
- DB SQLite default — file `database/database.sqlite` harus ada (`touch` di post-create-project-cmd); `DB_CONNECTION=sqlite`.
- `composer run test` clears config — jangan andalkan cache config antar run.
- PRD cut-off 14:00 WIB & kuota slot: belum ada enforcement di controller, perlu ditambah sebelum prod.
</laravel-boost-guidelines>
