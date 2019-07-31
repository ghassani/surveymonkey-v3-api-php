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
	 * @param $surveyId
	 * @param $filters - Available filters: page, per_page, sort_by, sort_order, name, start_date, end_date, include
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#surveys-id-collectors
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
	 * @param $surveyId
	 * @param $data - See API docs for available fields
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#surveys-id-collectors
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
	 * @param $collectorId
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#collectors-id
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
	 * @param $collectorId
	 * @param $data - See API docs for available fields
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#collectors-id
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
	 * @param $collectorId
	 * @param $data - See API docs for available fields
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#collectors-id
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
	 * @param $collectorId
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#collectors-id
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
	 * @param $collectorId
	 * @param $filters - Available filters: page, per_page
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#collectors-id-messages
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
	 * @param $collectorId
	 * @param $data - See API docs for available fields
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#collectors-id-messages
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
     * @param $collectorId
     * @param $fromCollectorId
	 * @param $fromMessageId
	 * @param $includeRecipients
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#collectors-id-messages
	 */
	public function copyCollectorMessage($collectorId, $fromCollectorId, $fromMessageId, $includeRecipients = false)
	{
		return $this->sendRequest(
			$this->createRequest('POST', sprintf('collectors/%s/messages', $collectorId), [
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
	 * @param $collectorId
	 * @param $messageId
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#collectors-id-messages-id
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
	 * @param $collectorId
	 * @param $messageId
	 * @param $data - See API docs for available fields
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#collectors-id-messages-id
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
	 * @param $collectorId
	 * @param $messageId
	 * @param $data - See API docs for available fields
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#collectors-id-messages-id
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
	 * @param $collectorId
	 * @param $messageId
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#collectors-id-messages-id
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
	 * @param $collectorId
	 * @param $messageId
	 * @param \DateTime|null $scheduledDate
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#collectors-id-messages-id-send
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
	 * @param $collectorId
	 * @param $messageId
	 * @param $filters - Available filters: page, per_page
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#collectors-id-messages-id-recipients
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
	 * @param $collectorId
	 * @param $messageId
	 * @param $data - See API docs for available fields
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#collectors-id-messages-id-recipients
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
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#collectors-id-messages-id-recipients-bulk
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
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#collectors-id-recipients
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
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#collectors-id-recipients-id
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
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#collectors-id-recipients-id
	 */
	public function deleteCollectorRecipient($collectorId, $recipientId)
	{
		return $this->sendRequest(
			$this->createRequest('DELETE', sprintf('collectors/%s/recipients/%s', $collectorId,  $recipientId))
		);
	}

    /**
     * getCollectorStats
     *
     * @param int $collectorId
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#collectors-id-stats
     */
	public function getCollectorStats($collectorId)
    {
        return $this->sendRequest(
            $this->createRequest('GET', sprintf('collectors/%s/stats', $collectorId))
        );
    }

    /**
     * getCollectorMessageStats
     *
     * @param int $collectorId
     * @param int $messageId
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#collectors-id-messages-id-stats
     */
    public function getCollectorMessageStats($collectorId, $messageId)
    {
        return $this->sendRequest(
            $this->createRequest('GET', sprintf('collectors/%s/messages/%s/stats', $collectorId, $messageId))
        );
    }
}
