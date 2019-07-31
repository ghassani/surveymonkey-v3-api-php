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
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#contact_lists
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
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#contact_lists
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
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#contact_lists-id
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
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#contact_lists-id
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
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#contact_lists-id
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
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#contact_lists-id
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
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#contact_lists-id-copy
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
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#contact_lists-id-merge
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
	 * @param array $filters - Available filters: page, per_page, status, sort_by, sort_order, search_by, search
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#contact_lists-id-contacts
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
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#contact_lists-id-contacts
	 */
	public function createContactInList($contactListId, array $data = [])
	{
		return $this->sendRequest(
			$this->createRequest('POST', sprintf('contact_lists/%d/contacts', $contactListId), [], $data)
		);
	}

	/**
	 * createContactsInList
	 *
	 * @param int $contactListId
	 * @param array $data - See API docs for available fields
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#contact_lists-id-contacts-bulk
	 */
	public function createContactsInList($contactListId, array $data = [])
	{
		return $this->sendRequest(
			$this->createRequest('POST', sprintf('contact_lists/%d/contacts/bulk', $contactListId), [], $data)
		);
	}

	/**
	 * getContacts
	 *
	 * @param array $filters - Available filters: page, per_page, status, sort_by, sort_order, search_by
	 *
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#contacts
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
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#contacts
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
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#contacts-id
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
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#contacts-id
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
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#contacts-id
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
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#contacts-id
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
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#contact_fields
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
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#contact_fields-id
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
	 * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#contact_fields-id
	 */
	public function updateContactField($contactFieldId, array $data = [])
	{
		return $this->sendRequest(
			$this->createRequest('PATCH', sprintf('contact_fields/%d', $contactFieldId), [], $data)
		);
	}

    /**
     * updateContactField
     *
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#contacts-bulk
     */
    public function getContactsBulk()
    {
        return $this->sendRequest(
            $this->createRequest('GET', 'contacts/bulk', [])
        );
    }

    /**
     * updateContactField
     *
     * @param array $data - See API docs for available fields
     * @return \Spliced\SurveyMonkey\Response
     *
     * @see https://developer.surveymonkey.com/api/v3/#contacts-bulk
     */
    public function createMultipleContacts(array $data)
    {
        return $this->sendRequest(
            $this->createRequest('POST', 'contacts/bulk', [], $data)
        );
    }
}
