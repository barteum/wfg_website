<?php

namespace XCloner\Aws\Api\Parser;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
use XCloner\Aws\Api\Service;
use XCloner\Aws\Api\StructureShape;
use XCloner\Aws\CommandInterface;
use XCloner\Aws\ResultInterface;
use XCloner\Psr\Http\Message\ResponseInterface;
use XCloner\Psr\Http\Message\StreamInterface;
/**
 * @internal
 */
abstract class AbstractParser
{
    /** @var \Aws\Api\Service Representation of the service API*/
    protected $api;
    /** @var callable */
    protected $parser;
    /**
     * @param Service $api Service description.
     */
    public function __construct(Service $api)
    {
        $this->api = $api;
    }
    /**
     * @param CommandInterface  $command  Command that was executed.
     * @param ResponseInterface $response Response that was received.
     *
     * @return ResultInterface
     */
    abstract public function __invoke(CommandInterface $command, ResponseInterface $response);
    abstract public function parseMemberFromStream(StreamInterface $stream, StructureShape $member, $response);
}
