<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\menu;  // Assuming you have a Menu model to fetch your menu data

class MenuMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Fetch the dynamic menu data from your Menu model
        $menuData = menu::where('id', 1)->first(); // Adjust the query as per your requirement

        // Check if menuData exists and decode JSON if necessary
        if ($menuData) {
            // Decode json_output if it's in JSON format
            $menuData->json_output = json_decode($menuData->json_output, true);
        }

        // Log the menu data to check if it's fetched and decoded properly
        \Log::debug('Menu Data: ', ['menu' => $menuData]);

        // Make the menu data available globally in all views
        view()->share('menu', $menuData); // Share it globally for access in views

        return $next($request);
    }
}
