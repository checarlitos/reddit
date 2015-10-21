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
	 * Id for this postHandel if for who wrote this post; this is the foreign key
	 */
	private $userHandle;

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
	 * @param int $newPostId new value of profile id
	 * @throws InvalidArgumentException if $newpostId is not an integer
	 */
	public function setPostId($newPostId) {
		//base case
		if($newPostId === null){
				$this->postId = null;
		}

		//verify the post id is valid
		$newPostId = filter_var($newPostId, FILTER_VALIDATE_INT);
		if($newPostId === false) {
			throw (new InvalidArgumentException ("post id is not valid integer"));
		}

		//verify the post id is positive
		if($newPostId <= 0) {
					throw(new RangeException("post id is not positive"))
		}

		// convert and store the post id
		$this->postId = intval($newPostId);
	}

	/**
	 * accessor method for user name
	 */
	public function getUserName() {
		return($this->userName);
	}


}//end Post class