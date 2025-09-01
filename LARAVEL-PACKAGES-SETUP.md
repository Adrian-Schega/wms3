# Laravel SaaS Packages Installation Guide for LiveWMS.pl

This guide provides the complete setup instructions for all Laravel packages requested for the LiveWMS.pl WMS SaaS application.

## Required Laravel Packages

### 1. Laravel Sanctum (API Authentication)
```bash
composer require laravel/sanctum
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
php artisan migrate
```

Add to `config/sanctum.php`:
```php
'guard' => ['web'],
'expiration' => null,
'token_prefix' => '',
```

### 2. Laravel Cashier (Stripe Integration)
```bash
composer require laravel/cashier
php artisan vendor:publish --tag="cashier-migrations"
php artisan migrate
```

Add to `.env`:
```env
STRIPE_KEY=pk_test_...
STRIPE_SECRET=sk_test_...
STRIPE_WEBHOOK_SECRET=whsec_...
```

### 3. Spatie Laravel Permission (Role-based Access)
```bash
composer require spatie/laravel-permission
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan migrate
php artisan permission:cache-reset
```

Add to `app/Models/User.php`:
```php
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    // ...
}
```

### 4. Spatie Laravel Multitenancy (Multi-tenant Architecture)
```bash
composer require spatie/laravel-multitenancy
php artisan vendor:publish --provider="Spatie\Multitenancy\MultitenancyServiceProvider"
php artisan migrate
```

Configure in `config/multitenancy.php`:
```php
'tenant_finder' => \Spatie\Multitenancy\TenantFinder\DomainTenantFinder::class,
'switch_tenant_tasks' => [
    \Spatie\Multitenancy\Tasks\SwitchTenantDatabase::class,
],
```

## Environment Configuration

Update `.env` for LiveWMS.pl:
```env
APP_NAME="LiveWMS.pl"
APP_URL=https://livewms.pl

# Database (PostgreSQL for production)
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=livewms
DB_USERNAME=livewms_user
DB_PASSWORD=secure_password

# Stripe Configuration
STRIPE_KEY=pk_live_...
STRIPE_SECRET=sk_live_...
STRIPE_WEBHOOK_SECRET=whsec_...

# Multi-tenancy
TENANT_DOMAIN=livewms.pl
```

## Database Setup

### Tenants Migration
```php
Schema::create('tenants', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('domain')->unique();
    $table->string('database')->unique();
    $table->json('subscription_data')->nullable();
    $table->timestamp('trial_ends_at')->nullable();
    $table->boolean('is_active')->default(true);
    $table->timestamps();
});
```

### Subscription Plans Seeder
```php
$plans = [
    ['name' => 'Starter', 'stripe_id' => 'price_starter', 'price' => 2999],
    ['name' => 'Professional', 'stripe_id' => 'price_pro', 'price' => 9999],
    ['name' => 'Enterprise', 'stripe_id' => 'price_enterprise', 'price' => 29999],
];
```

## Default Permissions & Roles

```php
// Create permissions
Permission::create(['name' => 'manage warehouses']);
Permission::create(['name' => 'manage inventory']);
Permission::create(['name' => 'manage orders']);
Permission::create(['name' => 'view reports']);
Permission::create(['name' => 'manage users']);

// Create roles
$admin = Role::create(['name' => 'admin']);
$manager = Role::create(['name' => 'warehouse-manager']);
$operator = Role::create(['name' => 'operator']);

// Assign permissions
$admin->givePermissionTo(Permission::all());
$manager->givePermissionTo(['manage inventory', 'manage orders', 'view reports']);
$operator->givePermissionTo(['manage inventory']);
```

## API Routes Setup

```php
// routes/api.php
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('warehouses', WarehouseController::class);
    Route::apiResource('inventory', InventoryController::class);
    Route::apiResource('orders', OrderController::class);
    Route::get('dashboard', [DashboardController::class, 'index']);
});

// Tenant-specific routes
Route::middleware(['tenant'])->group(function () {
    Route::get('tenant/dashboard', [TenantDashboardController::class, 'index']);
});
```

## Frontend Integration

The Vue 3 frontend with Pinia is already configured to work with these Laravel packages:

- **Pinia Store**: Manages authentication state, user permissions, and tenant data
- **API Integration**: Axios configured for Sanctum token authentication
- **Multi-tenant Support**: Dynamic tenant switching in frontend
- **Subscription Management**: Stripe payment flows integrated

## Installation Summary

1. **Install packages** using the composer commands above
2. **Run migrations** to set up database tables
3. **Configure environment** variables for production
4. **Set up Stripe** webhook endpoints
5. **Create default roles** and permissions
6. **Configure tenant** database strategy

All packages are ready for immediate use in the LiveWMS.pl SaaS application.