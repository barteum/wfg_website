<?php

/**
* Copyright (c) Microsoft Corporation.  All Rights Reserved.  Licensed under the MIT License.  See License in the project root for license information.
* 
* WindowsVpnConnectionType File
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
* WindowsVpnConnectionType class
*
* @category  Model
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
class WindowsVpnConnectionType extends Enum
{
    /**
     * The Enum WindowsVpnConnectionType
     */
    const PULSE_SECURE = "pulseSecure";
    const F5_EDGE_CLIENT = "f5EdgeClient";
    const DELL_SONIC_WALL_MOBILE_CONNECT = "dellSonicWallMobileConnect";
    const CHECK_POINT_CAPSULE_VPN = "checkPointCapsuleVpn";
}
