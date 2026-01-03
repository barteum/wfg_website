<?php

/**
* Copyright (c) Microsoft Corporation.  All Rights Reserved.  Licensed under the MIT License.  See License in the project root for license information.
* 
* Modality File
* PHP version 7
*
* @category  Library
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
namespace XCloner\Beta\Microsoft\Graph\CallRecords\Model;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
use XCloner\Microsoft\Graph\Core\Enum;
/**
* Modality class
*
* @category  Model
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
class Modality extends Enum
{
    /**
     * The Enum Modality
     */
    const AUDIO = "audio";
    const VIDEO = "video";
    const VIDEO_BASED_SCREEN_SHARING = "videoBasedScreenSharing";
    const DATA = "data";
    const SCREEN_SHARING = "screenSharing";
    const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
