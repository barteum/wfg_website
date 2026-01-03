<?php

/**
* Copyright (c) Microsoft Corporation.  All Rights Reserved.  Licensed under the MIT License.  See License in the project root for license information.
* 
* DataSubjectType File
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
* DataSubjectType class
*
* @category  Model
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
class DataSubjectType extends Enum
{
    /**
     * The Enum DataSubjectType
     */
    const CUSTOMER = "customer";
    const CURRENT_EMPLOYEE = "currentEmployee";
    const FORMER_EMPLOYEE = "formerEmployee";
    const PROSPECTIVE_EMPLOYEE = "prospectiveEmployee";
    const STUDENT = "student";
    const TEACHER = "teacher";
    const FACULTY = "faculty";
    const OTHER = "other";
    const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
