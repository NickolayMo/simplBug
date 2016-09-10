<?php

namespace MySimpleAcl\Acl;
use Illuminate\Support\ServiceProvider;

class AclServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('acl', function(){
            return new Acl;
        });
    }
    public function boot(){
        require __DIR__.'/Http/routes.php';
    }
}