<?php

namespace Spliced\SurveyMonkey;

use Spliced\SurveyMonkey\Client;
use Spliced\SurveyMonkey\BaseTest;

class ClientTest extends BaseTest
{
	public function testInternalVariables()
	{
		$client = new Client('FOO', 'BAR');

		$this->assertEquals($client->getApiKey(), 'FOO');

		$this->assertEquals($client->getAccessToken(), 'BAR');	

		$client->setApiKey('BAR');

		$client->setAccessToken('FOO');

		$this->assertEquals($client->getApiKey(), 'BAR');

		$this->assertEquals($client->getAccessToken(), 'FOO');
	}

	
}