# Company Website & Dashboard

**A public company website backed by a localised Laravel administration area.**

[Overview](#overview) · [Local setup](#local-setup) · [Code guide](#code-guide) · [Verification](#verification)

## Overview

A Laravel 10 application that pairs public company pages with a content-management dashboard. Administrators can manage services, features, companies, testimonials, settings, contact messages and subscribers.

## Features

- Public home, about, contact and service pages.
- Authenticated administration routes.
- Content management for services, features, companies and testimonials.
- Message and subscriber management.
- Locale-aware administration routing with Laravel Localization.

## Technology

| Layer | Stack |
| --- | --- |
| Backend | PHP `^8.1` · Laravel `^10.10` |
| Interface and tooling | Blade · Laravel Localization · Tailwind CSS · Vite 5 |
| Data | Eloquent ORM · MySQL in the supplied environment template |

Version constraints above come from [composer.json](composer.json) and [package.json](package.json). Use a PHP runtime compatible with `composer.lock`, Composer 2, and a Node.js/npm version compatible with the declared asset tooling. Enable the PHP extensions required by Composer and the selected database driver.

## Local setup

```bash
git clone https://github.com/Moelnabawy8/front-dash.git
cd front-dash
composer install
cp .env.example .env
php artisan key:generate
npm ci
```

Create an empty local MySQL database. Set `DB_DATABASE`, `DB_USERNAME` and `DB_PASSWORD` in your local `.env`; keep `DB_CONNECTION=mysql`. Set `APP_URL=http://127.0.0.1:8000`. For local mail inspection, set `MAIL_MAILER=log` instead of configuring a live mail provider.

```bash
php artisan migrate
php artisan storage:link
npm run build
php artisan serve
```

Open [the local application](http://127.0.0.1:8000/front/home). For asset hot reload, run `npm run dev` in a second terminal while the PHP server remains running.

## Application entry points

Public pages live under `/front`: `/front/home`, `/front/about`, `/front/contact` and `/front/service`. Administration routes use the configured locale prefix followed by `/admin`.

The default database seeder is empty. Additional content seeders are present in `database/seeders/`; review and run individual seeders only when local sample data is required.

## Code guide

| Path | Responsibility |
| --- | --- |
| [`routes/web.php`](routes/web.php) | Public pages and localised dashboard routes |
| [`app/Models/`](app/Models/) | Website content and contact entities |
| [`app/Http/Controllers/`](app/Http/Controllers/) | Front-end and administration controllers |
| [`resources/views/`](resources/views/) | Public and dashboard templates |

## Verification

Authentication and profile scaffolding tests are checked in. Content-management permissions and localisation should receive dedicated feature coverage.

Use an isolated testing database and review [phpunit.xml](phpunit.xml) before running the suite. Database-resetting tests must point to disposable data.

```bash
php artisan test
```

To check PHP formatting without modifying files:

```bash
./vendor/bin/pint --test
```

Build the front-end assets with `npm run build` after changing JavaScript, CSS or templates. Keep local configuration in `.env` and commit only configuration examples.
