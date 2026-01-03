<?php

namespace XCloner\GuzzleHttp\Exception;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
/**
 * Exception when a client error is encountered (4xx codes)
 */
class ClientException extends BadResponseException
{
}
