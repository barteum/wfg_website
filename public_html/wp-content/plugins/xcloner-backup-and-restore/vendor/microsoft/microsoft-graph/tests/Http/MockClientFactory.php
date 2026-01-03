<?php

namespace XCloner\Microsoft\Graph\Http\Test;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
use XCloner\GuzzleHttp\Client;
use XCloner\GuzzleHttp\Handler\MockHandler;
use XCloner\GuzzleHttp\HandlerStack;
class MockClientFactory
{
    /**
     * Creates a mock Guzzle client with optional mock responses
     *
     * @param array $clientConfig - Guzzle client Request options
     * @param array $mockResponses - Accepts \GuzzleHttp\Psr7\Response and \GuzzleHttp\Exception
     * @return \GuzzleHttp\Client
     */
    public static function create($clientConfig = [], $mockResponses = [])
    {
        if ($mockResponses) {
            $stack = HandlerStack::create(new MockHandler($mockResponses));
            $clientConfig['handler'] = $stack;
            return new Client($clientConfig);
        }
        return new Client($clientConfig);
    }
}
