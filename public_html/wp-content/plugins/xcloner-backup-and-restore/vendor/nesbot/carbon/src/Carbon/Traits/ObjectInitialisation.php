<?php

/**
 * This file is part of the Carbon package.
 *
 * (c) Brian Nesbitt <brian@nesbot.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XCloner\Carbon\Traits;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
trait ObjectInitialisation
{
    /**
     * True when parent::__construct has been called.
     *
     * @var string
     */
    protected $constructedObjectId;
}
