<?php
/**
*Typical post for a Social Networking site.
 * this post is a example of data collected and stored about a user for social networking pourposes
 *
 * @author Carlos Beraun AKA CarlosMacUser cberaun2@cnm.edu
**/

class Post {
	/**
	 * id for this Post: this is the primary key
	 */
	private $postId;


	/**
	 * ID for this postHandel if for who wrote this post; this is the foreign key
	 */
	private $postHandelId;


	/**
	 * post vote for this post
	 */
	private $postVote;

	/**
	 * Post content for this post
	 */
	private $postComment;

	/**
	 * accessor method for post id
	 *
	 * @return int value of post id
	 */
	public function getpostId() {
		return ($this->postId);
	}

	/**
	 *  mutator method for post id
	 *
	 * @param int $newPostID new value of profile id
	 * @throws UnexpectedValueException if $newpostId is not an integer
	 */
	public function setPostId($newPostId) {
		$newPostId = filter_var($newPostId, FILTER_VALIDATE_INT);
		if($newPostId === false) {
			throw (new UnexpectedValueException ("post id is not valid integer"));
		}

		// convert and store the post id
		$this->postId = intval($newPostId);

		/**
		 * accessor method for user name
		 */
		public function getUserName() {
			return($this->userName);
		}

	}
}


?>


