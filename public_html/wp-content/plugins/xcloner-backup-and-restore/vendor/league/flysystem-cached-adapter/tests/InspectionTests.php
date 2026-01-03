<?php

namespace XCloner;

if (!\defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
use XCloner\League\Flysystem\Cached\CachedAdapter;
use XCloner\PHPUnit\Framework\TestCase;
class InspectionTests extends TestCase
{
    public function testGetAdapter()
    {
        $adapter = Mockery::mock('XCloner\League\Flysystem\AdapterInterface');
        $cache = Mockery::mock('XCloner\League\Flysystem\Cached\CacheInterface');
        $cache->shouldReceive('load')->once();
        $cached_adapter = new CachedAdapter($adapter, $cache);
        $this->assertInstanceOf('XCloner\League\Flysystem\AdapterInterface', $cached_adapter->getAdapter());
    }
}
\class_alias('XCloner\InspectionTests', 'InspectionTests', \false);
