<?php

namespace XCloner\Psr\Http\Client;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
/**
 * Every HTTP client related exception MUST implement this interface.
 */
interface ClientExceptionInterface extends \Throwable
{
}
