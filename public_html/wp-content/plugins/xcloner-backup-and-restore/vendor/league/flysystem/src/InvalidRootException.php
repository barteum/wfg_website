<?php

namespace XCloner\League\Flysystem;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
use RuntimeException;
class InvalidRootException extends RuntimeException implements FilesystemException
{
}
