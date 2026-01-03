<?php

/**
* Copyright (c) Microsoft Corporation.  All Rights Reserved.  Licensed under the MIT License.  See License in the project root for license information.
* 
* ApplicationPermissionsRequired File
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
* ApplicationPermissionsRequired class
*
* @category  Model
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
class ApplicationPermissionsRequired extends Enum
{
    /**
     * The Enum ApplicationPermissionsRequired
     */
    const UNKNOWN = "unknown";
    const ANONYMOUS = "anonymous";
    const GUEST = "guest";
    const USER = "user";
    const ADMINISTRATOR = "administrator";
    const SYSTEM = "system";
    const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
