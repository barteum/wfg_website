<?php

/**
* Copyright (c) Microsoft Corporation.  All Rights Reserved.  Licensed under the MIT License.  See License in the project root for license information.
* 
* MobileThreatDefensePartnerPriority File
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
* MobileThreatDefensePartnerPriority class
*
* @category  Model
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
class MobileThreatDefensePartnerPriority extends Enum
{
    /**
     * The Enum MobileThreatDefensePartnerPriority
     */
    const DEFENDER_OVER_THIRD_PARTY_PARTNER = "defenderOverThirdPartyPartner";
    const THIRD_PARTY_PARTNER_OVER_DEFENDER = "thirdPartyPartnerOverDefender";
    const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
