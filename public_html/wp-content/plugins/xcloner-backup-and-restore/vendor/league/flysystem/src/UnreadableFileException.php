<?php

namespace XCloner\League\Flysystem;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
use SplFileInfo;
class UnreadableFileException extends Exception
{
    public static function forFileInfo(SplFileInfo $fileInfo)
    {
        return new static(sprintf('Unreadable file encountered: %s', $fileInfo->getRealPath()));
    }
}
