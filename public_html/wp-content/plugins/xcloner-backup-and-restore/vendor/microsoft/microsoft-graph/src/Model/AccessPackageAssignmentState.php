<?php

/**
* Copyright (c) Microsoft Corporation.  All Rights Reserved.  Licensed under the MIT License.  See License in the project root for license information.
* 
* AccessPackageAssignmentState File
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
* AccessPackageAssignmentState class
*
* @category  Model
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
class AccessPackageAssignmentState extends Enum
{
    /**
     * The Enum AccessPackageAssignmentState
     */
    const DELIVERING = "delivering";
    const PARTIALLY_DELIVERED = "partiallyDelivered";
    const DELIVERED = "delivered";
    const EXPIRED = "expired";
    const DELIVERY_FAILED = "deliveryFailed";
    const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
