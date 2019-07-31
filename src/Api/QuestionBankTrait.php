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
 * Question Bank API Functions
 *
 * @see https://developer.surveymonkey.com/api/v3/#question-bank
 */
trait QuestionBankTrait
{
    /**
     * getQuestionBankQuestions - Returns a list of question bank questinos available to the user
     *
     * @param array $filters - Available filters: page, per_page, locale, search, custom
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#question_bank-questions
     */
    public function getQuestionBankQuestions(array $filters = [])
    {
        return $this->sendRequest(
            $this->createRequest('GET', 'question_bank/questions', [ 'query' => $filters ])
        );
    }
}