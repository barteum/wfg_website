<?php

namespace XCloner\League\Flysystem;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
use ErrorException;
class ConnectionErrorException extends ErrorException implements FilesystemException
{
}
