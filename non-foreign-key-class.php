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
		return ($this-> postId);
	}

}



?>


