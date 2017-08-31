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
* Webhook API Functions
*
* @see https://developer.surveymonkey.com/api/v3/#webhooks
*/
trait WebooksTrait
{
	/**
	* getWebhooks
	*
	* @param array $filters - Available filters: page, per_page
	*
	* @return @see Client::sendRequest
	*/
	public function getWebhooks(array $filters = [])
	{
		return $this->sendRequest(
			$this->createRequest('GET', 'webhooks', [ 
				'query' => $filters 
			])
		);
	}


	/**
	* createWebhook
	*
	* @param array $data - See API docs for available fields
	*
	* @return @see Client::sendRequest
	*/
	public function createWebhook(array $data = [])
	{
		return $this->sendRequest(
			$this->createRequest('POST', 'webhooks', [], $data)
		);
	}

	/**
	* getWebhook
	*
	* @param int $webhookId
	*
	* @return @see Client::sendRequest
	*/
	public function getWebhook($webhookId)
	{
		return $this->sendRequest(
			$this->createRequest('GET', sprintf('webhooks/%d', $webhookId))
		);
	}


	/**
	* updateWebhook
	*
	* @param int $webhookId
	* @param array $data - See API docs for available fields
	*
	* @return @see Client::sendRequest
	*/
	public function updateWebhook($webhookId, array $data = [])
	{
		return $this->sendRequest(
			$this->createRequest('PATCH', sprintf('webhooks/%d', $webhookId), [], $data)
		);
	}


	/**
	* replaceWebhook
	*
	* @param int $webhookId
	* @param array $data - See API docs for available fields
	*
	* @return @see Client::sendRequest
	*/
	public function replaceWebhook($webhookId, array $data = [])
	{
		return $this->sendRequest(
			$this->createRequest('PUT', sprintf('webhooks/%d', $webhookId), [], $data)
		);
	}

	/**
	* deleteWebhook
	*
	* @param int $webhookId
	*
	* @return @see Client::sendRequest
	*/
	public function deleteWebhook($webhookId)
	{
		return $this->sendRequest(
			$this->createRequest('DELETE', sprintf('webhooks/%d', $webhookId))
		);
	}
}
