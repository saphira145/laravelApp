<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Old datatable
        view()->composer('students._form', function($view) {
            $view->with([
                'sex' => ['Male', 'Female', 'Gay', 'Les']
            ]);
        });
        
        // New Datatable
        view()->composer('students.tabledata', function($view) {
            $view->with([
                'sex' => ['Male', 'Female', 'Gay', 'Les']
            ]);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
