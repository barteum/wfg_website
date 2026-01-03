<?php

namespace XCloner\League\Flysystem\Cached\Storage;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
class Memory extends AbstractCache
{
    /**
     * {@inheritdoc}
     */
    public function save()
    {
        // There is nothing to save
    }
    /**
     * {@inheritdoc}
     */
    public function load()
    {
        // There is nothing to load
    }
}
