<?php
/**
 * Administrator for Bread Basket.
 * this post is for Administrator classes.
 *
 * @author Carlos Beraun AKA CarlosMacUser cberaun2@cnm.edu
 **/

class Administrator {
	/**
	 * Id for this Administrator: this is the primary key
	 */
	private $adminId;

	/**
 * Id for this Volunteer is for who claims a listing; this is the foreign key
 */
	private $volId;

	/**
	 * Id for this Organization is for the organization that claims listing; this is the foreign key
	 */
	private $orgId;

	/**
	 * Id for the The Administrator Email address.
	 */
	private $adminEmail;

	/**
	 * Id for the activation of Administrators Email address.
	 */
	private $adminEmailActivation;

	/**
	 * Id for the The Administrator users First Name
	 */
	private $adminFirstName;

	/**
	 * Id for the hash on The Administrator password
	 */
	private $adminHash;

	/**
	 * Id for the The Administrator users Last Name
	 */
	private $adminLastName;

	/**
	 * Id for the The Administrator contact phone number
	 */
	private $adminPhone;

	/**
	 * Id for thr encrypted Administrator password salt data.
	 */
	private $adminSalt;

/**
 * Constructors for this Administrator ID
 *
 * @param $newAdminId
 * @param $newVolId
 * @param $newOrgId
 * @param $newAdminEmailId
 * @param $newAdminEmailActivation
 * @param $newAdminFirstNameId
 * @param $newAdminHashId
 * @param $newAdminLastNameId
 * @param $newAdminPhoneId
 * @param $newAdminSaltId
 * @throws Exception
 *
 */

public function __construct($newAdminId, $newVolId, $newOrgId, $newAdminEmailId, $newAdminEmailActivation, $newAdminFirstNameId, $newAdminHashId, $newAdminLastNameId, $newAdminPhoneId, $newAdminSaltId){
	try{
		$this->setAdminId($newAdminId);
		$this->setVolId($newVolId);
		$this->SetOrgId($newOrgId);
		$this->setAdminEmailId($newAdminEmailId);
		$this->setAdminEmailActivation($newAdminEmailActivation);
		$this->SetFirstNameId($newAdminFirstNameId);
		$this->SetAdminHashId($newAdminHashId);
		$this->SetAdminPhoneId($newAdminPhoneId);
		$this->SetAdminSaltId($newAdminSaltId);
	} catch(invalidArgumentException $invalidArgument) {
		// rethrow the exception to the user
		throw(new InvalidArgumentException($invalidArgument-> getMessage(), 0, $invalidArgument));
	} catch(RangeException $range) {
		// rethrow the exception to the user
		throw(new RangeException($range->getMessage(), 0, $range));
	}catch(Exception $exception){
		// rethrow generic exception
		throw(new Exception($exception->getMessage(), 0, $exception));
	}

}

?>

