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
 * Workgroups API Functions
 *
 * @see https://developer.surveymonkey.com/api/v3/#organizations
 */
trait OrganizationsTrait
{
    /**
     * getWorkgroups
     *
     * @param array $filters - Available filters: page, per_page
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#workgroups
     */
    public function getWorkgroups(array $filters = [])
    {
        return $this->sendRequest(
            $this->createRequest('GET', 'workgroups', [
                'query' => $filters
            ])
        );
    }

    /**
     * createWorkgroup
     *
     * @param array $data - See API docs for fields
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#workgroups-workgroup_id
     */
    public function createWorkgroup(array $data)
    {
        return $this->sendRequest(
            $this->createRequest('POST', 'workgroups', [], $data)
        );
    }

    /**
     * getWorkgroup
     *
     * @param $workgroupId
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#workgroups-workgroup_id
     */
    public function getWorkgroup($workgroupId)
    {
        return $this->sendRequest(
            $this->createRequest('GET', sprintf('workgroups/%s', $workgroupId))
        );
    }

    /**
     * updateWorkgroup
     *
     * @param $workgroupId
     * @param $data
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#workgroups-workgroup_id
     */
    public function updateWorkgroup($workgroupId, array $data)
    {
        return $this->sendRequest(
            $this->createRequest('PATCH', sprintf('workgroups/%s', $workgroupId), [], $data)
        );
    }

    /**
     * deleteWorkgroup
     *
     * @param $workgroupId
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#workgroups-workgroup_id
     */
    public function deleteWorkgroup($workgroupId)
    {
        return $this->sendRequest(
            $this->createRequest('DELETE', sprintf('workgroups/%s', $workgroupId))
        );
    }

    /**
     * getWorkgroupMembers
     *
     * @param $workgroupId
     * @param $filters  - Available Fields:
     *      page, per_page
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#workgroups-workgroup_id-members
     */
    public function getWorkgroupMembers($workgroupId, array $filters = [])
    {
        return $this->sendRequest(
            $this->createRequest('GET', sprintf('workgroups/%s/members', $workgroupId))
        );
    }

    /**
     * createWorkgroupMember
     *
     * @param $workgroupId
     * @param $data
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#workgroups-workgroup_id-members
     */
    public function createWorkgroupMember($workgroupId, array $data)
    {
        return $this->sendRequest(
            $this->createRequest('POST', sprintf('workgroups/%s/members', $workgroupId), [], $data)
        );
    }

    /**
     * createWorkgroupMembers
     *
     * @param $workgroupId
     * @param $data
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#workgroups-workgroup_id-members-bulk
     */
    public function createWorkgroupMembers($workgroupId, array $data)
    {
        return $this->sendRequest(
            $this->createRequest('POST', sprintf('workgroups/%s/members/bulk', $workgroupId), [], $data)
        );
    }

    /**
     * getWorkgroupMember
     *
     * @param $workgroupId
     * @param $memberId
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#workgroups-workgroup_id-members-member_id
     */
    public function getWorkgroupMember($workgroupId, $memberId)
    {
        return $this->sendRequest(
            $this->createRequest('GET', sprintf('workgroups/%s/members/%s', $workgroupId, $memberId))
        );
    }

    /**
     * updateWorkgroupMember
     *
     * @param $workgroupId
     * @param $memberId
     * @param $data
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#workgroups-workgroup_id-members-member_id
     */
    public function updateWorkgroupMember($workgroupId, $memberId, array $data)
    {
        return $this->sendRequest(
            $this->createRequest('PATCH', sprintf('workgroups/%s/members/%s', $workgroupId, $memberId), [], $data)
        );
    }

    /**
     * deleteWorkgroupMember
     *
     * @param $workgroupId
     * @param $memberId
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#workgroups-workgroup_id-members-member_id
     */
    public function deleteWorkgroupMember($workgroupId, $memberId)
    {
        return $this->sendRequest(
            $this->createRequest('DELETE', sprintf('workgroups/%s/members/%s', $workgroupId, $memberId))
        );
    }

    /**
     * getWorkgroupShares
     *
     * @param $workgroupId
     * @param $filters - Available Filters:
     *      page, per_page, include
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#workgroups-workgroup_id-shares
     */
    public function getWorkgroupShares($workgroupId, array $filters = [])
    {
        return $this->sendRequest(
            $this->createRequest('GET', sprintf('workgroups/%s/shares', $workgroupId), [
                'query' => $filters
            ])
        );
    }

    /**
     * getWorkgroupShares
     *
     * @param $workgroupId
     * @param $data
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#workgroups-workgroup_id-shares
     */
    public function createWorkgroupShare($workgroupId, array $data)
    {
        return $this->sendRequest(
            $this->createRequest('POST', sprintf('workgroups/%s/shares', $workgroupId), [], $data)
        );
    }

    /**
     * getWorkgroupShares
     *
     * @param $workgroupId
     * @param $data
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#workgroups-workgroup_id-shares-bulk
     */
    public function createWorkgroupShares($workgroupId, array $data)
    {
        return $this->sendRequest(
            $this->createRequest('POST', sprintf('workgroups/%s/shares/bulk', $workgroupId), [], $data)
        );
    }

    /**
     * getWorkgroupShare
     *
     * @param $workgroupId
     * @param $shareId
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#workgroups-workgroup_id-shares-share_id
     */
    public function getWorkgroupShare($workgroupId, $shareId)
    {
        return $this->sendRequest(
            $this->createRequest('GET', sprintf('workgroups/%s/shares/%s', $workgroupId, $shareId))
        );
    }

    /**
     * deleteWorkgroupShare
     *
     * @param $workgroupId
     * @param $shareId
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#workgroups-workgroup_id-shares-share_id
     */
    public function deleteWorkgroupShare($workgroupId, $shareId)
    {
        return $this->sendRequest(
            $this->createRequest('DELETE', sprintf('workgroups/%s/shares/%s', $workgroupId, $shareId))
        );
    }

    /**
     * getRoles
     *
     * @param $filters - Available Filters:
     *      page, per_page
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#workgroups-workgroup_id-shares-share_id
     */
    public function getRoles(array $filters = [])
    {
        return $this->sendRequest(
            $this->createRequest('GET', 'roles', [
                'query' => $filters
            ])
        );
    }
}