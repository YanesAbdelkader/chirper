# chirper

A small Laravel application that demonstrates a "chirps" (short messages) feed with basic authentication and authorization. This repo is a lightweight example app built on Laravel 12 and PHP 8.2 used for learning and demos.

## What this project includes

-   Laravel 12 skeleton (PHP 8.2+)
-   A `Chirp` model and migrations for a short message feed (`database/migrations/2025_10_04_170600_create_chirps_table.php`)
-   Simple auth (register, login, logout) and policies for editing/deleting chirps
-   Frontend using Blade views in `resources/views` and a small JS/CSS bundle built by Vite

## Requirements

-   PHP ^8.2
-   Composer
-   Node.js (for building frontend assets)
-   SQLite (the project includes a `database/database.sqlite` created by composer scripts)

## Quick start (local)

1. Clone the repository and install PHP dependencies:

```powershell
cd c:\Code\example-app
composer install
```

2. Copy environment and generate app key (composer's post-create hooks may already do this):

```powershell
copy .env.example .env; php artisan key:generate
```

3. Ensure the SQLite database file exists (composer's post-create hooks may create it):

```powershell
if (-not (Test-Path database\database.sqlite)) { New-Item database\database.sqlite -ItemType File }
php artisan migrate --seed
```

4. Install JS dependencies and build assets for development:

```powershell
npm install
npm run dev
```

5. Start the local server:

```powershell
php artisan serve
```

Open http://127.0.0.1:8000 in your browser. The home page shows a feed of chirps and links to register/login.

## Routes & usage

-   GET / — chirps feed (home)
-   POST /chirps — create a new chirp (requires auth)
-   GET /chirps/{chirp}/edit — edit form (requires auth + policy)
-   PUT /chirps/{chirp} — update chirp (requires auth + policy)
-   DELETE /chirps/{chirp} — delete chirp (requires auth + policy)
-   GET /login, POST /login — login
-   GET /register, POST /register — register

The routes are defined in `routes/web.php`.

## Testing

Run the test suite with PHPUnit (included via composer):

```powershell
composer test
```

There are example feature/unit tests in `tests/`.

## Development notes

-   The project uses Vite (see `vite.config.js`) for frontend bundling. Use `npm run build` for production bundles.
-   There is a simple policy `App\Policies\ChirpPolicy` that controls edit/delete permissions — review the policy to understand authorization rules.
-   Seeders are in `database/seeders/` (including `ChirpSeeder.php`) to populate sample data.

## Troubleshooting

-   If migrations fail, check that `database/database.sqlite` exists and is writable.
-   If you see a 500 error, check `storage/logs/laravel.log` for details.

## Contributing

Contributions are welcome. For small fixes, open a PR with tests where appropriate. Keep changes focused and include a short description.

## License

This project uses the MIT license. See the top-level `LICENSE` or `composer.json` for license metadata.

## Contact / Author

Repository: YanesAbdelkader/chirper
This README was generated to summarize the project and provide local setup steps.
