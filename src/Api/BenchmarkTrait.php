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
* Benchmark API Functions
*
* @see https://developer.surveymonkey.com/api/v3/#benchmarks
*/
trait BenchmarkTrait
{
	/**
	* getBenchmarkBundles
	*
	* @param array $filters - Available filters: page, per_page, country
	*
	* @return @see Client::sendRequest
	*/
	public function getBenchmarkBundles(array $filters = [])
	{
		return $this->sendRequest(
			$this->createRequest('GET', 'benchmark_bundles', [ 
				'query' => $filters 
			])
		);
	}

	/**
	* getBenchmarkBundle
	*
	* @param int $benchmarkBundleId
	*
	* @return @see Client::sendRequest
	*/
	public function getBenchmarkBundle($benchmarkBundleId)
	{
		return $this->sendRequest(
			$this->createRequest('GET', sprintf('benchmark_bundles/%d', $benchmarkBundleId))
		);
	}

	/**
	* analyzeSurveyQuestions
	*
	* @param int $benchmarkBundleId
	* @param int $questionids
	* @param array $filters - Available filters: percentile_start, percentile_end
	*
	* @return @see Client::sendRequest
	*/
	public function analyzeSurveyQuestions($benchmarkBundleId, array $questionids, array $filters = [])
	{
		return $this->sendRequest(
			$this->createRequest('GET', sprintf('benchmark_bundles/%d/analyze', $benchmarkBundleId). [
				'query' => array_merge($filters, [
					'question_ids' => implode(',', $questionIds)
				])
			])
		);
	}

	/**
	* getQuestionBenchmarkResult
	*
	* @param int $surveyId
	* @param int $pageId
	* @param int $questionids
	* @param array $filters - Available filters: percentile_start, percentile_end
	*
	* @return @see Client::sendRequest
	*/
	public function getQuestionBenchmarkResult($surveyId, $pageId, $questionId, array $filters = [])
	{
		return $this->sendRequest(
			$this->createRequest('GET', sprintf('surveys/%d/pages/%d/questions/%d/benchmark', $surveyId, $pageId, $questionId), [ 
				'query' => $filters 
			])
		);
	}

}