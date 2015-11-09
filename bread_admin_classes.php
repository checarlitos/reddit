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
	 * @var int $adminId
	 */
	private $adminId;

	/**
	 *Id for this Volunteer is for the Volunteer that makes a claim on a listing; this is the foreign key
	 * @var int $volId
	 */
	private $volId;

	/**
	 * Id for this Organization is for the organization that claims listing; this is the foreign key
	 * @var int $orgId
	 */
	private $orgId;

	/**
	 * Id for the The Administrator Email address.
	 * @var string $adminEmail
	 */
	private $adminEmailId;

	/**
	 * Id for the activation of Administrators Email address.
	 * @var int $adminEmailActivation
	 */
	private $adminEmailActivation;

	/**
	 * Id for the The Administrator users First Name
	 * @var string $adminFirstName
	 */
	private $adminFirstName;

	/**
	 * Id for the hash on The Administrator password
	 * @var string $adminHash
	 */
	private $adminHash;

	/**
	 * Id for the The Administrator users Last Name
	 * @var string $adminLastName
	 */
	private $adminLastName;

	/**
	 * Id for the The Administrator contact phone number
	 * @var string $adminPhone
	 */
	private $adminPhone;

	/**
	 * Id for thr encrypted Administrator password salt data.
	 * @var string $admin
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

	public function __construct($newAdminId, $newVolId, $newOrgId, $newAdminEmailId, $newAdminEmailActivation, $newAdminFirstNameId, $newAdminHashId, $newAdminLastNameId, $newAdminPhoneId, $newAdminSaltId) {
		try {
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
			throw(new InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));


		} catch(RangeException $range) {
			// rethrow the exception to the user
			throw(new RangeException($range->getMessage(), 0, $range));


		} catch(Exception $exception) {
			// rethrow generic exception
			throw(new Exception($exception->getMessage(), 0, $exception));
		}

	}

	/**
	 * Accessor method for the Aministrator Id
	 */
	Public function getAdminId() {
		return ($this->adminId);
	}

	/**Mutator for Administrator ID
	 * @param Integer ; $newAdminId new value of Administrator Id
	 * @throw InvalidAgrumentException if the new Administrator Id is not an Integer.
	 **/
	Public function setAdminId($newAdminId) {
		//base case
		if($newAdminId === null) {
			$this->adminId = null;
			return;
		}

		//Verify the Administrator Id is valid
		$newAdminId = filter_var($newAdminId, FILTER_VALIDATE_INT);
		if($newAdminId === false) {
			throw(new InvalidArgumentException("This Administrator IS is not a valid iteger"));
		}

		//verify the Administrator ID is positive
		if($newAdminId <= 0) {
			throw (new RangeException("This Administrator IDis not positive"));
		}

		//convert and store the Administrator Id
		$this->adminId = intval($newAdminId);
	}

	/**
	 * Accessor method for the Volunteer Id
	 * @return integer value of Volunteer Id
	 */
	Public function getVolId() {
		return ($this->volId);
	}

	/**Mutator for Volunteer ID
	 * @param Integer ; $newVolId new value of Volunteer Id
	 * @throw InvalidArgumentException if the new Volunteer Id is not an Integer.
	 **/
	Public function setVolId($newVolId) {
		//base case
		if($newVolId === null) {
			$this->volId = null;
			return;
		}

		//Verify the Volunteer Id is valid
		$newVolId = filter_var($newVolId, FILTER_VALIDATE_INT);
		if($newVolId === false) {
			throw(new InvalidArgumentException("This Volunteer IS is not a valid iteger"));
		}

		//verify the Volunteer ID is positive
		if($newVolId <= 0) {
			throw (new RangeException("This Volunteer ID is not positive"));
		}

		//convert and store the Volunteer Id
		$this->volId = intval($newVolId);
	}

	/**
	 * accessor method for Organization ID
	 * @return int value of Organization ID
	 */
	public function getOrgID() {
		return ($this->orgId);
	}

	/**Mutator for Organization ID
	 * @param Integer ; $newOrgId new value of Organization Id
	 * @throw InvalidAgrumentException if the new Organization Id is not an Integer.
	 **/
	Public function setOrgId($newOrgId) {
		//base case
		if($newOrgId === null) {
			$this->adminId = null;
			return;
		}

		//Verify the Organization Id is valid
		$newOrgId = filter_var($newOrgId, FILTER_VALIDATE_INT);
		if($newOrgId === false) {
			throw(new InvalidArgumentException("This Organization ID is not a valid Number"));
		}

		//verify the Organization ID is good
		if($newOrgId <= 0) {
			throw (new RangeException("This Organization ID is not valid"));
		}

		//convert and store the Administrator Id
		$this->adminId = intval($newOrgId);
	}

	/**
	 * Accessor for Administrator Email; adminEmailId
	 * @return string value for adminEmail Id
	 */
		public function getAdminEmailId() {
			return($this->adminEmailId);
		}

	/**
	 * Mutator method for Administrator Email; adminEmailId
	 *
	 * @param String $adminEmailId new Administrator Email
	 * @throw InvalidArgumentException if $newAdminEmailId is not a string
	 * @throw rangeException if $newAdminEmailId is more than 128 characters
	 */
		public function setAdminEmailId($newAdminEmailId){

			//Verify the Email for Administrator is valid; adminEmailId
				$newAdminEmailId = trim($newAdminEmailId);
				$newAdminEmailId = filter_var($newAdminEmailId, FILTER_SANITIZE_EMAIL);
				if (empty($newAdminEmailId) ===true) {
						Throw(new InvalidArgumentException ("There is no content in this email"));
				}

			//Verify that the Administrator's Email message is no more than 128 characters
				if(strlen($newAdminEmailId) > 128){
					throw(new RangeException("Maximum amount of characters has been exceeded"));
				}

			//Convert and store this Administrator Email; adminEmailId
				$this->adminEmailId = $newAdminEmailId;
				}

	/**
	 * Accessor for Administrator Email Activation; adminEmailActivation
	 * @return string $newAdminEmailActivation
	 */
	public function setAdminEmailActivation($newAdminEmailActivation){

		//Verify Administrator Email is Valid
		$newAdminEmailActivation = filter_var($newAdminEmailActivation, FILTER_SANITIZE_STRING);
		if(strlen($newAdminEmailActivation) < 16) {
			throw(new InvalidArgumentException("activation code is insufficient or insecure pkk"));
		}

		//Verify Administrator Email "will fit in the DATABASE" pkk
		if(strlen($newAdminEmailActivation) > 16) {
			throw(new RangeException("Activation Code is too large pkk"));
		}

		//
	}

}


?>