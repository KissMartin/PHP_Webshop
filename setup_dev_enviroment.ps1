# Enable verbose output
$ErrorActionPreference = "Stop"

# Step 1: Install NPM dependencies
Write-Host "Installing NPM dependencies..."
npm install

# Step 2: Install Tailwind CSS
Write-Host "Configuring Tailwind CSS..."
npm install tailwindcss@latest

# Step 3: Set up the .env file for database configuration
Write-Host "Setting up .env file database configuration..."

# Check if .env file exists
if (-Not (Test-Path ".env")) {
    Write-Host ".env file not found, copying from .env.example..."
    Copy-Item ".env.example" ".env" -Force
} else {
    Write-Host ".env file already exists, skipping copy."
}

# Modify the .env file for database configuration
Write-Host "Modifying .env file for database configuration..."
$envContent = Get-Content .env

# Define the database settings and their new values
$databaseConfig = @{
    "DB_CONNECTION" = "mysql"
    "DB_HOST"       = "127.0.0.1"
    "DB_PORT"       = "3306"
    "DB_DATABASE"   = "webshopproject"
    "DB_USERNAME"   = "root"
    "DB_PASSWORD"   = ""
}

# Loop through each key-value pair in the $databaseConfig hash table
foreach ($key in $databaseConfig.Keys) {
    # Create a regex pattern to match the commented out lines
    $pattern = "^#\s*$key=.*"

    # Replace the commented lines with the new value and uncomment them
    $envContent = $envContent | ForEach-Object {
        if ($_ -match $pattern) {
            $_ -replace "^#\s*$key=.*", "$key=$($databaseConfig[$key])"
        } else {
            $_
        }
    }
}

# Write the updated content back to the .env file
$envContent | Set-Content .env

# Step 4: Install PHP dependencies (composer)
Write-Host "Installing PHP dependencies (composer)..."
composer install

# Step 5: Generate application key
Write-Host "Generating application key by running 'php artisan key:generate'..."
php artisan key:generate

# Step 6: Run migrations
Write-Host "Running migrations with 'php artisan migrate'..."
php artisan migrate

# Step 7: Running seeders
Write-Host "Running seeders with 'php artisan db:seed'..."
php artisan db:seed

Write-Host "Setup complete."

# Pause the script at the end (optional)
Pause
