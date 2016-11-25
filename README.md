# SurveyMonkey API v3 Wrapper for PHP

A simple SurveyMonkey API wrapper for version 3 of their API.

# Requirements
- PHP 5.5+
- Composer - http://www.getcomposer.org

# Installation
Add the following to your composer.json under require:

    "require": {
        "ghassani/surveymonkey-v3-api-php": "dev-master"
    },

# Usage

1) Initiate a client with a long lived token:

    $client = new Spliced\SurveyMonkey\Client(MY_API_KEY, MY_API_TOKEN);

2) Make calls:

    $client->getSurveys([]);

Check out src/Api/*Trait.php for exposed methods in the Client class. Some additional usage examples in the incomplete test suite.

# OAuth

Check out authenticator/index.php as an example of how to get a long lived token and authorize a user. You can also get a long lived token from your developer console if you are not requiring users to authenticate and just trying to work with your own account.
