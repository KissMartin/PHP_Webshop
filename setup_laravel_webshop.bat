@echo off
setlocal enabledelayedexpansion

echo Installing PHP dependencies (composer)...
composer install

echo Setting up .env file database configuration...

if exist .env (
    copy .env .env.bak >nul
) else (
    echo .env file not found, copying from .env.example...
    copy .env.example .env >nul
)

powershell -Command "(Get-Content .env) -replace '^DB_CONNECTION=.*', 'DB_CONNECTION=mysql' `
    -replace '^DB_HOST=.*', 'DB_HOST=127.0.0.1' `
    -replace '^DB_PORT=.*', 'DB_PORT=3306' `
    -replace '^DB_DATABASE=.*', 'DB_DATABASE=laravel' `
    -replace '^DB_USERNAME=.*', 'DB_USERNAME=root' `
    -replace '^DB_PASSWORD=.*', 'DB_PASSWORD=' | Set-Content .env"

echo Generating application key...
php artisan key:generate

echo Installing NPM dependencies...
call npm install

echo Installing Tailwind, PostCSS, and Autoprefixer...
call npm install tailwindcss @tailwindcss/vite

echo Configuring Tailwind CSS...
call npm install tailwindcss@latest

echo Running migrations...
php artisan migrate

endlocal
pause
