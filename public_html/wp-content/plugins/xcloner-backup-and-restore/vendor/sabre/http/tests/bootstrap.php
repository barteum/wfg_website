<?php

declare (strict_types=1);
namespace XCloner;

if (!\defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
\date_default_timezone_set('UTC');
\ini_set('error_reporting', (string) (\E_ALL | \E_STRICT | \E_DEPRECATED));
// Composer autoloader
include __DIR__ . '/../vendor/autoload.php';
