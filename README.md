# PHP_Webshop

## Features

### User Features

- **Product Browsing:**  
  View, search, and filter products. See detailed product pages and seller info.

- **Cart & Checkout:**  
  Add products to cart, checkout with new/saved credit card or cash, and save cards for future use.

- **Order Management:**  
  View active/past orders, track status, pay cash orders later, and cancel eligible orders.

- **Account Management:**  
  Register, log in, edit profile, delete account, and view public profiles.

### Admin Features

- **Admin Dashboard:**  
  See metrics for customers, orders, products, gross revenue (15% of paid orders), ad revenue (randomized), and site visitors (randomized). Quick links to manage orders, users, and products.

- **Product, Order, and User Management:**  
  Create/edit/delete products, manage orders and statuses, search users, and view user details.

### Technical Features

- **Authentication & Authorization:**  
  Secure login, registration and role-based access.

- **Order Status Automation:**  
  Scheduler updates card order statuses; cash orders require manual payment.

- **Seeders & Factories:**  
  Easy demo setup with database seeders and factories.

---

## Getting Started

### Prerequisites

- PHP 8.1+
- Composer
- Node.js & npm
- MySQL or compatible database

### Setup

1. **Clone the repository**

2. **Install dependencies and set up the environment**
    - Run the setup script (recommended):
        ```sh
        ./setup_dev_enviroment.ps1
        ```
      *This script should install Composer and npm dependencies, run migrations and seeders, and prepare your [.env](http://_vscodecontentref_/1) file.*

    - Or, do it manually:
        ```sh
        composer install
        npm install
        cp .env.example .env
        # Edit .env for your database credentials
        php artisan key:generate
        php artisan migrate --seed
        ```

3. **Start the application**
    - Laravel server:
        ```sh
        php artisan serve
        ```
    - NPM dev server:
        ```sh
        npm run dev
        ```
    - Scheduler (for order automation):
        ```sh
        php artisan schedule:work
        ```

4. **Make sure your database server is running.**


## Demo Accounts

- **Admin:**  
  Email: `admin@admin.com`  
  Password: `adminadmin`

- **User:**  
  Email: `user@user.com`  
  Password: `useruser`

---

## License

This project is for educational/demo purposes.  
