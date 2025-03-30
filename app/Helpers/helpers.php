<?php

use Illuminate\Support\Facades\Log;

if (!function_exists('format_reading_time')) {
    function format_reading_time(int $minutes): string
    {
        if ($minutes < 1) return 'Less than 1 min read';

        $hours = floor($minutes / 60);
        $remainingMinutes = $minutes % 60;

        $parts = [];
        if ($hours > 0) {
            $parts[] = $hours . ' ' . ($hours === 1 ? 'hour' : 'hours');
        }
        if ($remainingMinutes > 0) {
            $parts[] = $remainingMinutes . ' min';
        }

        return implode(', ', $parts) . ' read';
    }
}
