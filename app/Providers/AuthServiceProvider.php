<?php

namespace App\Providers;
use Bouncer;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        'App\SecondaryInventory' => 'App\Policies\SecondaryInventoryPolicy'
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Passport::routes();
Passport::enableImplicitGrant();
Passport::tokensCan([
    'manage_secondary_inventories' => 'View and Manage Secondary Inventories',
]);
Bouncer::allow('admin')->to('ban-users');
        //
    }
}
