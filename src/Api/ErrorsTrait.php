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
 * @see https://developer.surveymonkey.com/api/v3/#errors
 */
trait ErrorsTrait
{
	/**
	 * getErrors
	 *
	 * @param array $filters - Available filters: page, per_page
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#errors
	 */
	public function getErrors(array $filters = [])
	{
		return $this->sendRequest(
			$this->createRequest('GET', 'errors', [ 
				'query' => $filters 
			])
		);
	}

	/**
	 * getError
	 *
	 * @param int $errorId
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#errors
	 */
	public function getError($errorId)
	{
		return $this->sendRequest(
			$this->createRequest('GET', sprintf('errors/%d', $errorId))
		);
	}

}
