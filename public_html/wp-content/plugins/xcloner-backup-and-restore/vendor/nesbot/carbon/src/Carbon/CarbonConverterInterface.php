<?php

/**
 * This file is part of the Carbon package.
 *
 * (c) Brian Nesbitt <brian@nesbot.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XCloner\Carbon;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
use DateTimeInterface;
interface CarbonConverterInterface
{
    public function convertDate(DateTimeInterface $dateTime, bool $negated = \false): CarbonInterface;
}
