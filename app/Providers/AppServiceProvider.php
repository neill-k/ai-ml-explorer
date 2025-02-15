<?php

namespace App\Providers;

use App\Livewire\AiModelList;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::component('layouts.main-layout', 'main-layout');
        Livewire::component('a-i-model-list', AiModelList::class);
    }
}
