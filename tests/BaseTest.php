<?php

namespace Spliced\SurveyMonkey;

use Spliced\SurveyMonkey\Client;

abstract class BaseTest extends \PHPUnit\Framework\TestCase
{
	public function __construct($name = NULL, array $data = array(), $dataName = '' )
	{
		parent::__construct($name, $data, $dataName);
		$this->client = $this->initLiveClient();
	}

	public function initLiveClient()
	{
		if ((!defined('SM_API_KEY') || !SM_API_KEY) || (!defined('SM_API_ACCESS_TOKEN') || !SM_API_ACCESS_TOKEN)) {
			throw new \Exception('No Client Credentials Specified in phpunit.xml');
		}
		return new Client(SM_API_KEY, SM_API_ACCESS_TOKEN);
	}
}