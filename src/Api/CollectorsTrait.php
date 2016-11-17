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
* Collector API Functions
*
* @see https://developer.surveymonkey.com/api/v3/#collectors-and-invite-messages
*/
trait CollectorsTrait
{
	/**
	* getCollectorsForSurvey
	*
	* @param int $surveyId
	* @param array $filters - Available filters: page, per_page, sort_by, sort_order, name, start_date, end_date, include
	*
	* @return @see Client::sendRequest
	*/
	public function getCollectorsForSurvey($surveyId, array $filters = [])
	{
		return $this->sendRequest(
			$this->createRequest('GET', sprintf('surveys/%d/collectors', $surveyId), [ 
				'query' => $filters 
			])
		);
	}

	/**
	* createCollectorForSurvey
	*
	* @param int $surveyId
	* @param array $data - See API docs for available fields
	*
	* @return @see Client::sendRequest
	*/
	public function createCollectorForSurvey($surveyId, array $data = [])
	{
		return $this->sendRequest(
			$this->createRequest('POST', sprintf('surveys/%d/collectors', $surveyId), [], $data)
		);
	}

	/**
	* getCollector
	*
	* @param int $collectorId
	*
	* @return @see Client::sendRequest
	*/
	public function getCollector($collectorId)
	{
		return $this->sendRequest(
			$this->createRequest('GET', sprintf('collectors/%d', $collectorId))
		);
	}

	/**
	* updateCollector
	*
	* @param int $collectorId
	* @param array $data - See API docs for available fields
	*
	* @return @see Client::sendRequest
	*/
	public function updateCollector($collectorId, array $data = [])
	{
		return $this->sendRequest(
			$this->createRequest('PATCH', sprintf('collectors/%d', $collectorId), [], $data)
		);
	}

	/**
	* replaceCollector
	*
	* @param int $collectorId
	* @param array $data - See API docs for available fields
	*
	* @return @see Client::sendRequest
	*/
	public function replaceCollector($collectorId, array $data = [])
	{
		return $this->sendRequest(
			$this->createRequest('PUT', sprintf('collectors/%d', $collectorId), [], $data)
		);
	}

	/**
	* deleteCollector
	*
	* @param int $collectorId
	*
	* @return @see Client::sendRequest
	*/
	public function deleteCollector($collectorId)
	{
		return $this->sendRequest(
			$this->createRequest('DELETE', sprintf('collectors/%d', $collectorId))
		);
	}

	/**
	* getCollectorMessages
	*
	* @param int $collectorId
	* @param array $filters - Available filters: page, per_page
	*
	* @return @see Client::sendRequest
	*/
	public function getCollectorMessages($collectorId, array $filters = [])
	{
		return $this->sendRequest(
			$this->createRequest('GET', sprintf('collectors/%d/messages', $collectorId), [
				'query' => $filters
			])
		);
	}

	/**
	* createCollectorMessage
	*
	* @param int $collectorId
	* @param array $data - See API docs for available fields
	*
	* @return @see Client::sendRequest
	*/
	public function createCollectorMessage($collectorId, array $data = [])
	{
		return $this->sendRequest(
			$this->createRequest('POST', sprintf('collectors/%d/messages', $collectorId), [], $data)
		);
	}

	/**
	* copyCollectorMessage
	*
	* @param int $fromCollectorId
	* @param int $fromMessageId
	* @param bool $includeRecipients
	*
	* @return @see Client::sendRequest
	*/
	public function copyCollectorMessage($fromCollectorId, $fromMessageId, $includeRecipients = false)
	{
		return $this->sendRequest(
			$this->createRequest('POST', sprintf('collectors/%d/messages', $fromCollectorId), [
				'query' => [
					'from_collector_id'  => $fromCollectorId,
					'from_message_id' 	 => $fromMessageId,
					'include_recipients' => (bool)$includeRecipients,
				]
			])
		);
	}

	/**
	* getCollectorMessage
	*
	* @param int $collectorId
	* @param int $messageid
	*
	* @return @see Client::sendRequest
	*/
	public function getCollectorMessage($collectorId, $messageid)
	{
		return $this->sendRequest(
			$this->createRequest('GET', sprintf('collectors/%d/messages/%d', $collectorId, $messageid))
		);
	}

	/**
	* updateCollectorMessage
	*
	* @param int $collectorId
	* @param int $messageid
	* @param array $data - See API docs for available fields
	*
	* @return @see Client::sendRequest
	*/
	public function updateCollectorMessage($collectorId, $messageid, array $data = [])
	{
		return $this->sendRequest(
			$this->createRequest('PATCH', sprintf('collectors/%d/messages/%d', $collectorId, $messageid), [], $data)
		);
	}

	/**
	* replaceCollectorMessage
	*
	* @param int $collectorId
	* @param int $messageid
	* @param array $data - See API docs for available fields
	*
	* @return @see Client::sendRequest
	*/
	public function replaceCollectorMessage($collectorId, $messageid, array $data = [])
	{
		return $this->sendRequest(
			$this->createRequest('PUT', sprintf('collectors/%d/messages/%d', $collectorId, $messageid), [], $data)
		);
	}

	/**
	* deleteCollectorMessage
	*
	* @param int $collectorId
	* @param int $messageid
	*
	* @return @see Client::sendRequest
	*/
	public function deleteCollectorMessage($collectorId, $messageid)
	{
		return $this->sendRequest(
			$this->createRequest('DELETE', sprintf('collectors/%d/messages/%d', $collectorId, $messageid))
		);
	}

	/**
	* sendCollectorMessage
	*
	* @param int $collectorId
	* @param int $messageid
	* @param DateTime|null $scheduledDate
	*
	* @return @see Client::sendRequest
	*/
	public function sendCollectorMessage($collectorId, $messageId, \DateTime $scheduledDate = null)
	{
		return $this->sendRequest(
			$this->createRequest('POST', sprintf('collectors/%d/messages/%d/send', $collectorId, $messageid), [
				'query' => [ 'scheduled_date' => $scheduledDate ? $scheduledDate->format() : null ]
			])
		);
	}

	/**
	* getCollectorMessageRecipients
	*
	* @param int $collectorId
	* @param int $messageId
	* @param array $filters - Available filters: page, per_page
	*
	* @return @see Client::sendRequest
	*/
	public function getCollectorMessageRecipients($collectorId, $messageId, array $filters = [])
	{
		return $this->sendRequest(
			$this->createRequest('GET', sprintf('collectors/%d/messages/%d/recipients', $collectorId, $messageid), [
				'query' => $filters
			])
		);
	}

	/**
	* getCollectorRecipients
	*
	* @param int $collectorId
	* @param array $filters - Available filters: page, per_page
	*
	* @return @see Client::sendRequest
	*/
	public function getCollectorRecipients($collectorId, array $filters = [])
	{
		return $this->sendRequest(
			$this->createRequest('GET', sprintf('collectors/%d/recipients', $collectorId), [
				'query' => $filters
			])
		);
	}

	/**
	* getCollectorRecipient
	*
	* @param int $collectorId
	* @param int $recipientId
	*
	* @return @see Client::sendRequest
	*/
	public function getCollectorRecipient($collectorId, $recipientId)
	{
		return $this->sendRequest(
			$this->createRequest('GET', sprintf('collectors/%d/recipients/%d', $collectorId,  $recipientId))
		);
	}

	/**
	* deleteCollectorRecipient
	*
	* @param int $collectorId
	* @param int $recipientId
	*
	* @return @see Client::sendRequest
	*/
	public function deleteCollectorRecipient($collectorId, $recipientId)
	{
		return $this->sendRequest(
			$this->createRequest('DELETE', sprintf('collectors/%d/recipients/%d', $collectorId,  $recipientId))
		);
	}
}