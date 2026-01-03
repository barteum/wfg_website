<?php

declare (strict_types=1);
namespace XCloner\Sabre\CalDAV\Schedule;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
/**
 * Implement this interface to have a node be recognized as a CalDAV scheduling
 * inbox.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
interface IInbox extends \XCloner\Sabre\CalDAV\ICalendarObjectContainer, \XCloner\Sabre\DAVACL\IACL
{
}
