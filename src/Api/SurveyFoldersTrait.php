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
 * Survey Folders API Functions
 *
 * @see https://developer.surveymonkey.com/api/v3/#survey-folders
 */
trait SurveyFoldersTrait
{
    /**
     * getSurveyFolders - Returns available folders
     *
     * @param array $filters - Available filters: page, per_page
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#survey_folders
     */
    public function getSurveyFolders(array $filters = [])
    {
        return $this->sendRequest(
            $this->createRequest('GET', 'survey_folders', [ 'query' => $filters ])
        );
    }

    /**
     * getSurveyFolders - Returns available folders
     *
     * @param array $filters - Available filters: page, per_page
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#survey_folders
     */
    public function createSurveyFolder(array $data = [])
    {
        return $this->sendRequest(
            $this->createRequest('POST', 'survey_folders', [], $data)
        );
    }
}