<?php

namespace XCloner\Sabre\VObject\TimezoneGuesser;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
use DateTimeZone;
interface TimezoneFinder
{
    public function find(string $tzid, bool $failIfUncertain = \false): ?DateTimeZone;
}
