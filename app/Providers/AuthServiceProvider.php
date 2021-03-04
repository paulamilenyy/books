<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         //'App\Author' => 'App\Policies\AuthorPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //verificar se user e admin:
        Gate::define('update-book', function($user){
            return true;
        });
        Gate::define('delete-book', function($user){
            return $user->admin===1
                ? Response::allow()
                : Response::deny('O usuário não pode remover');
        });

        Gate::define('update-author', function($user,$author){
            //usuario tenta manipular registro que ele proprio cadastrou
            return $user->id===$author->user_id;
        });
        Gate::define('delete-author', function($user,$author){
            return $user->id===$author->user_id;
        }); 
    }
}
