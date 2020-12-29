<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->defineGateCategory();
        $this->defineGateProduct();
        $this->defineGateSlider();
        $this->defineGateSetting();
        $this->defineGateUser();
        $this->defineGateTransaction();
        $this->defineGateComment();
    }

    public function defineGateCategory()
    {
        Gate::define('list_category', 'App\Policies\CategoryPolicy@view');
        Gate::define('add_category', 'App\Policies\CategoryPolicy@create');
        Gate::define('edit_category', 'App\Policies\CategoryPolicy@update');
        Gate::define('delete_category', 'App\Policies\CategoryPolicy@delete');
    }
    
    public function defineGateProduct()
    {
        Gate::define('list_product', 'App\Policies\ProductPolicy@view');
        Gate::define('add_product', 'App\Policies\ProductPolicy@create');
        Gate::define('edit_product', 'App\Policies\ProductPolicy@update');
        Gate::define('delete_product', 'App\Policies\ProductPolicy@delete');
    }

    public function defineGateSlider()
    {
        Gate::define('list_slider', 'App\Policies\SliderPolicy@view');
        Gate::define('add_slider', 'App\Policies\SliderPolicy@create');
        Gate::define('edit_slider', 'App\Policies\SliderPolicy@update');
        Gate::define('delete_slider', 'App\Policies\SliderPolicy@delete');
    }

    public function defineGateSetting()
    {
        Gate::define('list_settings', 'App\Policies\SettingPolicy@view');
        Gate::define('add_settings', 'App\Policies\SettingPolicy@create');
        Gate::define('edit_settings', 'App\Policies\SettingPolicy@update');
        Gate::define('delete_settings', 'App\Policies\SettingPolicy@delete');
    }

    public function defineGateUser()
    {
        Gate::define('list_user', 'App\Policies\UserPolicy@view');
        Gate::define('add_user', 'App\Policies\UserPolicy@create');
        Gate::define('edit_user', 'App\Policies\UserPolicy@update');
        Gate::define('delete_user', 'App\Policies\UserPolicy@delete');
    }

    public function defineGateTransaction()
    {
        Gate::define('list_transaction', 'App\Policies\TransactionPolicy@view');
        Gate::define('add_transaction', 'App\Policies\TransactionPolicy@create');
        Gate::define('edit_transaction', 'App\Policies\TransactionPolicy@update');
        Gate::define('delete_transaction', 'App\Policies\TransactionPolicy@delete');
    }

    public function defineGateComment()
    {
        Gate::define('list_comments', 'App\Policies\CommentPolicy@view');
        Gate::define('add_comments', 'App\Policies\CommentPolicy@create');
        Gate::define('edit_comments', 'App\Policies\CommentPolicy@update');
        Gate::define('delete_comments', 'App\Policies\CommentPolicy@delete');
    }
}
