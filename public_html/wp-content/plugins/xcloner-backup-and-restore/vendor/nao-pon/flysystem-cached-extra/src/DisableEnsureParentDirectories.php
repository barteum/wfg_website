<?php

namespace XCloner\Hypweb\Flysystem\Cached\Extra;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
trait DisableEnsureParentDirectories
{
    /**
     * Disabled Ensure parent directories of an object.
     *
     * @param string $path object path
     */
    public function ensureParentDirectories($path)
    {
    }
}
