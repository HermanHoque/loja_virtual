<?php

namespace App\Providers;

use App\Models\Categoria;
use Illuminate\Support\ServiceProvider;

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
        //fazer com que todas as view tenham acesso as categorias do BD
        $categoriasMenu = Categoria::all();
        view()->share("categoriasMenu", $categoriasMenu);
    }
}
