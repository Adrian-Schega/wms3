# WMS3 - Laravel 12 + Vue 3 + PostgreSQL

A modern web application built with Laravel 12, Vue 3, and PostgreSQL.

![Application Screenshot](https://github.com/user-attachments/assets/2eb65b1e-db10-443d-86f9-ee41cfbb372c)

## Features

- ✅ Laravel 12.26.4 framework
- ✅ Vue 3.5.20 frontend framework  
- ✅ PostgreSQL database support
- ✅ Tailwind CSS for styling
- ✅ Vite for modern asset bundling
- ✅ Interactive Vue components

## Requirements

- PHP 8.2+
- Node.js 18+
- PostgreSQL 12+ (or SQLite for development)
- Composer

## Installation

1. Clone the repository
```bash
git clone <repository-url>
cd wms3
```

2. Install PHP dependencies
```bash
composer install
```

3. Install Node.js dependencies
```bash
npm install
```

4. Configure environment
```bash
cp .env.example .env
php artisan key:generate
```

5. Set up database (PostgreSQL)
```bash
# Update .env with your PostgreSQL credentials:
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=wms3
DB_USERNAME=postgres
DB_PASSWORD=your_password
```

For development with SQLite:
```bash
# In .env, change to:
DB_CONNECTION=sqlite
# And create SQLite database:
touch database/database.sqlite
```

6. Run migrations
```bash
php artisan migrate
```

7. Build frontend assets
```bash
npm run build
```

8. Start the development server
```bash
php artisan serve
```

## Development

For development with hot-reloading:
```bash
# Terminal 1: Start Laravel server
php artisan serve

# Terminal 2: Start Vite dev server
npm run dev
```

## Tech Stack

- **Backend**: Laravel 12 (PHP 8.3)
- **Frontend**: Vue 3 with Composition API
- **Database**: PostgreSQL (with SQLite fallback)
- **Styling**: Tailwind CSS
- **Build Tool**: Vite
- **Package Manager**: Composer + npm

## Project Structure

```
wms3/
├── app/                    # Laravel application logic
├── resources/
│   ├── js/
│   │   ├── app.js         # Vue application entry point
│   │   └── components/    # Vue components
│   ├── css/               # Stylesheets
│   └── views/             # Blade templates
├── routes/                # Application routes
├── database/              # Migrations and seeds
└── public/                # Public assets
```

## Features Demonstrated

- Vue 3 reactive components
- Laravel 12 latest features
- Modern ES6+ JavaScript
- Tailwind CSS styling
- Component-based architecture
- Database integration ready

Visit `http://localhost:8000` to see the application in action!

---

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).