<?php

/**
* Copyright (c) Microsoft Corporation.  All Rights Reserved.  Licensed under the MIT License.  See License in the project root for license information.
* 
* MembershipRuleProcessingStatusDetails File
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
* MembershipRuleProcessingStatusDetails class
*
* @category  Model
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
class MembershipRuleProcessingStatusDetails extends Enum
{
    /**
     * The Enum MembershipRuleProcessingStatusDetails
     */
    const NOT_STARTED = "notStarted";
    const RUNNING = "running";
    const FAILED = "failed";
    const SUCCEEDED = "succeeded";
    const UNSUPPORTED_FUTURE_VALUE = "unsupportedFutureValue";
}
