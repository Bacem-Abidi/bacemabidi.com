<?php
// app/Services/GlobalDataService.php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class GlobalDataService
{
    protected $cacheKey = 'global_api_data';
    protected $cacheDuration = 3600; // 1 hour in seconds

    public function getGlobalData()
    {
        return Cache::remember($this->cacheKey, $this->cacheDuration, function () {
            try {
                $apiBaseUrl = config('api.base_url');
                $response = Http::get($apiBaseUrl.'/info');

                if ($response->successful()) {
                    return $response->json()['data'];
                }

                // Fallback to cached data if API fails (optional)
                return Cache::get($this->cacheKey, []);
            } catch (\Exception $e) {
                // Log error or handle exception
                return Cache::get($this->cacheKey, []);
            }
        });
    }
}
