<?php

/**
* Copyright (c) Microsoft Corporation.  All Rights Reserved.  Licensed under the MIT License.  See License in the project root for license information.
* 
* MediaSourceContentCategory File
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
* MediaSourceContentCategory class
*
* @category  Model
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
class MediaSourceContentCategory extends Enum
{
    /**
     * The Enum MediaSourceContentCategory
     */
    const MEETING = "meeting";
    const LIVE_STREAM = "liveStream";
    const PRESENTATION = "presentation";
    const SCREEN_RECORDING = "screenRecording";
    const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
