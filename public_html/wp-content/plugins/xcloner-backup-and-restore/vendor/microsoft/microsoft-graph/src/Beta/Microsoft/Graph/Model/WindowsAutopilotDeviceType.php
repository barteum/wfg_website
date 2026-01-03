<?php

/**
* Copyright (c) Microsoft Corporation.  All Rights Reserved.  Licensed under the MIT License.  See License in the project root for license information.
* 
* WindowsAutopilotDeviceType File
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
* WindowsAutopilotDeviceType class
*
* @category  Model
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
class WindowsAutopilotDeviceType extends Enum
{
    /**
     * The Enum WindowsAutopilotDeviceType
     */
    const WINDOWS_PC = "windowsPc";
    const SURFACE_HUB2 = "surfaceHub2";
    const HOLO_LENS = "holoLens";
    const SURFACE_HUB2_S = "surfaceHub2S";
    const VIRTUAL_MACHINE = "virtualMachine";
    const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
