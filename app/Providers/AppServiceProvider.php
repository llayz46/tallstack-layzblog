<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Spatie\Sheets\Sheets;

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
        Collection::macro('paginate', function (int $perPage, int $page = null, array $options = []) {
            $page = $page ?: LengthAwarePaginator::resolveCurrentPage();

            return new LengthAwarePaginator(
                $this->forPage($page, $perPage),
                $this->count(),
                $perPage,
                $page,
                $options
            );
        });

        Route::bind('post', function ($slug) {
            return $this->app->make(Sheets::class)->collection('posts')->all()->firstWhere('slug', $slug) ?? abort(404);
        });

        Carbon::setLocale('fr');
    }
}
