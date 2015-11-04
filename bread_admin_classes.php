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
	 * Id for the The Administrator users First Name
	 */
	private $adminFirstName;

	/**
	 * Id for the The Administrator users First Name
	 */
	private $adminLastName;


	/**
	 * Id for the The Administrator Email address.
	 */
	private $adminEmail;

	/**
	 * Id for the activation of Administrators Email address.
	 */
	private $adminEmailActivation;

	/**
	 * Id for the The Administrator contact phone number
	 */
	private $adminPhone;

	/**
	 * Id for the hash on The Administrator password
	 */
	private $adminHash;

	/**
	 * Id for thr encrypted Administrator password salt data.
	 */
	private $adminSalt;

?>

