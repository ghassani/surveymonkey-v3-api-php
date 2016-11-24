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
	* @param int $surveyId
	*
	* @return @see Client::sendRequest
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
	* @param int $collectorId
	* @param bool $detailed - Defaults to false
	* @param array $filters - Available filters: 
	*							page, per_page, start_created_at, end_created_at, 
	*							start_modified_at, end_modified_at, status,
	*							email, first_name, last_name, ip, custom, 
	*							total_time_max, total_time_min, total_time_units, 
	*							sort_order, sort_by
	*
	* @return @see Client::sendRequest
	*/
	public function getCollectorResponses($collectorId, $detailed = false, array $filters = [])
	{
		if ($detailed) {
			return $this->sendRequest(
				$this->createRequest('GET', sprintf('collectors/%d/responses/bulk', $collectorId), [ 
					'query' => $filters 
				])
			);
		} else {
			return $this->sendRequest(
				$this->createRequest('GET', sprintf('collectors/%d/responses', $collectorId), [ 
					'query' => $filters 
				])
			);
		}
	}

	/**
	* createCollectorResponse
	*
	* @param int $collectorId
	* @param array $data - See API docs for available fields
	*
	* @return @see Client::sendRequest
	*/
	public function createCollectorResponse($collectorId, array $data = [])
	{
		return $this->sendRequest(
			$this->createRequest('POST', sprintf('collectors/%d/responses', $collectorId), [], $data)
		);
	}

	/**
	* getCollectorResponse
	*
	* @param int $collectorId
	* @param int $responseId
	* @param bool $detailed
	*
	* @return @see Client::sendRequest
	*/
	public function getCollectorResponse($collectorId, $responseId, $detailed = false)
	{
		if ($detailed) {
			return $this->sendRequest(
				$this->createRequest('GET', sprintf('collectors/%d/responses/%d', $collectorId, $responseId))
			);
		} else {
			return $this->sendRequest(
				$this->createRequest('GET', sprintf('collectors/%d/responses/%d/details', $collectorId, $responseId))
			);
		}
	}

	/**
	* updateCollectorResponse
	*
	* @param int $collectorId
	* @param int $responseId
	* @param array $data - See API docs for available fields
	*
	* @return @see Client::sendRequest
	*/
	public function updateCollectorResponse($collectorId, $responseId, array $data = [])
	{
		return $this->sendRequest(
			$this->createRequest('PATCH', sprintf('collectors/%d/responses/%d', $collectorId, $responseId), [], $data)
		);
	}

	/**
	* replaceCollectorResponse
	*
	* @param int $collectorId
	* @param int $responseId
	* @param array $data - See API docs for available fields
	*
	* @return @see Client::sendRequest
	*/
	public function replaceCollectorResponse($collectorId, $responseId, array $data = [])
	{
		return $this->sendRequest(
			$this->createRequest('PUT', sprintf('collectors/%d/responses/%d', $collectorId, $responseId), [], $data)
		);
	}

	/**
	* deleteCollectorResponse
	*
	* @param int $collectorId
	* @param int $responseId
	*
	* @return @see Client::sendRequest
	*/
	public function deleteCollectorResponse($collectorId, $responseId)
	{
		return $this->sendRequest(
			$this->createRequest('DELETE', sprintf('collectors/%d/responses/%d', $collectorId, $responseId))
		);
	}

	/**
	* getSurveyResponse
	*
	* @param int $collectorId
	* @param int $responseId
	* @param bool $detailed
	*
	* @return @see Client::sendRequest
	*/
	public function getSurveyResponse($collectorId, $responseId, $detailed = false)
	{
		if ($detailed) {
			return $this->sendRequest(
				$this->createRequest('GET', sprintf('surveys/%d/responses/%d/details', $collectorId, $responseId), [ 
					'query' => $filters 
				])
			);
		} else {
			return $this->sendRequest(
				$this->createRequest('GET', sprintf('surveys/%d/responses/%d', $collectorId, $responseId), [ 
					'query' => $filters 
				])
			);
		}
	}

	/**
	* updateSurveyResponse
	*
	* @param int $surveyId
	* @param int $responseId
	* @param array $data - See API docs for available fields
	*
	* @return @see Client::sendRequest
	*/
	public function updateSurveyResponse($surveyId, $responseId, array $data = [])
	{
		return $this->sendRequest(
			$this->createRequest('PATCH', sprintf('surveys/%d/responses/%d', $surveyId, $responseId), [], $data)
		);
	}

	/**
	* replaceSurveyResponse
	*
	* @param int $surveyId
	* @param int $responseId
	* @param array $data - See API docs for available fields
	*
	* @return @see Client::sendRequest
	*/
	public function replaceSurveyResponse($surveyId, $responseId, array $data = [])
	{
		return $this->sendRequest(
			$this->createRequest('PUT', sprintf('surveys/%d/responses/%d', $surveyId, $responseId), [], $data)
		);
	}

	/**
	* deleteSurveyResponse
	*
	* @param int $surveyId
	* @param int $responseId
	*
	* @return @see Client::sendRequest
	*/
	public function deleteSurveyResponse($surveyId, $responseId)
	{
		return $this->sendRequest(
			$this->createRequest('DELETE', sprintf('surveys/%d/responses/%d', $surveyId, $responseId))
		);
	}
}
