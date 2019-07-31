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
 * Common API Functions
 */
trait CommonTrait
{
	/**
	 * isResourceAvailable
	 *
	 * @param string $uri - URI to endpoint to query
	 * @return \Spliced\SurveyMonkey\Response
	 */
	public function isResourceAvailable($uri)
	{
		return $this->sendRequest(
			$this->createRequest('HEAD', $uri)
		);
	}

	/**
	 * isResourceAvailable
	 *
	 * @param string $uri - URI to endpoint to query
	 * @return \Spliced\SurveyMonkey\Response
	 */
	public function getResourceOptions($uri)
	{
		return $this->sendRequest(
			$this->createRequest('OPTIONS', $uri)
		);
	}
}