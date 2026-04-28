<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Speciality;
use App\Models\Doctor;

class AppointmentFormServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('components.appointment-form', function ($view) {
            $view->with('specialists', Speciality::all())
                 ->with('doctors', Doctor::all());
        });
    }
}
