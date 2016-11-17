<?php

namespace Spliced\SurveyMonkey;

use Spliced\SurveyMonkey\BaseTest;

class ContactTest extends BaseTest
{
	/**
	* testContactList
	*
	* Test functionality for:
	*		getContactLists
	*		createContactList
	*		updateContactList
	*		replaceContactList
	*		deleteContactList
	*		getContactList
	*/
	public function testContactList()
	{
		$contactListsResponse = $this->client->getContactLists([]);

		$this->assertInstanceOf('Spliced\\SurveyMonkey\\Response', $contactListsResponse);

		$this->isType('array',$contactListsResponse->getData());

		$this->arrayHasKey('data',$contactListsResponse->getData());

		// create a contact list
		$createContactListResponse = $this->client->createContactList(['name' => 'Survey Monkey PHP API Test Contact List']);

		$this->assertInstanceOf('Spliced\\SurveyMonkey\\Response', $createContactListResponse);

		$newContactListData = $createContactListResponse->getData();

		$this->isType('array', $newContactListData);
		$this->arrayHasKey('id',  $newContactListData);		
		$this->arrayHasKey('name',$newContactListData);
		$this->arrayHasKey('href',$newContactListData);

		// update the contact list
		$updateContactListResponse = $this->client->updateContactList(
			$newContactListData['id'], 
			[ 'name' => $newContactListData['name'].' Changed']
		);

		$updateContactListData = $updateContactListResponse->getData();

		$this->isType('array', $updateContactListData);
		$this->arrayHasKey('id',  $updateContactListData);		
		$this->arrayHasKey('name',$updateContactListData);
		$this->arrayHasKey('href',$updateContactListData);
		$this->assertEquals($newContactListData['name'].' Changed', $updateContactListData['name']);

		// replace the contact list
		$replaceContactListResponse = $this->client->replaceContactList(
			$newContactListData['id'], 
			[ 'name' => $newContactListData['name'].' Replaced']
		);

		$replaceContactListData = $replaceContactListResponse->getData();

		$this->isType('array', $replaceContactListData);
		$this->arrayHasKey('id',  $replaceContactListData);		
		$this->arrayHasKey('name',$replaceContactListData);
		$this->arrayHasKey('href',$replaceContactListData);
		$this->assertEquals($newContactListData['name'].' Replaced', $replaceContactListData['name']);

		// delete the new list
		$deleteContactListResponse = $this->client->deleteContactList($newContactListData['id']);
		
		$deleteContactListData = $deleteContactListResponse->getData();

		$this->isType('array', $deleteContactListData);
		$this->arrayHasKey('id',  $deleteContactListData);		
		$this->arrayHasKey('name',$deleteContactListData);
		$this->arrayHasKey('href',$deleteContactListData);
		$this->assertEquals($newContactListData['name'].' Replaced', $deleteContactListData['name']);

		// try to fetch the list see if it was deleted
		$checkDeletedResponse = $this->client->getContactList($newContactListData['id']);

		$this->assertEquals($checkDeletedResponse->isSuccess(), false);
		$this->assertEquals($checkDeletedResponse->isError(), true);
	}
	
	/**
	* testContact
	*
	* Test functionality for:
	*		getContacts
	*		getContactsInList
	*		createContact
	*		getContact
	*		updateContact
	*		replaceContact
	*		deleteContact
	*/
	public function testContact()
	{
		$contactsResponse = $this->client->getContacts([]);

		$this->assertInstanceOf('Spliced\\SurveyMonkey\\Response', $contactsResponse);

		$this->isType('array',$contactsResponse->getData());

		$this->arrayHasKey('data',$contactsResponse->getData());

	}

	
}