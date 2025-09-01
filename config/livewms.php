<?php

// Config file for LiveWMS.pl application
// This file demonstrates the configuration for the Laravel packages

return [
    /*
    |--------------------------------------------------------------------------
    | LiveWMS.pl Application Settings
    |--------------------------------------------------------------------------
    */
    
    'app_name' => env('APP_NAME', 'LiveWMS.pl'),
    'version' => '1.0.0',
    
    /*
    |--------------------------------------------------------------------------
    | WMS SaaS Features
    |--------------------------------------------------------------------------
    */
    
    'features' => [
        'multitenancy' => true,
        'subscriptions' => true,
        'permissions' => true,
        'api_auth' => true,
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Tenant Configuration
    |--------------------------------------------------------------------------
    | 
    | Configuration for multi-tenant WMS instances
    */
    
    'tenancy' => [
        'domain_strategy' => 'subdomain', // subdomain.livewms.pl
        'database_strategy' => 'separate', // separate database per tenant
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Subscription Plans
    |--------------------------------------------------------------------------
    |
    | Basic WMS SaaS subscription tiers
    */
    
    'subscription_plans' => [
        'starter' => [
            'name' => 'Starter',
            'price' => 29.99,
            'warehouses' => 1,
            'users' => 5,
        ],
        'professional' => [
            'name' => 'Professional', 
            'price' => 99.99,
            'warehouses' => 5,
            'users' => 25,
        ],
        'enterprise' => [
            'name' => 'Enterprise',
            'price' => 299.99,
            'warehouses' => 'unlimited',
            'users' => 'unlimited',
        ],
    ],
    
    /*
    |--------------------------------------------------------------------------
    | WMS Permissions
    |--------------------------------------------------------------------------
    |
    | Default permission structure for WMS operations
    */
    
    'permissions' => [
        'inventory' => ['view', 'create', 'edit', 'delete'],
        'orders' => ['view', 'create', 'edit', 'delete', 'fulfill'],
        'warehouses' => ['view', 'create', 'edit', 'delete', 'manage'],
        'users' => ['view', 'create', 'edit', 'delete', 'assign_roles'],
        'reports' => ['view', 'generate', 'export'],
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Default User Roles
    |--------------------------------------------------------------------------
    */
    
    'roles' => [
        'super_admin' => 'Full system access',
        'admin' => 'Tenant administration access',
        'manager' => 'Warehouse management access',
        'operator' => 'Basic warehouse operations',
        'viewer' => 'Read-only access',
    ],
];