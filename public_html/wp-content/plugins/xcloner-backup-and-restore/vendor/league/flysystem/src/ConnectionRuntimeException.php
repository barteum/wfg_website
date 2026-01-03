<?php

namespace XCloner\League\Flysystem;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
use RuntimeException;
class ConnectionRuntimeException extends RuntimeException implements FilesystemException
{
}
