<?php

/**
* Copyright (c) Microsoft Corporation.  All Rights Reserved.  Licensed under the MIT License.  See License in the project root for license information.
* 
* CaseStatus File
* PHP version 7
*
* @category  Library
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
namespace XCloner\Microsoft\Graph\SecurityNamespace\Model;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
use XCloner\Microsoft\Graph\Core\Enum;
/**
* CaseStatus class
*
* @category  Model
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
class CaseStatus extends Enum
{
    /**
     * The Enum CaseStatus
     */
    const UNKNOWN = "unknown";
    const ACTIVE = "active";
    const PENDING_DELETE = "pendingDelete";
    const CLOSING = "closing";
    const CLOSED = "closed";
    const CLOSED_WITH_ERROR = "closedWithError";
    const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
