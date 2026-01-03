<?php

namespace XCloner\League\Flysystem\Adapter\Polyfill;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
use LogicException;
trait NotSupportingVisibilityTrait
{
    /**
     * Get the visibility of a file.
     *
     * @param string $path
     *
     * @throws LogicException
     */
    public function getVisibility($path)
    {
        throw new LogicException(get_class($this) . ' does not support visibility. Path: ' . $path);
    }
    /**
     * Set the visibility for a file.
     *
     * @param string $path
     * @param string $visibility
     *
     * @throws LogicException
     */
    public function setVisibility($path, $visibility)
    {
        throw new LogicException(get_class($this) . ' does not support visibility. Path: ' . $path . ', visibility: ' . $visibility);
    }
}
