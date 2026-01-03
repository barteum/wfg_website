<?php

/**
* Copyright (c) Microsoft Corporation.  All Rights Reserved.  Licensed under the MIT License.  See License in the project root for license information.
* 
* DeviceManagementComplianceActionType File
* PHP version 7
*
* @category  Library
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
namespace XCloner\Beta\Microsoft\Graph\Model;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
use XCloner\Microsoft\Graph\Core\Enum;
/**
* DeviceManagementComplianceActionType class
*
* @category  Model
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
class DeviceManagementComplianceActionType extends Enum
{
    /**
     * The Enum DeviceManagementComplianceActionType
     */
    const NO_ACTION = "noAction";
    const NOTIFICATION = "notification";
    const BLOCK = "block";
    const RETIRE = "retire";
    const WIPE = "wipe";
    const REMOVE_RESOURCE_ACCESS_PROFILES = "removeResourceAccessProfiles";
    const PUSH_NOTIFICATION = "pushNotification";
    const REMOTE_LOCK = "remoteLock";
}
