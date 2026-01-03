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
 * Exception for vfsStream errors.
 *
 * @api
 */
class vfsStreamException extends \Exception
{
    // intentionally empty
}
