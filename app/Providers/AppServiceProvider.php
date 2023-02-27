<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Post;
use App\Policies\PostPolicy;
use Spatie\ResponseCache\Events\ResponseCacheHit;
use Spatie\ResponseCache\Events\CacheMissed;
use Spatie\ResponseCache\Events\ClearingResponseCache;
use Spatie\ResponseCache\Events\ClearedResponseCache;
use Illuminate\Support\Facades\Event;

class AppServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Post::class => PostPolicy::class,
    ];

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
        Event::listen(function (ResponseCacheHit $event) {
            info($event);
        });

        // DB::listen(function($query) {
        //     Log::info(
        //         $query->sql,
        //         [
        //             'bindings' => $query->bindings,
        //             'time' => $query->time
        //         ]
        //     );
        // });
    }
}
