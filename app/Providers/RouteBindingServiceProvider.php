<?php


namespace App\Providers;
use mmghv\LumenRouteBinding\RouteBindingServiceProvider as BaseServiceProvider;


class RouteBindingServiceProvider extends BaseServiceProvider
{
    public function boot()
    {
        $binder = $this->binder;
        $binder->bind('user', 'App\User');
        $binder->bind('skill', 'App\Skill');
        $binder->bind('certification', 'App\Certification');
        $binder->bind('education', 'App\Education');
        $binder->bind('language', 'App\Language');


    }
}