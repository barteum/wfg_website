<?php

/**
 * This file is part of vfsStream.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package  org\bovigo\vfs
 */
namespace XCloner\org\bovigo\vfs;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
/**
 * Test for org\bovigo\vfs\vfsStream.
 *
 * @since       0.9.0
 * @group       issue_2
 */
class vfsStreamGlobTestCase extends \XCloner\BC_PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function globDoesNotWorkWithVfsStreamUrls()
    {
        $root = vfsStream::setup('example');
        mkdir(vfsStream::url('example/test/'), 0777, \true);
        $this->assertEmpty(glob(vfsStream::url('example'), \GLOB_MARK));
    }
}
