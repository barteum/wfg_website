<?php

namespace XCloner\Aws\Exception;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
class CommonRuntimeException extends \RuntimeException
{
}
