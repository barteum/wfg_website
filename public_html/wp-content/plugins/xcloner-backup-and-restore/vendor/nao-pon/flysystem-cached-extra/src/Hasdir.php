<?php

namespace XCloner\Hypweb\Flysystem\Cached\Extra;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
trait Hasdir
{
    /**
     * Filter the contents from a listing.
     *
     * @param array $contents object listing
     *
     * @return array filtered contents
     */
    public function cleanContents(array $contents)
    {
        $cachedProperties = array_flip(['path', 'dirname', 'basename', 'extension', 'filename', 'size', 'mimetype', 'visibility', 'timestamp', 'type', 'hasdir']);
        foreach ($contents as $path => $object) {
            if (is_array($object)) {
                $contents[$path] = array_intersect_key($object, $cachedProperties);
            }
        }
        return $contents;
    }
}
