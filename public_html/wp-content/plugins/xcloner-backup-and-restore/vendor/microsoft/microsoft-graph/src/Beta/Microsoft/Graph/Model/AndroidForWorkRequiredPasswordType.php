<?php

/**
* Copyright (c) Microsoft Corporation.  All Rights Reserved.  Licensed under the MIT License.  See License in the project root for license information.
* 
* AndroidForWorkRequiredPasswordType File
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
* AndroidForWorkRequiredPasswordType class
*
* @category  Model
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
class AndroidForWorkRequiredPasswordType extends Enum
{
    /**
     * The Enum AndroidForWorkRequiredPasswordType
     */
    const DEVICE_DEFAULT = "deviceDefault";
    const LOW_SECURITY_BIOMETRIC = "lowSecurityBiometric";
    const REQUIRED = "required";
    const AT_LEAST_NUMERIC = "atLeastNumeric";
    const NUMERIC_COMPLEX = "numericComplex";
    const AT_LEAST_ALPHABETIC = "atLeastAlphabetic";
    const AT_LEAST_ALPHANUMERIC = "atLeastAlphanumeric";
    const ALPHANUMERIC_WITH_SYMBOLS = "alphanumericWithSymbols";
}
