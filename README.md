# Sckips

Sckips is a Laravel 13 application with a Vue 3 and Inertia frontend. It uses Laravel Wayfinder to generate typed TypeScript helpers from the application's routes and controllers.

## Requirements

- PHP 8.3 or newer with the extensions required by Laravel
- Composer
- Node.js and npm

The checked-in `.env.example` uses SQLite, so a database server is not required for the default local setup.

## Local setup (Windows PowerShell)

From the project directory, run:

```powershell
composer install
if (-not (Test-Path .env)) { Copy-Item .env.example .env }
if (-not (Test-Path database/database.sqlite)) { New-Item -ItemType File -Path database/database.sqlite }
php artisan key:generate
php artisan migrate
npm ci
php artisan wayfinder:generate --with-form
npm run build
```

The Vite Wayfinder plugin also generates route and action types when the frontend starts or builds. The explicit generation command above surfaces Laravel-side generation errors before the frontend build.

To run the application locally, use the Composer development script:

```powershell
composer run dev
```

This starts the Laravel server, queue listener, and Vite development server. Keep the terminal open while developing.

## Useful checks

```powershell
npm run check
npm run types:check
composer run lint:check
composer run types:check
php artisan test
```

`npm run build` creates production frontend assets in `public/build`. Generated assets, local dependencies, environment files, the local SQLite database, and generated Wayfinder files are excluded from Git.
