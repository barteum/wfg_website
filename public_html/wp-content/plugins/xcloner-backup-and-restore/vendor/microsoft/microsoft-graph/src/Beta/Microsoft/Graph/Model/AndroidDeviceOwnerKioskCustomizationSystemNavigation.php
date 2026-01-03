<?php

/**
* Copyright (c) Microsoft Corporation.  All Rights Reserved.  Licensed under the MIT License.  See License in the project root for license information.
* 
* AndroidDeviceOwnerKioskCustomizationSystemNavigation File
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
* AndroidDeviceOwnerKioskCustomizationSystemNavigation class
*
* @category  Model
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
class AndroidDeviceOwnerKioskCustomizationSystemNavigation extends Enum
{
    /**
     * The Enum AndroidDeviceOwnerKioskCustomizationSystemNavigation
     */
    const NOT_CONFIGURED = "notConfigured";
    const NAVIGATION_ENABLED = "navigationEnabled";
    const HOME_BUTTON_ONLY = "homeButtonOnly";
}
