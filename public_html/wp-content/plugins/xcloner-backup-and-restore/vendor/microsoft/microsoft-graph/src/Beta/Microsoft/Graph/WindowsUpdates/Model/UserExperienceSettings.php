<?php

/**
* Copyright (c) Microsoft Corporation.  All Rights Reserved.  Licensed under the MIT License.  See License in the project root for license information.
* 
* UserExperienceSettings File
* PHP version 7
*
* @category  Library
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
namespace XCloner\Beta\Microsoft\Graph\WindowsUpdates\Model;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
/**
* UserExperienceSettings class
*
* @category  Model
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
class UserExperienceSettings extends \XCloner\Beta\Microsoft\Graph\Model\Entity
{
    /**
     * Gets the daysUntilForcedReboot
     * Specifies the number of days after an update is installed, during which the user of the device can control when the device restarts.
     *
     * @return int|null The daysUntilForcedReboot
     */
    public function getDaysUntilForcedReboot()
    {
        if (array_key_exists("daysUntilForcedReboot", $this->_propDict)) {
            return $this->_propDict["daysUntilForcedReboot"];
        } else {
            return null;
        }
    }
    /**
     * Sets the daysUntilForcedReboot
     * Specifies the number of days after an update is installed, during which the user of the device can control when the device restarts.
     *
     * @param int $val The value of the daysUntilForcedReboot
     *
     * @return UserExperienceSettings
     */
    public function setDaysUntilForcedReboot($val)
    {
        $this->_propDict["daysUntilForcedReboot"] = $val;
        return $this;
    }
}
