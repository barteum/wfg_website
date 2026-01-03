<?php

namespace XCloner\Aws\Handler\GuzzleV5;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
use XCloner\GuzzleHttp\Stream\StreamDecoratorTrait;
use XCloner\GuzzleHttp\Stream\StreamInterface as GuzzleStreamInterface;
use XCloner\Psr\Http\Message\StreamInterface as Psr7StreamInterface;
/**
 * Adapts a PSR-7 Stream to a Guzzle 5 Stream.
 *
 * @codeCoverageIgnore
 */
class GuzzleStream implements GuzzleStreamInterface
{
    use StreamDecoratorTrait;
    /** @var Psr7StreamInterface */
    private $stream;
    public function __construct(Psr7StreamInterface $stream)
    {
        $this->stream = $stream;
    }
}
