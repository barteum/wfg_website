<?php

/**
* Copyright (c) Microsoft Corporation.  All Rights Reserved.  Licensed under the MIT License.  See License in the project root for license information.
* 
* WindowsUpdateType File
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
* WindowsUpdateType class
*
* @category  Model
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
class WindowsUpdateType extends Enum
{
    /**
     * The Enum WindowsUpdateType
     */
    const USER_DEFINED = "userDefined";
    const ALL = "all";
    const BUSINESS_READY_ONLY = "businessReadyOnly";
    const WINDOWS_INSIDER_BUILD_FAST = "windowsInsiderBuildFast";
    const WINDOWS_INSIDER_BUILD_SLOW = "windowsInsiderBuildSlow";
    const WINDOWS_INSIDER_BUILD_RELEASE = "windowsInsiderBuildRelease";
}
