<?php

namespace XCloner;

if (!\defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
use XCloner\PHPUnit\Framework\TestCase;
use XCloner\Microsoft\Graph\Graph;
use XCloner\Microsoft\Graph\Http\GraphRequest;
use XCloner\Microsoft\Graph\Exception\GraphException;
use XCloner\org\bovigo\vfs\vfsStream;
use XCloner\org\bovigo\vfs\vfsStreamFile;
use XCloner\org\bovigo\vfs\vfsStreamWrapper;
use XCloner\org\bobigo\vfs\vfsStreamDirectory;
class StreamTest extends TestCase
{
    private $root;
    private $client;
    private $body;
    private $container;
    public function setUp(): void
    {
        $this->root = vfsStream::setup('testDir');
        $this->body = \json_encode(array('body' => 'content'));
        $stream = GuzzleHttp\Psr7\Utils::streamFor('content');
        $mock = new GuzzleHttp\Handler\MockHandler([new GuzzleHttp\Psr7\Response(200, ['foo' => 'bar'], $this->body), new GuzzleHttp\Psr7\Response(200, ['foo' => 'bar'], $stream), new GuzzleHttp\Psr7\Response(200, ['foo' => 'bar'], 'hello')]);
        $this->container = [];
        $history = GuzzleHttp\Middleware::history($this->container);
        $handler = GuzzleHttp\HandlerStack::create($mock);
        $handler->push($history);
        $this->client = new GuzzleHttp\Client(['handler' => $handler]);
    }
    public function testUpload()
    {
        $file = new VfsStreamFile('foo.txt');
        $this->root->addChild($file);
        $file->setContent('data');
        $request = new GraphRequest("GET", "/me", "token", "url", "v1.0");
        $request->upload($file->url(), $this->client);
        $this->assertEquals($this->container[0]['request']->getBody()->getContents(), $file->getContent());
    }
    public function testInvalidUpload()
    {
        $this->expectException(Microsoft\Graph\Exception\GraphException::class);
        $file = new VfsStreamFile('foo.txt', 00);
        $this->root->addChild($file);
        $request = new GraphRequest("GET", "/me", "token", "url", "v1.0");
        $request->upload($file->url(), $this->client);
    }
    public function testDownload()
    {
        $request = new GraphRequest("GET", "/me", "token", "url", "v1.0");
        $file = new VfsStreamFile('foo.txt');
        $this->root->addChild($file);
        $request->download($file->url(), $this->client);
        $this->assertEquals($this->body, $file->getContent());
    }
    public function testInvalidDownload()
    {
        \set_error_handler(function () {
        });
        try {
            $this->expectException(Microsoft\Graph\Exception\GraphException::class);
            $file = new VfsStreamFile('foo.txt', 00);
            $this->root->addChild($file);
            $request = new GraphRequest("GET", "/me", "token", "url", "v1.0");
            $request->download($file->url(), $this->client);
        } finally {
            \restore_error_handler();
        }
    }
    public function testSetReturnStream()
    {
        $request = new GraphRequest("GET", "/me", "token", "url", "v1.0");
        $request->setReturnType(GuzzleHttp\Psr7\Stream::class);
        $this->assertTrue($request->getReturnsStream());
        $response = $request->execute($this->client);
        $this->assertInstanceOf(GuzzleHttp\Psr7\Stream::class, $response);
        $response = $request->execute($this->client);
        $this->assertInstanceOf(GuzzleHttp\Psr7\Stream::class, $response);
    }
}
\class_alias('XCloner\StreamTest', 'StreamTest', \false);
