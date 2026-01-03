<?php

namespace XCloner\League\Flysystem;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
use LogicException;
class RootViolationException extends LogicException implements FilesystemException
{
    //
}
