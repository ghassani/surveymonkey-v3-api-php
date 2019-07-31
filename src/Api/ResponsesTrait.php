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
 * Response API Functions
 *
 * @see https://developer.surveymonkey.com/api/v3/#survey-responses
 */
trait ResponsesTrait
{
    /**
     * getSurveyResponses
     *
     * @param $surveyId
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#surveys-id-responses
     */
    public function getSurveyResponses($surveyId)
    {
        return $this->sendRequest(
            $this->createRequest('GET', sprintf('surveys/%d/responses', $surveyId))
        );
    }

    /**
     * getCollectorResponses
     *
     * @param $collectorId
     * @param $filters - Available filters:
     *      survey_id, collector_id, recipient_id,
     *      total_time, custom_value, edit_url,
     *      analyze_url, ip_address, custom_variables,
     *      logic_path, metadata, response_status,
     *      page_path, collection_mode, date_created,
     *      date_modified
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#collectors-id-responses
     */
    public function getCollectorResponses($collectorId, array $filters = [])
    {
        return $this->sendRequest(
            $this->createRequest('GET', sprintf('collectors/%d/responses', $collectorId), [
                'query' => $filters
            ])
        );
    }


    /**
     * createCollectorResponse
     *
     * @param $collectorId
     * @param $data - See API docs for available fields
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#collectors-id-responses
     */
    public function createCollectorResponse($collectorId, array $data = [])
    {
        return $this->sendRequest(
            $this->createRequest('POST', sprintf('collectors/%d/responses', $collectorId), [], $data)
        );
    }

    /**
     * getSurveyResponsesBulk
     *
     * @param $surveyId
     * @param $filters - Available filters:
     *							page_ids, question_ids
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#surveys-id-responses-bulk
     */
    public function getSurveyResponsesBulk($surveyId, array $filters = [])
    {
        return $this->sendRequest(
            $this->createRequest('GET', sprintf('surveys/%d/responses/bulk', $surveyId), [
                'query' => $filters
            ])
        );
    }

    /**
     * getCollectorResponsesBulk
     *
     * @param $collectorId
     * @param $filters - Available filters:
     *      page, per_page, collector_ids, start_created_at, end_created_at
     *      start_modified_at, end_modified_at, status, email, first_name,
     *      last_name, ip, custom, total_time_max, total_time_min, total_time_units,
     *      sort_order, sort_by, page_ids, question_ids
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#collectors-id-responses-bulk
     */
    public function getCollectorResponsesBulk($collectorId, array $filters = [])
    {
        return $this->sendRequest(
            $this->createRequest('GET', sprintf('collectors/%d/responses/bulk', $collectorId), [
                'query' => $filters
            ])
        );
    }

    /**
     * getSurveyResponse
     *
     * @param $surveyId
     * @param $responseId
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#surveys-id-responses-bulk
     */
    public function getSurveyResponse($surveyId, $responseId)
    {
        return $this->sendRequest(
            $this->createRequest('GET', sprintf('surveys/%d/responses/%s', $surveyId, $responseId))
        );
    }

    /**
     * @param $surveyId
     * @param $responseId
     * @param $filters - Available Filters:
     *      page_ids, question_ids
     * @return mixed
     *
     * @see https://developer.surveymonkey.com/api/v3/#collectors-id-responses-id-details
     */
    public function getSurveyResponseDetails($surveyId, $responseId, array $filters = [])
    {
        return $this->sendRequest(
            $this->createRequest('GET', sprintf('surveys/%d/responses/%s/details', $surveyId, $responseId), [
                'query' => $filters
            ])
        );
    }

    /**
     * updateSurveyResponse
     *
     * @param $surveyId
     * @param $responseId
     * @param $data - See API docs for available fields
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#surveys-id-responses-id
     */
    public function updateSurveyResponse($surveyId, $responseId, array $data = [])
    {
        return $this->sendRequest(
            $this->createRequest('PATCH', sprintf('surveys/%s/responses/%s', $surveyId, $responseId), [], $data)
        );
    }

    /**
     * replaceSurveyResponse
     *
     * @param $surveyId
     * @param $responseId
     * @param $data - See API docs for available fields
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#surveys-id-responses-id
     */
    public function replaceSurveyResponse($surveyId, $responseId, array $data = [])
    {
        return $this->sendRequest(
            $this->createRequest('PUT', sprintf('surveys/%s/responses/%s', $surveyId, $responseId), [], $data)
        );
    }

    /**
     * deleteSurveyResponse
     *
     * @param $surveyId
     * @param $responseId
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#surveys-id-responses-id
     */
    public function deleteSurveyResponse($surveyId, $responseId)
    {
        return $this->sendRequest(
            $this->createRequest('DELETE', sprintf('surveys/%s/responses/%s', $surveyId, $responseId))
        );
    }

    /**
     * @param $collectorId
     * @param $responseId
     * @return mixed
     *
     * @see https://developer.surveymonkey.com/api/v3/#collectors-id-responses-id
     */
    public function getCollectorResponse($collectorId, $responseId)
    {
        return $this->sendRequest(
            $this->createRequest('GET', sprintf('collectors/%d/responses/%s', $collectorId, $responseId))
        );
    }

    /**
     * @param $collectorId
     * @param $responseId
     * @param $filters - Available Filters:
     *      page_ids, question_ids
     * @return mixed
     *
     * @see https://developer.surveymonkey.com/api/v3/#collectors-id-responses-id-details
     */
    public function getCollectorResponseDetails($collectorId, $responseId, array $filters = [])
    {
        return $this->sendRequest(
            $this->createRequest('GET', sprintf('collectors/%d/responses/%s/details', $collectorId, $responseId))
        );
    }

    /**
     * updateCollectorResponse
     *
     * @param $collectorId
     * @param $responseId
     * @param $data - See API docs for available fields
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#collectors-id-responses-id
     */
    public function updateCollectorResponse($collectorId, $responseId, array $data = [])
    {
        return $this->sendRequest(
            $this->createRequest('PATCH', sprintf('collectors/%s/responses/%s', $collectorId, $responseId), [], $data)
        );
    }

    /**
     * replaceCollectorResponse
     *
     * @param $collectorId
     * @param $responseId
     * @param $data - See API docs for available fields
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#collectors-id-responses-id
     */
    public function replaceCollectorResponse($collectorId, $responseId, array $data = [])
    {
        return $this->sendRequest(
            $this->createRequest('PUT', sprintf('collectors/%s/responses/%s', $collectorId, $responseId), [], $data)
        );
    }

    /**
     * deleteCollectorResponse
     *
     * @param $collectorId
     * @param $responseId
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#collectors-id-responses-id
     */
    public function deleteCollectorResponse($collectorId, $responseId)
    {
        return $this->sendRequest(
            $this->createRequest('DELETE', sprintf('collectors/%s/responses/%s', $collectorId, $responseId))
        );
    }
}
