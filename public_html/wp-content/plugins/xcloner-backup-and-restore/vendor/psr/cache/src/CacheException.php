<?php

namespace XCloner\Psr\Cache;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
/**
 * Exception interface for all exceptions thrown by an Implementing Library.
 */
interface CacheException
{
}
