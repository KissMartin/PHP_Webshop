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

echo Installing Laravel Breeze...
composer require laravel/breeze --dev
php artisan breeze:install blade

echo Installing NPM dependencies...
call npm install

echo Installing Tailwind, PostCSS, and Autoprefixer...
call npm install -D tailwindcss postcss autoprefixer

echo Initializing Tailwind config...
call npx tailwindcss init -p

echo Adding Tailwind directives to CSS...
echo @tailwind base; > resources/css/app.css
echo @tailwind components; >> resources/css/app.css
echo @tailwind utilities; >> resources/css/app.css

echo Updating tailwind.config.js...
(
echo /** @type {import('tailwindcss').Config} */
echo module.exports = {
echo     content: [
echo         "./resources/**/*.blade.php",
echo         "./resources/**/*.js",
echo         "./resources/**/*.vue",
echo     ],
echo     theme: {
echo         extend: {},
echo     },
echo     plugins: [],
echo }
) > tailwind.config.js

echo Adding Alpine.js to app.js...
echo import Alpine from 'alpinejs'; > resources/js/app.js
echo window.Alpine = Alpine; >> resources/js/app.js
echo Alpine.start(); >> resources/js/app.js

echo Building assets...
call npm run dev

echo Running migrations...
php artisan migrate

echo All done! You can now run your Laravel app with:
echo php artisan serve

endlocal
pause
