<?php

namespace XCloner\League\Flysystem;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
use LogicException;
class CorruptedPathDetected extends LogicException implements FilesystemException
{
    /**
     * @param string $path
     * @return CorruptedPathDetected
     */
    public static function forPath($path)
    {
        return new CorruptedPathDetected("Corrupted path detected: " . $path);
    }
}
