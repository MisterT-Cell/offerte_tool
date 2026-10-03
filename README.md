# Offerte-tool

Aanvraagtool voor vakmensen zoals schilders en installateurs. Klanten beschrijven hun klus,
uploaden foto's en laten hun e-mailadres achter. De vakman beheert de aanvragen in een dashboard.

Gebouwd met Laravel 13, Livewire 4, Flux en Pest.

## Lokaal opzetten

Nodig: PHP 8.4 (bijvoorbeeld via [Laravel Herd](https://herd.laravel.com)), Composer, Node.js en MySQL 8.4.

1. Maak een MySQL-database `offerte_tool` aan
2. Installeer en configureer het project:
   ```
   composer setup
   ```
   Dit maakt `.env` aan vanuit `.env.example`, genereert een `APP_KEY`, draait de migraties en bouwt de frontend.
3. Start de ontwikkelserver:
   ```
   composer dev
   ```

## Tests

```
php artisan test
```

De tests draaien op een SQLite-database in het geheugen, zodat je eigen database onaangeraakt blijft.

`composer test` draait daarnaast ook Pint (codestijl) en PHPStan (typecontrole), net als de CI op GitHub.
