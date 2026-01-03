<?php

/**
* Copyright (c) Microsoft Corporation.  All Rights Reserved.  Licensed under the MIT License.  See License in the project root for license information.
* 
* EducationAssignmentPointsGrade File
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
/**
* EducationAssignmentPointsGrade class
*
* @category  Model
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
class EducationAssignmentPointsGrade extends EducationAssignmentGrade
{
    /**
     * Gets the points
     * Number of points a teacher is giving this submission object.
     *
     * @return float|null The points
     */
    public function getPoints()
    {
        if (array_key_exists("points", $this->_propDict)) {
            return $this->_propDict["points"];
        } else {
            return null;
        }
    }
    /**
     * Sets the points
     * Number of points a teacher is giving this submission object.
     *
     * @param float $val The value of the points
     *
     * @return EducationAssignmentPointsGrade
     */
    public function setPoints($val)
    {
        $this->_propDict["points"] = $val;
        return $this;
    }
}
