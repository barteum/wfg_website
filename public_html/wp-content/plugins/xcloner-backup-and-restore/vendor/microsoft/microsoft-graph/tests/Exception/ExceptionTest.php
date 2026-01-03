<?php

namespace XCloner;

if (!\defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
use XCloner\PHPUnit\Framework\TestCase;
use XCloner\Microsoft\Graph\Exception\GraphException;
class ExceptionTest extends TestCase
{
    public function testToString()
    {
        $exception = new GraphException('bad stuff', '404');
        $this->assertEquals("Microsoft\\Graph\\Exception\\GraphException: [404]: bad stuff\n", $exception->__toString());
    }
}
\class_alias('XCloner\ExceptionTest', 'ExceptionTest', \false);
