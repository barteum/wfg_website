<?php

declare (strict_types=1);
namespace XCloner\Sabre\HTTP;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
class ResponseTest extends \XCloner\PHPUnit\Framework\TestCase
{
    public function testConstruct()
    {
        $response = new Response(200, ['Content-Type' => 'text/xml']);
        $this->assertEquals(200, $response->getStatus());
        $this->assertEquals('OK', $response->getStatusText());
    }
    public function testSetStatus()
    {
        $response = new Response();
        $response->setStatus('402 Where\'s my money?');
        $this->assertEquals(402, $response->getStatus());
        $this->assertEquals('Where\'s my money?', $response->getStatusText());
    }
    public function testInvalidStatus()
    {
        $this->expectException('InvalidArgumentException');
        $response = new Response(1000);
    }
    public function testToString()
    {
        $response = new Response(200, ['Content-Type' => 'text/xml']);
        $response->setBody('foo');
        $expected = "HTTP/1.1 200 OK\r\n" . "Content-Type: text/xml\r\n" . "\r\n" . 'foo';
        $this->assertEquals($expected, (string) $response);
    }
}
