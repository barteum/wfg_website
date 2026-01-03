<?php

/**
* Copyright (c) Microsoft Corporation.  All Rights Reserved.  Licensed under the MIT License.  See License in the project root for license information.
* 
* ManagementProvider File
* PHP version 7
*
* @category  Library
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
namespace XCloner\Beta\Microsoft\Graph\ManagedTenants\Model;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
use XCloner\Microsoft\Graph\Core\Enum;
/**
* ManagementProvider class
*
* @category  Model
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
class ManagementProvider extends Enum
{
    /**
     * The Enum ManagementProvider
     */
    const MICROSOFT = "microsoft";
    const COMMUNITY = "community";
    const INDIRECT_PROVIDER = "indirectProvider";
    const SELF = "self";
    const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
