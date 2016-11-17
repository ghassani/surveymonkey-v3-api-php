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
* Contact API Functions
*
* @see https://developer.surveymonkey.com/api/v3/#contacts-and-contact-lists
*/
trait ContactTrait
{

	/**
	* getContactLists
	*
	* @param array $filters - Available filters: page, per_page
	*
	* @return @see Client::sendRequest
	*/
	public function getContactLists(array $filters = [])
	{
		return $this->sendRequest(
			$this->createRequest('GET', 'contact_lists', [ 
				'query' => $filters 
			])
		);
	}

	/**
	* createContactList
	*
	* @param array $data - See API docs for available fields
	*
	* @return @see Client::sendRequest
	*/
	public function createContactList(array $data = [])
	{
	
		return $this->sendRequest(
			$this->createRequest('POST', 'contact_lists', [], $data)
		);
	}

	/**
	* getContactList
	*
	* @param int $contactListId
	*
	* @return @see Client::sendRequest
	*/
	public function getContactList($contactListId)
	{
		return $this->sendRequest(
			$this->createRequest('GET', sprintf('contact_lists/%d', $contactListId))
		);
	}

	/**
	* updateContactList
	*
	* @param int $contactListId
	* @param array $data - See API docs for available fields
	*
	* @return @see Client::sendRequest
	*/
	public function updateContactList($contactListId, array $data = [])
	{
		return $this->sendRequest(
			$this->createRequest('PATCH', sprintf('contact_lists/%d', $contactListId), [], $data)
		);
	}

	/**
	* replaceContactList
	*
	* @param int $contactListId
	* @param array $data - See API docs for available fields
	*
	* @return @see Client::sendRequest
	*/
	public function replaceContactList($contactListId, array $data = [])
	{
		return $this->sendRequest(
			$this->createRequest('PUT', sprintf('contact_lists/%d', $contactListId), [], $data)
		);
	}

	/**
	* deleteContactList
	*
	* @param int $contactListId
	*
	* @return @see Client::sendRequest
	*/
	public function deleteContactList($contactListId)
	{
		return $this->sendRequest(
			$this->createRequest('DELETE', sprintf('contact_lists/%d', $contactListId))
		);
	}

	/**
	* copyContactList
	*
	* @param int $contactListId
	*
	* @return @see Client::sendRequest
	*/
	public function copyContactList($contactListId)
	{
		return $this->sendRequest(
			$this->createRequest('POST', sprintf('contact_lists/%d/copy', $contactListId))
		);
	}

	/**
	* mergeContactList
	*
	* @param int $contactListId
	* @param int $intoContactListId
	*
	* @return @see Client::sendRequest
	*/
	public function mergeContactList($contactListId, $intoContactListId)
	{
		return $this->sendRequest(
			$this->createRequest('POST', sprintf('contact_lists/%d/merge', $contactListId), [], [ 'list_id' => $intoContactListId ])
		);
	}

	/**
	* getContactsInList
	*
	* @param int $contactListId
	* @param array $filters - Available filters: page, per_page, status, sort_by, sort_order, search_by
	*
	* @return @see Client::sendRequest
	*/
	public function getContactsInList($contactListId, array $filters = [])
	{
		return $this->sendRequest(
			$this->createRequest('GET', sprintf('contact_lists/%d/contacts', $contactListId), [
				'query' => $filters
			])
		);		
	}

	/**
	* createContactInList
	*
	* @param int $contactListId
	* @param array $data - See API docs for available fields
	*
	* @return @see Client::sendRequest
	*/
	public function createContactInList($contactListId, array $data = [])
	{
		return $this->sendRequest(
			$this->createRequest('POST', sprintf('contact_lists/%d/contacts', $contactListId), [], $data)
		);
	}

	/**
	* getContacts
	*
	* @param array $filters - Available filters: page, per_page, status, sort_by, sort_order, search_by
	*
	* @return @see Client::sendRequest
	*/
	public function getContacts(array $filters = [])
	{
		return $this->sendRequest(
			$this->createRequest('GET', 'contacts', [
				'query' => $filters
			])
		);		
	}

	/**
	* createContact
	*
	* @param array $data - See API docs for available fields
	*
	* @return @see Client::sendRequest
	*/
	public function createContact(array $data = [])
	{
		return $this->sendRequest(
			$this->createRequest('POST', 'contacts', [], $data)
		);
	}

	/**
	* getContact
	*
	* @param int $contactId
	*
	* @return @see Client::sendRequest
	*/
	public function getContact($contactId)
	{
		return $this->sendRequest(
			$this->createRequest('GET', sprintf('contacts/%d', $contactId))
		);
	}

	/**
	* updateContact
	*
	* @param int $contactId		
	* @param array $data - See API docs for available fields
	*
	* @return @see Client::sendRequest
	*/
	public function updateContact($contactId, array $data = [])
	{
		return $this->sendRequest(
			$this->createRequest('PATCH', sprintf('contacts/%d', $contactId), [], $data)
		);
	}

	/**
	* replaceContact
	*
	* @param int $contactId		
	* @param array $data - See API docs for available fields
	*
	* @return @see Client::sendRequest
	*/
	public function replaceContact($contactId, array $data = [])
	{
		return $this->sendRequest(
			$this->createRequest('PUT', sprintf('contacts/%d', $contactId), [], $data)
		);
	}

	/**
	* deleteContact
	*
	* @param int $contactId		
	*
	* @return @see Client::sendRequest
	*/
	public function deleteContact($contactId)
	{
		return $this->sendRequest(
			$this->createRequest('DELETE', sprintf('contacts/%d', $contactId))
		);
	}

	/**
	* getContactsFields
	*
	* @param array $filters - Available filters: page, per_page
	*
	* @return @see Client::sendRequest
	*/
	public function getContactsFields(array $filters = [])
	{
		return $this->sendRequest(
			$this->createRequest('GET', 'contact_fields', [
				'query' => $filters
			])
		);		
	}

	/**
	* getContactField
	*
	* @param int $contactFieldId		
	*
	* @return @see Client::sendRequest
	*/
	public function getContactField($contactFieldId)
	{
		return $this->sendRequest(
			$this->createRequest('GET', sprintf('contact_fields/%d', $contactFieldId))
		);
	}
	
	/**
	* updateContactField
	*
	* @param int $contactFieldId		
	* @param array $data - See API docs for available fields
	*
	* @return @see Client::sendRequest
	*/
	public function updateContactField($contactFieldId, array $data = [])
	{
		return $this->sendRequest(
			$this->createRequest('PATCH', sprintf('contact_fields/%d', $contactFieldId), [], $data)
		);
	}
}