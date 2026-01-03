<?php

/**
* Copyright (c) Microsoft Corporation.  All Rights Reserved.  Licensed under the MIT License.  See License in the project root for license information.
* 
* AppCatalogs File
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
/**
* AppCatalogs class
*
* @category  Model
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
class AppCatalogs extends Entity
{
    /**
     * Gets the teamsApps
     *
     * @return array|null The teamsApps
     */
    public function getTeamsApps()
    {
        if (array_key_exists("teamsApps", $this->_propDict)) {
            return $this->_propDict["teamsApps"];
        } else {
            return null;
        }
    }
    /**
     * Sets the teamsApps
     *
     * @param TeamsApp[] $val The teamsApps
     *
     * @return AppCatalogs
     */
    public function setTeamsApps($val)
    {
        $this->_propDict["teamsApps"] = $val;
        return $this;
    }
}
