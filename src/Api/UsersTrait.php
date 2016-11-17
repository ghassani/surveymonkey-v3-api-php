<?php
/*
* This file is part of the surveymonkey-v3-api-php package.
*
* (c) Gassan Idriss <ghassani@gmail.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*
* @author Gassan Idriss <ghassani@gmail.com>
*/

namespace Spliced\SurveyMonkey\Api;

/**
* User API Functions
*
* @see https://developer.surveymonkey.com/api/v3/#users-and-groups
*/
trait UsersTrait
{

	/**
	* getUser - Gets the current user information
	*
	* @return @see Client::sendRequest
	*/
	public function getUser()
	{
		return $this->sendRequest(
			$this->createRequest('GET', 'users/me', [])
		);
	}

	/**
	* getGroups - Gets all user groups
	*
	* @param array $filters - Available filters: page, per_page
	*
	* @return @see Client::sendRequest
	*/
	public function getGroups(array $filters = [])
	{
		return $this->sendRequest(
			$this->createRequest('GET', 'groups', [
				'query' => $filters
			])
		);
	}

	/**
	* getGroup - Gets a single user group resource
	*
	* @param int $groupId - The ID of the group to get information on
	*
	* @return @see Client::sendRequest
	*/
	public function getGroup($groupId)
	{
		return $this->sendRequest(
			$this->createRequest('GET', sprintf('groups/%d', $groupId))
		);
	}

	/**
	* getGroupMembers - Gets members associated for a specific group
	*
	* @param int $groupId - The ID of the group to get information on
	* @param array $filters - Available filters: page, per_page
	*
	* @return @see Client::sendRequest
	*/
	public function getGroupMembers($groupId,  array $filters = [])
	{
		return $this->sendRequest(
			$this->createRequest('GET', sprintf('groups/%d/members', $groupId), [
				'query' => $filters
			])
		);
	}

	/**
	* getGroupMembers - Gets a specific member information for a specific group
	*
	* @param int $groupId - The ID of the group to get information on
	* @param int $memberId - The ID of the member in the group to get information on
	*
	* @return @see Client::sendRequest
	*/
	public function getGroupMember($groupId, $memberId)
	{
		return $this->sendRequest(
			$this->createRequest('GET', sprintf('groups/%d/members/%d', $groupId, $memberId))
		);
	}
}