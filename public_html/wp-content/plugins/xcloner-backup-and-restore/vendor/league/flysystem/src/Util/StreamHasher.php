<?php

namespace XCloner\League\Flysystem\Util;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
class StreamHasher
{
    /**
     * @var string
     */
    private $algo;
    /**
     * StreamHasher constructor.
     *
     * @param string $algo
     */
    public function __construct($algo)
    {
        $this->algo = $algo;
    }
    /**
     * @param resource $resource
     *
     * @return string
     */
    public function hash($resource)
    {
        rewind($resource);
        $context = hash_init($this->algo);
        hash_update_stream($context, $resource);
        fclose($resource);
        return hash_final($context);
    }
}
