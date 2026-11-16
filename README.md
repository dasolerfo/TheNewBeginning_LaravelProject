# The New Beginning Laravel Project

Proyecto web desarrollado con Laravel para gestionar usuarios, perfiles, puntuaciones y ranking.

## Descripción

This project is a Laravel application designed for a landing page and user management flow, including:

- registro e inicio de sesión
- edición de perfil
- sistema de puntuación
- ranking de usuarios
- administración básica de usuarios

## Tecnologías

- PHP 8.1
- Laravel 8
- SQLite para desarrollo local
- Blade templates

## Requisitos

- PHP 8.1+
- Composer
- Git

## Instalación local

```powershell
cd D:\pMas\beginning\TheNewBeginning_LaravelProject
set PATH=C:\php81;%PATH%
copy .env.example .env
composer install --ignore-platform-reqs --no-interaction
php artisan key:generate
php artisan migrate --force
php artisan serve --host=127.0.0.1 --port=8000
```

Después puedes abrir en el navegador:

```text
http://127.0.0.1:8000
```

## Estructura principal

- `app/` - lógica de la aplicación
- `resources/views/` - vistas Blade
- `routes/` - rutas web
- `database/migrations/` - migraciones
- `public/` - assets públicos

## Estado

Este repositorio está preparado para ejecutarse en entorno local con Laravel y PHP 8.1.

## Licencia

MIT
