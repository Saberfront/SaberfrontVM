<?php

namespace App\Providers;
use Bouncer;
use Carbon\Carbon;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Schema;
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
   
   Passport::tokensExpireIn(Carbon::now()->addDays(15));
   Passport::refreshTokensExpireIn(Carbon::now()->addDays(30));
        Passport::pruneRevokedTokens(); //basic garbage collector
Passport::tokensCan([
    'manage_secondary_inventories' => 'View and Manage Secondary Inventories',
    'manage_loadouts' => 'View, use, and modify Saberfront loadouts.'
]);
if(Schema::hasTable('abilities')){
Bouncer::allow('admin')->to('ban-users');
}
    }
}
