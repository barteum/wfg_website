<?php

namespace XCloner\GuzzleHttp\Exception;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
use XCloner\Psr\Http\Client\ClientExceptionInterface;
interface GuzzleException extends ClientExceptionInterface
{
}
