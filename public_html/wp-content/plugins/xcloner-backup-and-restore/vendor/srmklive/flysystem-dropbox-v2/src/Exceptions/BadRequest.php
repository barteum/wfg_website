<?php

namespace XCloner\Srmklive\Dropbox\Exceptions;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
use Exception;
use XCloner\Psr\Http\Message\ResponseInterface;
class BadRequest extends Exception
{
    /**
     * BadRequest constructor.
     *
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $body = json_decode($response->getBody(), \true);
        if (null !== $body && \true === isset($body['error_summary'])) {
            parent::__construct($body['error_summary']);
        }
    }
}
