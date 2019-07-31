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

namespace Spliced\SurveyMonkey;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
* Response
**/
class Response
{

	/** @var RequestInterface */
	protected $request;

	/** @var RequestInterface */
	protected $response;

	/** @var array|false */
	protected $data;

	public function __construct(RequestInterface $request, ResponseInterface $response)
	{
		$this->request  = $request;
		$this->response = $response;
		if ($this->getResponseObject()->hasHeader('content-type')) {
			if (preg_match('/application\/json/i', $this->getResponseObject()->getHeader('content-type')[0])) {
				$this->data = json_decode($this->getResponseObject()->getBody(), true);
			} else {
				$this->data = false;
			}
		}
	}

	/**
	 * getRequestObject
	 *
	 * @return RequestInterface
	 */
	public function getRequestObject()
	{
		return $this->response;
	}

	/**
	 * getResponseObject
	 *
	 * @return ResponseInterface
	 */
	public function getResponseObject()
	{
		return $this->response;
	}

	/**
	 * getData
	 *
	 * @return mixed
	 */
	public function getData()
	{
		return $this->data;
	}

	/**
	 * isSuccess
	 *
	 * @return bool
	 */
	public function isSuccess()
	{
		$data = $this->getData();

		if (!$data) {
			return false;
		}

		if (isset($data['error'])) {
			return false;
		}

		return true;
	}

	/**
	 * isError
	 *
	 * @return bool
	 */
	public function isError()
	{
		return !$this->isSuccess();
	}

	/**
	 * getError
	 *
	 * @return array
	 */
	public function getError()
	{
		if ($this->isSuccess()) {
			return null;
		}

		return $this->data['error'];
	}
}
