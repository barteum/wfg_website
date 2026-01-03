<?php

namespace XCloner\BackblazeB2\Tests;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
use XCloner\BackblazeB2\Http\Client as HttpClient;
use XCloner\GuzzleHttp\Handler\MockHandler;
use XCloner\GuzzleHttp\HandlerStack;
use XCloner\GuzzleHttp\Psr7\Response;
trait TestHelper
{
    protected function buildGuzzleFromResponses(array $responses, $history = null)
    {
        $mock = new MockHandler($responses);
        $handler = new HandlerStack($mock);
        if ($history) {
            $handler->push($history);
        }
        return new HttpClient(['handler' => $handler]);
    }
    protected function buildResponseFromStub($statusCode, array $headers, $responseFile)
    {
        $response = file_get_contents(dirname(__FILE__) . '/responses/' . $responseFile);
        return new Response($statusCode, $headers, $response);
    }
}
