<?php

namespace XCloner\Psr\Log;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
class InvalidArgumentException extends \InvalidArgumentException
{
}
