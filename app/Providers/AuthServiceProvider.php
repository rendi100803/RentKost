<?php

namespace App\Providers;

use App\Models\Auth\Role;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Gate;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        Gate::define("admin", function ($user) {
            if (empty($user->getAkses)) {
                return redirect("/logout");
            } else {
                return $user->getAkses->id == Role::ADMIN;
            }
        });
        Gate::define("member", function ($user) {
            if (empty($user->getAkses)) {
                return redirect("/logout");
            } else {
                return $user->getAkses->id == Role::MEMBER;
            }
        });


        ResetPassword::createUrlUsing(function ($user, string $token) {
            return url("/new-password?token=$token&email=$user->email");
        });
    }
}
