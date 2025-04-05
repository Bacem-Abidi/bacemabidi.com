<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use League\CommonMark\MarkdownConverter;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\Table\TableExtension;
use App\Services\GlobalDataService;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(GlobalDataService::class, function () {
            return new GlobalDataService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(GlobalDataService $globalDataService): void
    {
        // Share data with all views
        View::composer('*', function ($view) use ($globalDataService) {
            $globalData = $globalDataService->getGlobalData();
            $view->with('globalData', $globalData);
        });

        \Str::macro('markdown', function ($content) {
            $environment = new Environment();
            $environment->addExtension(new CommonMarkCoreExtension());
            $environment->addExtension(new TableExtension());

            $converter = new MarkdownConverter($environment);
            return $converter->convert($content);
        });
    }
}
