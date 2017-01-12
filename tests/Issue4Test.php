<?php

namespace Spliced\SurveyMonkey;

use Spliced\SurveyMonkey\BaseTest;

/**
* https://github.com/ghassani/surveymonkey-v3-api-php/issues/4
*/
class Issue4Test extends BaseTest
{

	public function testIssue4Query()
	{
		$surveys = $this->client->getSurveys([ 'per_page' => 1]);

		$data = $surveys->getData();

		$this->arrayHasKey('per_page', $data);
		$this->assertEquals($data['per_page'], 1);
	}
}