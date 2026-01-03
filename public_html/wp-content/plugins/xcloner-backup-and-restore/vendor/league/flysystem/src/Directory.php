<?php

namespace XCloner\League\Flysystem;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
/**
 * @deprecated
 */
class Directory extends Handler
{
    /**
     * Delete the directory.
     *
     * @return bool
     */
    public function delete()
    {
        return $this->filesystem->deleteDir($this->path);
    }
    /**
     * List the directory contents.
     *
     * @param bool $recursive
     *
     * @return array|bool directory contents or false
     */
    public function getContents($recursive = \false)
    {
        return $this->filesystem->listContents($this->path, $recursive);
    }
}
