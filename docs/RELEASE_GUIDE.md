# Yemen Diabetes Association Website Release Guide

This document walks through preparing a new release of the Yemen Diabetes Association website, deploying it, and operating the bilingual CMS that powers the public-facing content.

## 1. Pre-release checklist

1. **Update application dependencies**
   - Install PHP dependencies with Composer:
     ```bash
     composer install --no-interaction --prefer-dist
     composer update --with-all-dependencies
     ```
   - Install Node dependencies and compile production assets:
     ```bash
     npm install
     npm run build
     ```
   - Commit the refreshed `composer.lock`, `package-lock.json`, and build artifacts.
2. **Run automated checks**
   - Ensure the codebase passes the full test suite: `php artisan test`.
   - Run static analysis/linters if enabled (e.g. `./vendor/bin/pint`).
3. **Verify environment configuration**
   - Confirm environment variables in `.env` are aligned with the target environment (database, cache, queue, mailer, Stripe, and reCAPTCHA credentials).
   - Ensure the `APP_URL`, `APP_LOCALE`, and `APP_FALLBACK_LOCALE` values reflect the deployment domain and default language.
4. **Review content**
   - Using the CMS (see below), review all Content Blocks in both English and Arabic to confirm up-to-date copy, imagery, and links.
   - Disable any blocks that should not be visible in the upcoming release.

## 2. Deployment steps

> The project is a standard Laravel 10 application. Adjust steps to match your hosting provider (Forge, Vapor, shared hosting, etc.).

1. **Prepare the build artifact**
   - Push the latest code to the main branch.
   - Tag the release (e.g. `git tag v1.2.0 && git push origin v1.2.0`).
2. **Server synchronization**
   - Pull the new tag or branch on the server.
   - Install PHP dependencies in production mode: `composer install --no-dev --optimize-autoloader`.
   - Install Node dependencies if assets are built on the server, or upload the compiled `public/build` directory when using CI-built assets.
3. **Database and storage**
   - Run migrations: `php artisan migrate --force`.
   - Seed or refresh CMS content if required: `php artisan db:seed --class=ContentBlockSeeder --force`.
   - Ensure the `storage` and `bootstrap/cache` directories are writable by the web server.
4. **Optimize the framework**
   - Cache configuration and routes: 
     ```bash
     php artisan config:cache
     php artisan route:cache
     php artisan view:cache
     ```
   - Warm the content block cache: `php artisan tinker --execute="\\App\\Models\\ContentBlock::all();"`.
5. **Restart services**
   - Restart PHP-FPM / queue workers / Horizon as required by your hosting stack.
6. **Smoke test**
   - Visit the public site in both English and Arabic.
   - Verify key flows: navigation, contact form submission, locale switching, and CMS authentication.

## 3. CMS operations

The CMS is designed to let administrators manage bilingual content without touching code.

### 3.1 Accessing the dashboard

1. Navigate to `/login` and authenticate with your administrator credentials.
2. Use the sidebar menu entry **Content Blocks** to access the CMS module.

### 3.2 Managing content blocks

Content is organized by *sections* (e.g., hero, programs, partners). Each block can hold English and Arabic copy, imagery, and optional metadata (icons, phone numbers, etc.).

- **Editing**: Click the **Edit** action for a block, update the English and Arabic fields, and press **Save Block**. Images can be uploaded per block and stored in `storage/app/public/content-blocks`.
- **Visibility**: Toggle the **Active** checkbox to show or hide a block on the public site.
- **Metadata**: Use the metadata inputs for structured data (contact info, map URLs, statistics). These values feed specific UI components on the homepage.

### 3.3 Localization behavior

- The CMS stores content in parallel English (`*_en`) and Arabic (`*_ar`) columns.
- The public site automatically serves the appropriate language based on the current locale. If an Arabic field is empty, the English fallback will be used to avoid blank sections.
- Locale switching is handled via the header language toggle, which persists in the session.

### 3.4 Cache management

To keep the homepage fast, content blocks are cached after their first retrieval.

- Any create/update/delete action on a content block automatically invalidates the cache.
- If you make changes outside the CMS (e.g., via database access), run `php artisan cache:clear` to refresh the cached data.
- The `Clear Cache` utility in the public controller also flushes compiled views, config, routes, and log files. Use it sparingly on production systems.

## 4. Post-release monitoring

1. Review server and application logs for errors (`storage/logs/laravel.log`).
2. Monitor key metrics (response times, queue health, database load).
3. Confirm scheduled tasks or cron jobs (if any) are still running as expected.
4. Periodically back up the database and `storage/app/public` assets.

---

Following this guide will help ensure smooth deployments and consistent editorial control over the bilingual Yemen Diabetes Association website.
