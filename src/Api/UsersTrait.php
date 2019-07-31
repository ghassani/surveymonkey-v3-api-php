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
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#users-me
	 */
	public function getUser()
	{
		return $this->sendRequest(
			$this->createRequest('GET', 'users/me', [])
		);
	}

    /**
     * getUserShared - Returns the resources shared with a user across all workgroups
     *
     * @param int $userId
     * @param array $filters - Available filters: page, per_page, resource_type, resource_id, include
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#users-id-shared
     */
    public function getUserShared($userId, array $filters = [])
    {
        return $this->sendRequest(
            $this->createRequest('GET', sprintf('/users/%s/shared', $userId), [
                'query' => $filters
            ])
        );
    }

    /**
     * getUserShared - Returns the workgroups that a specific user is in
     *
     * @param int $userId
     * @param array $filters - Available filters: page, per_page
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#users-id-workgroups
     */
    public function getUserWorkgroups($userId, array $filters = [])
    {
        return $this->sendRequest(
            $this->createRequest('GET', sprintf('/users/%s/workgroups', $userId), [
                'query' => $filters
            ])
        );
    }

	/**
	 * getGroups - Gets all user groups
	 *
	 * @param array $filters - Available filters: page, per_page
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#groups
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
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#groups-id
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
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#groups-id-members
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
	 * getGroupMember - Gets a specific member information for a specific group
	 *
	 * @param int $groupId - The ID of the group to get information on
	 * @param int $memberId - The ID of the member in the group to get information on
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#groups-id-members-id
	 */
	public function getGroupMember($groupId, $memberId)
	{
		return $this->sendRequest(
			$this->createRequest('GET', sprintf('groups/%d/members/%d', $groupId, $memberId))
		);
	}
}