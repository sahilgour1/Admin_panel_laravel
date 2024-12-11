<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Menu;  // Assuming the model is named `Menu`

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
        $menuData = Menu::where('id', 1)->first(); // Adjust the query as needed

        // Check if menuData exists and decode JSON if necessary
        if ($menuData) {
            // Decode json_output if it's in JSON format
            $menuData->json_output = json_decode($menuData->json_output, true);
        }

        // Log the menu data to check if it's fetched and decoded properly
        \Log::debug('Menu Data: ', ['menu' => $menuData]);

        // Make the menu data available globally in all views
        View::share('menu', $menuData); // Correctly share variable with the name 'menu'
    }
}
