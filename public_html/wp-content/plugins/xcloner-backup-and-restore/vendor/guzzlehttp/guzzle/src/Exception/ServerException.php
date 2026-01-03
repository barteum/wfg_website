<?php

namespace XCloner\GuzzleHttp\Exception;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
/**
 * Exception when a server error is encountered (5xx codes)
 */
class ServerException extends BadResponseException
{
}
