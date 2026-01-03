<?php

declare (strict_types=1);
namespace XCloner\Sabre\CalDAV\Schedule;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
/**
 * The SchedulingObject represents a scheduling object in the Inbox collection.
 *
 * @license http://sabre.io/license/ Modified BSD License
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 */
interface ISchedulingObject extends \XCloner\Sabre\CalDAV\ICalendarObject
{
}
