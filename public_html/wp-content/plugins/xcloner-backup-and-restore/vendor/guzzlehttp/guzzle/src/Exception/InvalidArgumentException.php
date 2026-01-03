<?php

namespace XCloner\GuzzleHttp\Exception;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
final class InvalidArgumentException extends \InvalidArgumentException implements GuzzleException
{
}
