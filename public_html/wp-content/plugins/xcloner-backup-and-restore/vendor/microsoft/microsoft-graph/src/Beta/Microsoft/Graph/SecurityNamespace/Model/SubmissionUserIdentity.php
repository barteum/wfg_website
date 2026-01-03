<?php

/**
* Copyright (c) Microsoft Corporation.  All Rights Reserved.  Licensed under the MIT License.  See License in the project root for license information.
* 
* SubmissionUserIdentity File
* PHP version 7
*
* @category  Library
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
namespace XCloner\Beta\Microsoft\Graph\SecurityNamespace\Model;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
/**
* SubmissionUserIdentity class
*
* @category  Model
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
class SubmissionUserIdentity extends \XCloner\Beta\Microsoft\Graph\Model\Identity
{
    /**
     * Gets the email
     * The email of user who is making the submission when logged in (delegated token case).
     *
     * @return string|null The email
     */
    public function getEmail()
    {
        if (array_key_exists("email", $this->_propDict)) {
            return $this->_propDict["email"];
        } else {
            return null;
        }
    }
    /**
     * Sets the email
     * The email of user who is making the submission when logged in (delegated token case).
     *
     * @param string $val The value of the email
     *
     * @return SubmissionUserIdentity
     */
    public function setEmail($val)
    {
        $this->_propDict["email"] = $val;
        return $this;
    }
}
