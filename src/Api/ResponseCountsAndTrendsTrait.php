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
 * Respponse Count and Trends API Functions
 *
 * @see https://developer.surveymonkey.com/api/v3/#response-counts-and-trends
 */
trait ResponseCountsAndTrendsTrait
{
    /**
     * getSurveyRollups Returns rollups for all questions in a survey.
     *
     * @param $surveyId
     * @param $filters - Available Filters:
     *      collector_ids, start_created_at, end_created_at
     *      start_modified_at, end_modified_at, status, email,
     *      first_name, last_name, ip, custom, total_time_max,
     *      total_time_min, total_time_units
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#surveys-id-rollups
     */
    public function getSurveyRollups($surveyId, array $filters = [])
    {
        return $this->sendRequest(
            $this->createRequest('GET', sprintf('surveys/%d/rollups', $surveyId), [
                'query' => $filters
            ])
        );
    }

    /**
     * getSurveyPageRollups
     *
     * @param $surveyId
     * @param $pageId
     * @param $filters - Available Filters:
     *      collector_ids, start_created_at, end_created_at
     *      start_modified_at, end_modified_at, status, email,
     *      first_name, last_name, ip, custom, total_time_max,
     *      total_time_min, total_time_units
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#surveys-id-pages-id-rollups
     */
    public function getSurveyPageRollups($surveyId, $pageId, array $filters = [])
    {
        return $this->sendRequest(
            $this->createRequest('GET', sprintf('surveys/%d/pages/%s/rollups', $surveyId, $pageId), [
                'query' => $filters
            ])
        );
    }

    /**
     * getSurveyPageQuestionRollups
     *
     * @param $surveyId
     * @param $pageId
     * @param $questionId
     * @param $filters - Available Filters:
     *      collector_ids, start_created_at, end_created_at
     *      start_modified_at, end_modified_at, status, email,
     *      first_name, last_name, ip, custom, total_time_max,
     *      total_time_min, total_time_units
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#surveys-id-pages-id-questions-id-rollups
     */
    public function getSurveyPageQuestionRollups($surveyId, $pageId, $questionId, array $filters = [])
    {
        return $this->sendRequest(
            $this->createRequest('GET', sprintf('surveys/%s/pages/%s/questions/%s/rollups', $surveyId, $pageId, $questionId), [
                'query' => $filters
            ])
        );
    }

    /**
     * getSurveyTrends Returns answer counts for a particular time periods
     *
     * @param $surveyId
     * @param $filters - Available Filters:
     *      first_respondent, last_respondnet, trend_by
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#surveys-id-trends
     */
    public function getSurveyTrends($surveyId, array $filters = [])
    {
        return $this->sendRequest(
            $this->createRequest('GET', sprintf('surveys/%s/trends', $surveyId), [
                'query' => $filters
            ])
        );
    }

    /**
     * getSurveyPageTrends
     *
     * @param $surveyId
     * @param $pageId
     * @param $filters - Available Filters:
     *      first_respondent, last_respondnet, trend_by
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#surveys-id-pages-id-trends
     */
    public function getSurveyPageTrends($surveyId, $pageId, array $filters = [])
    {
        return $this->sendRequest(
            $this->createRequest('GET', sprintf('surveys/%s/pages/%s/trends', $surveyId, $pageId), [
                'query' => $filters
            ])
        );
    }

    /**
     * getSurveyPageQuestionTrends
     *
     * @param $surveyId
     * @param $pageId
     * @param $questionId
     * @param $filters - Available Filters:
     *      first_respondent, last_respondnet, trend_by
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#surveys-id-trends
     */
    public function getSurveyPageQuestionTrends($surveyId, $pageId, $questionId, array $filters = [])
    {
        return $this->sendRequest(
            $this->createRequest('GET', sprintf('surveys/%s/pages/%s/questions/%s/trends', $surveyId, $pageId, $questionId), [
                'query' => $filters
            ])
        );
    }
}
