<?php

namespace XCloner\League\Flysystem\Plugin;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
class EmptyDir extends AbstractPlugin
{
    /**
     * Get the method name.
     *
     * @return string
     */
    public function getMethod()
    {
        return 'emptyDir';
    }
    /**
     * Empty a directory's contents.
     *
     * @param string $dirname
     */
    public function handle($dirname)
    {
        $listing = $this->filesystem->listContents($dirname, \false);
        foreach ($listing as $item) {
            if ($item['type'] === 'dir') {
                $this->filesystem->deleteDir($item['path']);
            } else {
                $this->filesystem->delete($item['path']);
            }
        }
    }
}
