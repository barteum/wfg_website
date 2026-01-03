<?php

namespace XCloner\Sabre\VObject\TimezoneGuesser;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
use DateTimeZone;
use XCloner\Sabre\VObject\Component\VTimeZone;
interface TimezoneGuesser
{
    public function guess(VTimeZone $vtimezone, bool $failIfUncertain = \false): ?DateTimeZone;
}
