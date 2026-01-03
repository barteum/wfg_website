<?php

namespace XCloner;

if (!\defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
// Don't redefine the functions if included multiple times.
if (!\function_exists('XCloner\GuzzleHttp\describe_type')) {
    require __DIR__ . '/functions.php';
}
