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
 * Survey Translation API Functions
 *
 * @see https://developer.surveymonkey.com/api/v3/#translations-for-multilingual-surveys
 */
trait TranslationsTrait
{
    /**
     * getSurveyTranslations - Returns all existing translations
     *
     * @param int $surveyId - The survey to get the page from
     * @param array $filters - Available filters: page, per_page
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#surveys-survey_id-languages
     */
    public function getSurveyTranslations($surveyId, array $filters = [])
    {
        return $this->sendRequest(
            $this->createRequest('GET', sprintf('surveys/%s/languages', $surveyId), [ 'query' => $filters ])
        );
    }

    /**
     * getSurveyTranslation - Returns existing translations or the translation structure
     *
     * @param int $surveyId - The survey to get the page from
     * @param string $languageCode - The language code of the translation
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#surveys-survey_id-languages-language_code
     */
    public function getSurveyTranslation($surveyId, $languageCode)
    {
        return $this->sendRequest(
            $this->createRequest('GET', sprintf('surveys/%s/languages/%s', $surveyId, $languageCode))
        );
    }

    /**
     * createSurveyTranslation
     *
     * @param int $surveyId - The survey to get the page from
     * @param string $languageCode - The language code of the translation
     * @param array $data - See the API documentation for fields
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#surveys-survey_id-languages-language_code
     */
    public function createSurveyTranslation($surveyId, $languageCode, array $data)
    {
        return $this->sendRequest(
            $this->createRequest('POST', sprintf('surveys/%s/languages/%s', $surveyId, $languageCode), [], $data)
        );
    }

    /**
     * updateSurveyTranslation
     *
     * @param int $surveyId - The survey to get the page from
     * @param string $languageCode - The language code of the translation
     * @param array $data - See the API documentation for fields
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#surveys-survey_id-languages-language_code
     */
    public function updateSurveyTranslation($surveyId, $languageCode, array $data)
    {
        return $this->sendRequest(
            $this->createRequest('PATCH', sprintf('surveys/%s/languages/%s', $surveyId, $languageCode), [], $data)
        );
    }

    /**
     * deleteSurveyTranslation
     *
     * @param int $surveyId - The survey to get the page from
     * @param string $languageCode - The language code of the translation
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#surveys-survey_id-languages-language_code
     */
    public function deleteSurveyTranslation($surveyId, $languageCode)
    {
        return $this->sendRequest(
            $this->createRequest('DELETE', sprintf('surveys/%s/languages/%s', $surveyId, $languageCode))
        );
    }
}