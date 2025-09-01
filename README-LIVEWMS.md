# LiveWMS.pl - Laravel 12 + Vue 3 + PostgreSQL WMS SaaS Application

## Overview

LiveWMS.pl is a complete Warehouse Management System (WMS) SaaS application built with modern technologies:

- **Laravel 12** - Latest PHP framework
- **Vue 3** - Modern reactive frontend framework  
- **PostgreSQL** - Robust relational database
- **Pinia** - Vue.js state management
- **Tailwind CSS** - Utility-first CSS framework
- **Vite** - Fast build tool

## Laravel Packages Integrated

### Authentication & Authorization
- **Laravel Sanctum** - API authentication system for SaaS
- **Spatie Laravel Permission** - Role and permission management

### Multi-tenancy & Payments  
- **Spatie Laravel Multitenancy** - Multi-tenant architecture for SaaS
- **Laravel Cashier (Stripe)** - Subscription billing and payments

### Frontend State Management
- **Pinia** - Modern Vue.js state management library

## Installation

```bash
# Install Composer dependencies
composer install

# Install NPM dependencies  
npm install

# Setup environment
cp .env.example .env
php artisan key:generate

# Setup database (PostgreSQL or SQLite)
php artisan migrate

# Build frontend assets
npm run build

# Start development server
php artisan serve
```

## Package Configuration

### Laravel Sanctum Setup
```bash
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
php artisan migrate
```

### Spatie Permission Setup
```bash
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan migrate
```

### Spatie Multitenancy Setup
```bash
php artisan vendor:publish --provider="Spatie\Multitenancy\MultitenancyServiceProvider"
```

### Laravel Cashier Setup  
```bash
php artisan vendor:publish --tag="cashier-migrations"
php artisan migrate
```

## Features Demonstrated

- **Pinia State Management** - Global state store for WMS data
- **Reactive UI Components** - Vue 3 composition API
- **Multi-tenant Ready** - Architecture for SaaS deployment
- **Payment Integration** - Stripe billing system
- **Role-based Access** - Permissions and roles system
- **API Authentication** - Secure API endpoints

## Development

```bash
# Development server with hot reload
npm run dev

# Production build
npm run build
```

The application is now ready for WMS SaaS development with all essential packages configured.