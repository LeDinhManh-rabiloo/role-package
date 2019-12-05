<?php

namespace Manhle\RolePackage;

use illuminate\Support\ServiceProvider;

class RoleServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views/backs/pages/roles', 'index');
        $this->loadViewsFrom(__DIR__.'/views/backs/pages/roles', 'edit');
        $this->loadViewsFrom(__DIR__.'/views/backs/pages/roles', 'form');
        $this->loadViewsFrom(__DIR__.'/views/backs/pages/roles', 'create');
        $this->loadViewsFrom(__DIR__.'/views/backs/pages/roles', 'actions');
        $this->loadViewsFrom(__DIR__.'stubs/datatables', 'builder');
        $this->loadViewsFrom(__DIR__. 'stubs/datatables', 'datatables');
        $this->loadViewsFrom(__DIR__. 'stubs/datatables', 'html');
        $this->loadViewsFrom(__DIR__. 'stubs/datatables', 'scopes');
    }

    public function register()
    {

    }
}
