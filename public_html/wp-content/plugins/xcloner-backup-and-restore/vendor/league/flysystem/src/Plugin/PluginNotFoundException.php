<?php

namespace XCloner\League\Flysystem\Plugin;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
use LogicException;
class PluginNotFoundException extends LogicException
{
    // This exception doesn't require additional information.
}
