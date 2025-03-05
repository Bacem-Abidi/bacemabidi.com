<?php

use Illuminate\Support\Facades\Log;

if (!function_exists('techColor')) {
    function techColor($tech) {
        $tech = strtolower($tech);
        $stack = config("tech-colors");
        return $stack[$tech] ?? 'grayBright';
    }
}
