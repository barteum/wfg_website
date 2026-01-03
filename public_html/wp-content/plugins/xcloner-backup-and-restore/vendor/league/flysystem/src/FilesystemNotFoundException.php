<?php

namespace XCloner\League\Flysystem;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
use LogicException;
/**
 * Thrown when the MountManager cannot find a filesystem.
 */
class FilesystemNotFoundException extends LogicException implements FilesystemException
{
}
