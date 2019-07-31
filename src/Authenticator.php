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

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;

/**
 * Authenticator
 *
 * Handles OAuth Authentication.
 *
 * Flow:
 *	1) Initialize Class
 *   2) Redirect to return value of getAuthorizeUrl()
 *   3) Using passed code query parameter targeting the set redirect  uri, call getToken($code);
 *	4) Use long lived access token with Client class.
 *
 * @see <repository_root>/authenticator/index.php for an example
 */
class Authenticator
{

	/** @const string */
	const OAUTH_ENDPOINT = 'https://api.surveymonkey.net/oauth/';

	/** @var GuzzleHttp\Client */
	protected $httpClient;

	/** @var string */
	protected $clientId;

	/** @var string */
	protected $clientSecret;

	/** @var string */
	protected $redirectUri;

	/**
	 * Constructor
	 *
	 * @return Client
	 */
	public function __construct($clientId, $clientSecret, $redirectUri)
	{
		$this->clientId 	= $clientId;
		$this->clientSecret = $clientSecret;
		$this->redirectUri 	= $redirectUri;		
		$this->httpClient 	= new HttpClient([ 
			'base_uri' => static::OAUTH_ENDPOINT,
			'headers'  => [
				'User-Agent'	=> 'ghassani/surveymonkey-v3-api-php'
			]
		]);
	}

	/**
	 * setClientId
	 *
	 * @param string $clientId
	 *
	 * @return Client
	 */
	public function setClientId($clientId)
	{
		$this->clientId = $clientId;
		return $this;
	}

	/**
	 * getClientId
	 *
	 * @return string
	 */
	public function getClientId()
	{
		return $this->clientId;
	}

	/**
	 * setClientSecret
	 *
	 * @param string $clientSecret
	 *
	 * @return Client
	 */
	public function setClientSecret($clientSecret)
	{
		$this->clientSecret = $clientSecret;
		return $this;
	}

	/**
	 * getClientSecret
	 *
	 * @return string
	 */
	public function getClientSecret()
	{
		return $this->clientSecret;
	}
	
	/**
	 * setRedirectUri
	 *
	 * @param string $redirectUri
	 *
	 * @return Client
	 */
	public function setRedirectUri($redirectUri)
	{
		$this->redirectUri = $redirectUri;
		return $this;
	}

	/**
	 * getRedirectUri
	 *
	 * @return string
	 */
	public function getRedirectUri()
	{
		return $this->redirectUri;
	}

	/**
	 * getHttpClient
	 *
	 * @return \GuzzleHttp\Client
	 */
	public function getHttpClient()
	{
		return $this->httpClient;
	}

	/**
	 * getAuthorizeUrl
	 *	
	 * @return string - URL to redirect the user to
	 */
	public function getAuthorizeUrl()
	{
		
		return sprintf('%sauthorize?%s', static::OAUTH_ENDPOINT, http_build_query([
			'redirect_uri'  => $this->getRedirectUri(),
			'client_id'     => $this->getClientId(),
			'response_type' => 'code'
		]));
	}

	/**
	 * getToken
	 *
	 * @param string $code - Code received from redirect from SurveyMonkey after pointing the user to getAuthorizeUrl()
	 *
	 * @return array
	 */
	public function getToken($code)
	{
		$request = 	new Request('POST', 'token', [], http_build_query([
			'redirect_uri'  => $this->getRedirectUri(),
			'client_id'		=> $this->getClientId(),
			'client_secret' => $this->getClientSecret(),
			'grant_type' 	=> 'authorization_code',
			'code' 			=> $code
		]));

		try {
			$response = $this->getHttpClient()->send($request);
		} catch (\Exception $e) {
			throw new SurveyMonkeyApiException($e->getMessage(), $e->getCode(), $e);
		}

        if (!$response->hasHeader('content-type') || !preg_match('/application\/json/i', $response->getHeader('content-type')[0])) {
			throw new SurveyMonkeyApiException(sprintf('Response expected to be a JSON response. Received %s', $response->getHeader('content-type')[0]));
		}

		return json_decode($response->getBody(), true);
	}
}
