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
			$this->createRequest('GET', sprintf('surveys/%s/collectors', $surveyId), [ 
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
			$this->createRequest('POST', sprintf('surveys/%s/collectors', $surveyId), [], $data)
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
			$this->createRequest('GET', sprintf('collectors/%s', $collectorId))
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
			$this->createRequest('PATCH', sprintf('collectors/%s', $collectorId), [], $data)
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
			$this->createRequest('PUT', sprintf('collectors/%s', $collectorId), [], $data)
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
			$this->createRequest('DELETE', sprintf('collectors/%s', $collectorId))
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
			$this->createRequest('GET', sprintf('collectors/%s/messages', $collectorId), [
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
			$this->createRequest('POST', sprintf('collectors/%s/messages', $collectorId), [], $data)
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
			$this->createRequest('POST', sprintf('collectors/%s/messages', $fromCollectorId), [
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
	* @param int $messageId
	*
	* @return @see Client::sendRequest
	*/
	public function getCollectorMessage($collectorId, $messageId)
	{
		return $this->sendRequest(
			$this->createRequest('GET', sprintf('collectors/%s/messages/%s', $collectorId, $messageId))
		);
	}

	/**
	* updateCollectorMessage
	*
	* @param int $collectorId
	* @param int $messageId
	* @param array $data - See API docs for available fields
	*
	* @return @see Client::sendRequest
	*/
	public function updateCollectorMessage($collectorId, $messageId, array $data = [])
	{
		return $this->sendRequest(
			$this->createRequest('PATCH', sprintf('collectors/%s/messages/%s', $collectorId, $messageId), [], $data)
		);
	}

	/**
	* replaceCollectorMessage
	*
	* @param int $collectorId
	* @param int $messageId
	* @param array $data - See API docs for available fields
	*
	* @return @see Client::sendRequest
	*/
	public function replaceCollectorMessage($collectorId, $messageId, array $data = [])
	{
		return $this->sendRequest(
			$this->createRequest('PUT', sprintf('collectors/%s/messages/%s', $collectorId, $messageId), [], $data)
		);
	}

	/**
	* deleteCollectorMessage
	*
	* @param int $collectorId
	* @param int $messageId
	*
	* @return @see Client::sendRequest
	*/
	public function deleteCollectorMessage($collectorId, $messageId)
	{
		return $this->sendRequest(
			$this->createRequest('DELETE', sprintf('collectors/%s/messages/%s', $collectorId, $messageId))
		);
	}

	/**
	* sendCollectorMessage
	*
	* @param int $collectorId
	* @param int $messageId
	* @param DateTime|null $scheduledDate
	*
	* @return @see Client::sendRequest
	*/
	public function sendCollectorMessage($collectorId, $messageId, \DateTime $scheduledDate = null)
	{
		$data = $scheduledDate ? [ 'scheduled_date' => $scheduledDate->format(DATE_ATOM) ] : [];
		
		return $this->sendRequest(
			$this->createRequest('POST', sprintf('collectors/%s/messages/%s/send', $collectorId, $messageId), [], $data)
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
			$this->createRequest('GET', sprintf('collectors/%s/messages/%s/recipients', $collectorId, $messageId), [
				'query' => $filters
			])
		);
	}


	/**
	* createCollectorMessageRecipient
	*
	* @param int $collectorId
	* @param int $messageId
	* @param array $data - See API docs for available fields
	* @link https://developer.surveymonkey.com/api/v3/#collectors-id-messages-id-recipients Documentation for creating recipient
	*
	* @return @see Client::sendRequest
	*/
	public function createCollectorMessageRecipient($collectorId, $messageId, array $data = [])
	{
		return $this->sendRequest(
			$this->createRequest('POST', sprintf('collectors/%s/messages/%s/recipients', $collectorId, $messageId), [], $data)
		);
	}
	
	/**
	* createCollectorMessageRecipientBulk
	*
	* @param int $collectorId
	* @param int $messageId
	* @param array $data - See API docs for available fields
	* @link https://developer.surveymonkey.net/api/v3/#collectors-id-messages-id-recipients-bulk Documentation for creating recipients in bulk
	*
	* @return @see Client::sendRequest
	*/
	public function createCollectorMessageRecipientBulk($collectorId, $messageId, $data = [])
	{
		return $this->sendRequest(
			$this->createRequest('POST', sprintf('collectors/%s/messages/%s/recipients/bulk', $collectorId, $messageId), [], $data)
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
			$this->createRequest('GET', sprintf('collectors/%s/recipients', $collectorId), [
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
			$this->createRequest('GET', sprintf('collectors/%s/recipients/%s', $collectorId,  $recipientId))
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
			$this->createRequest('DELETE', sprintf('collectors/%s/recipients/%s', $collectorId,  $recipientId))
		);
	}
}
