<?php

namespace XCloner\League\Flysystem\Plugin;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
class ListPaths extends AbstractPlugin
{
    /**
     * Get the method name.
     *
     * @return string
     */
    public function getMethod()
    {
        return 'listPaths';
    }
    /**
     * List all paths.
     *
     * @param string $directory
     * @param bool   $recursive
     *
     * @return string[] paths
     */
    public function handle($directory = '', $recursive = \false)
    {
        $result = [];
        $contents = $this->filesystem->listContents($directory, $recursive);
        foreach ($contents as $object) {
            $result[] = $object['path'];
        }
        return $result;
    }
}
