<?php

/**
* Copyright (c) Microsoft Corporation.  All Rights Reserved.  Licensed under the MIT License.  See License in the project root for license information.
* 
* CalendarRoleType File
* PHP version 7
*
* @category  Library
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
namespace XCloner\Microsoft\Graph\Model;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
use XCloner\Microsoft\Graph\Core\Enum;
/**
* CalendarRoleType class
*
* @category  Model
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
class CalendarRoleType extends Enum
{
    /**
     * The Enum CalendarRoleType
     */
    const NONE = "none";
    const FREE_BUSY_READ = "freeBusyRead";
    const LIMITED_READ = "limitedRead";
    const READ = "read";
    const WRITE = "write";
    const DELEGATE_WITHOUT_PRIVATE_EVENT_ACCESS = "delegateWithoutPrivateEventAccess";
    const DELEGATE_WITH_PRIVATE_EVENT_ACCESS = "delegateWithPrivateEventAccess";
    const CUSTOM = "custom";
}
