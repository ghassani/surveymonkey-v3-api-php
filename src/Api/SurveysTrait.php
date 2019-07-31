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
 * Survey API Functions
 *
 * @see https://developer.surveymonkey.com/api/v3/#surveys-pages-and-questions
 */
trait SurveysTrait
{
	/**
	 * getSurveys - Get a paginated list of all surveys
	 *
	 * @param array $filters - Available filters: page, per_page
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#surveys
	 */
	public function getSurveys(array $filters = [])
	{
		return $this->sendRequest(
			$this->createRequest('GET', 'surveys', [ 'query' => $filters ])
		);
	}

	/**
	 * createSurvey - Create a new survey
	 *
	 * @param array $data - See API docs for available fields
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#surveys
	 */
	public function createSurvey(array $data = [])
	{
		return $this->sendRequest(
			$this->createRequest('POST', 'surveys', [], $data)
		);
	}

	/**
	 * createSurveyFromTemplate - Create a new survey from an existing template
	 *
	 * @param int $templateId - See template ID to use
	 * @param array $data - See API docs for available fields
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#surveys
	 */
	public function createSurveyFromTemplate($templateId, array $data = [])
	{
		return $this->sendRequest(
			$this->createRequest('POST', 'surveys', [], array_merge($data, [ 'from_template_id' => $templateId ]))
		);
	}

	/**
	 * createSurveyFromTemplate - Create a new survey from an existing survey
	 *
	 * @param int $surveyId - See survey ID to use
	 * @param array $data - See API docs for available fields
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#surveys
	 */
	public function createSurveyFromExisting($surveyId, array $data = [])
	{
		return $this->sendRequest(
			$this->createRequest('POST', 'surveys', [], array_merge($data, [ 'from_survey_id' => $surveyId ]))
		);
	}

	/**
	 * getSurvey - Get information on a survey
	 *
	 * @param int $surveyId - See survey ID to use
	 * @param bool $includePages - Include page details or not
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#surveys-id
	 */
	public function getSurvey($surveyId)
	{
        return $this->sendRequest(
            $this->createRequest('GET', sprintf('surveys/%d', $surveyId))
        );
	}

    /**
     * getSurvey - Get information on a survey
     *
     * @param int $surveyId - See survey ID to use
     * @param bool $includePages - Include page details or not
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#surveys-id-details
     */
    public function getSurveyDetails($surveyId)
    {
        return $this->sendRequest(
            $this->createRequest('GET', sprintf('surveys/%d/details', $surveyId))
        );
    }

	/**
	 * updateSurvey - Updates a survey
	 *
	 * @param int $surveyId - The survey to update
	 * @param array $data - See API docs for available fields
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#surveys-id
	 */
	public function updateSurvey($surveyId, array $data = [])
	{
		return $this->sendRequest(
			$this->createRequest('PATCH', sprintf('surveys/%d', $surveyId), [], $data)
		);
	}

	/**
	 * replaceSurvey - Replaces a survey
	 *
	 * @param int $surveyId - The survey to replace
	 * @param array $data - See API docs for available fields
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#surveys-id
	 */
	public function replaceSurvey($surveyId, array $data = [])
	{
		return $this->sendRequest(
			$this->createRequest('PUT', sprintf('surveys/%d', $surveyId), [], $data)
		);
	}

	/**
	 * deleteSurvey - Deletes a survey
	 *
	 * @param int $surveyId - The survey to replace
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#surveys-id
	 */
	public function deleteSurvey($surveyId)
	{
		return $this->sendRequest(
			$this->createRequest('DELETE', sprintf('surveys/%d', $surveyId))
		);
	}

	/**
	 * getSurveyCategories - Gets all survey categories
	 *
	 * @param array $filters - Available filters: page, per_page, language
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#survey_categories
	 */
	public function getSurveyCategories(array $filters = [])
	{
		return $this->sendRequest(
			$this->createRequest('GET', 'survey_categories', [ 
				'query' => $filters 
			])
		);
	}

	/**
	 * getSurveyTemplates - Gets all survey templates
	 *
	 * @param array $filters - Available filters: page, per_page
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#survey_templates
	 */
	public function getSurveyTemplates(array $filters = [])
	{
		return $this->sendRequest(
			$this->createRequest('GET', 'survey_templates', [ 
				'query' => $filters 
			])
		);
	}

    /**
     * getSurveyLanguages - Gets all survey languages
     *
     * @param array $filters - Available filters: page, per_page
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#survey_languages
     */
    public function getSurveyLanguages(array $filters = [])
    {
        return $this->sendRequest(
            $this->createRequest('GET', 'survey_languages', [
                'query' => $filters
            ])
        );
    }

	/**
	 * getSurveyPages - Gets all pages for a given survey
	 *
	 * @param int $surveyId - The survey to get the pages from
	 * @param array $filters - Available filters: page, per_page
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#surveys-id-pages
	*/
	public function getSurveyPages($surveyId, array $filters = [])
	{
		return $this->sendRequest(
			$this->createRequest('GET', sprintf('surveys/%d/pages', $surveyId), [ 
				'query' => $filters 
			])
		);
	}

	/**
	 * createSurveyPage - Creates a new survey page
	 *
	 * @param int $surveyId - The survey to get the pages from
	 * @param array $data - See API docs for available fields
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#surveys-id-pages
	 */
	public function createSurveyPage($surveyId, array $data = [])
	{
		return $this->sendRequest(
			$this->createRequest('POST', sprintf('surveys/%d/pages', $surveyId), [], $data)
		);
	}

	/**
	 * getSurveyPage - Get a single survey page
	 *
	 * @param int $surveyId - The survey to get the page from
	 * @param int $pageId - The page to get
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#surveys-id-pages-id
	 */
	public function getSurveyPage($surveyId, $pageId)
	{
		return $this->sendRequest(
			$this->createRequest('GET', sprintf('surveys/%d/pages/%d', $surveyId, $pageId))
		);
	}

	/**
	 * updateSurveyPage - Updates a survey page
	 *
	 * @param int $surveyId - The survey to get the page from
	 * @param int $pageId - The page to update
	 * @param array $data - See API docs for available fields
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#surveys-id-pages-id
	 */
	public function updateSurveyPage($surveyId, $pageId, array $data = [])
	{
		return $this->sendRequest(
			$this->createRequest('PATCH', sprintf('surveys/%d/pages/%d', $surveyId, $pageId), [], $data)
		);
	}

	/**
	 * replaceSurveyPage - Replaces a survey page
	 *
	 * @param int $surveyId - The survey to get the page from
	 * @param int $pageId - The page to replace
	 * @param array $data - See API docs for available fields
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#surveys-id-pages-id
	 */
	public function replaceSurveyPage($surveyId, $pageId, array $data = [])
	{
		return $this->sendRequest(
			$this->createRequest('PUT', sprintf('surveys/%d/pages/%d', $surveyId, $pageId), [], $data)
		);
	}

	/**
	 * deleteSurveyPage - Delete a survey page
	 *
	 * @param int $surveyId - The survey to get the page from
	 * @param int $pageId - The page to delete
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#surveys-id-pages-id
	 */
	public function deleteSurveyPage($surveyId, $pageId)
	{
		return $this->sendRequest(
			$this->createRequest('DELETE', sprintf('surveys/%d/pages/%d', $surveyId, $pageId))
		);
	}

	/**
	 * getSurveyPageQuestions - Get questions for a given survey page
	 *
	 * @param int $surveyId - The survey to get the page from
	 * @param int $pageId - The page to get the qeustions from
	 * @param array $filters - Available filters: page, per_page
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#surveys-id-pages-id-questions
	 */
	public function getSurveyPageQuestions($surveyId, $pageId, array $filters = [])
	{
		return $this->sendRequest(
			$this->createRequest('GET', sprintf('surveys/%d/pages/%d/questions', $surveyId, $pageId), [ 
				'query' => $filters 
			])
		);		
	}

	/**
	 * createSurveyPageQuestion - Create a questions for a given survey page
	 *
	 * @param int $surveyId - The survey to get the page from
	 * @param int $pageId - The page to add the question to
	 * @param array $data - See API docs for available fields
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#surveys-id-pages-id-questions
	 */
	public function createSurveyPageQuestion($surveyId, $pageId, array $data = [])
	{
		return $this->sendRequest(
			$this->createRequest('POST', sprintf('surveys/%d/pages/%d/questions', $surveyId, $pageId), [], $data)
		);
	}

	/**
	 * getSurveyPageQuestion - Get a single survey page question
	 *
	 * @param int $surveyId - The survey to get the page from
	 * @param int $pageId - The page the question is on
	 * @param int $questionId - The question to get
     *
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#surveys-id-pages-id-questions-id
	 */
	public function getSurveyPageQuestion($surveyId, $pageId, $questionId)
	{
		return $this->sendRequest(
			$this->createRequest('GET', sprintf('surveys/%d/pages/%d/questions/%d', $surveyId, $pageId, $questionId))
		);	
	}

	/**
	 * updateSurveyPageQuestion - Update a survey page question
	 *
	 * @param int $surveyId - The survey to get the page from
	 * @param int $pageId - The page the question is on
	 * @param int $questionId - The question to update
	 * @param array $data - See API docs for available fields
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#surveys-id-pages-id-questions-id
	*/
	public function updateSurveyPageQuestion($surveyId, $pageId, $questionId, array $data = [])
	{
		return $this->sendRequest(
			$this->createRequest('PATCH', sprintf('surveys/%d/pages/%d/questions/%d', $surveyId, $pageId, $questionId), [], $data)
		);	
	}

	/**
	 * replaceSurveyPageQuestion - Replace a survey page question
	 *
	 * @param int $surveyId - The survey to get the page from
	 * @param int $pageId - The page the question is on
	 * @param int $questionId - The question to replace
	 * @param array $data - See API docs for available fields
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#surveys-id-pages-id-questions-id
	 */
	public function replaceSurveyPageQuestion($surveyId, $pageId, $questionId, array $data = [])
	{
		return $this->sendRequest(
			$this->createRequest('PUT', sprintf('surveys/%d/pages/%d/questions/%d', $surveyId, $pageId, $questionId), [], $data)
		);	
	}

	/**
	 * deleteSurveyPageQuestion - Delete a survey page question
	 *
	 * @param int $surveyId - The survey to get the page from
	 * @param int $pageId - The page the question is on
	 * @param int $questionId - The question to delete
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#surveys-id-pages-id-questions-id
	 */
	public function deleteSurveyPageQuestion($surveyId, $pageId, $questionId)
	{
		return $this->sendRequest(
			$this->createRequest('DELETE', sprintf('surveys/%d/pages/%d/questions/%d', $surveyId, $pageId, $questionId))
		);	
	}
}