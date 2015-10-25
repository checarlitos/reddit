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
	 * Id for this Handle if for who wrote this post; this is the foreign key
	 */
	private $handle;

	/**
	 * Post content for this post
	 */
	private $contents;

	/**
	 *
	 * @param mixed $newPostId id of this Post or null if a new Post
	 * @param int $newHandle id of the user that sent this Post
	 * @param string $newContents string containing actual Post data
	 * @throws InvalidArgumentException if data types are not valid
	 * @throws RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws Exception if some other exception is thrown
	 *
	 */
	public function __construct($newPostId, $newHandle, $newContents){
		try{
					$this->setPostId($newPostId);
					$this->setHandle($newHandle);
					$this->SetContents($newContents);
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

	/**
	 * accessor method for post id
	 *
	 * @return int value of post id
	 */
	public function getPostId() {
		return ($this->postId);
	}

	/**
	 *  mutator method for post id
	 *
	 * @param int $newPostId new value of profile id
	 * @throws InvalidArgumentException if $newPostId is not an integer
	 */
	public function setPostId($newPostId) {
		//base case
		if($newPostId === null) {
			$this->postId = null;
		}

		//verify the post id is valid
		$newPostId = filter_var($newPostId, FILTER_VALIDATE_INT);
		if($newPostId === false) {
			throw (new InvalidArgumentException ("post id is not valid integer"));
		}

		//verify the post id is positive
		if($newPostId <= 0) {
			throw(new RangeException("post id is not positive"));
		}

		// convert and store the post id
		$this->postId = intval($newPostId);
	}

	/**
	 * accessor method for post Handle
	 *
	 * @return int value of post Handle
	 */
	public function getHandle() {
		return ($this->handle);
	}

	/**
	 * mutator method for Post Handle Id
	 *
	 * @param int $newPostHandle new value of profile id
	 * @throws InvalidArgumentException if $newPostHandle is not an integer
	 */
	public function setHandle($newHandle) {
		// base case
		if($newHandle === null) {
			$this->handle = null;
		}

		//verify the post handel id is valid
		$newHandle = filter_var($newHandle, FILTER_VALIDATE_INT);
		if($newHandle === false) {
			throw (new InvalidArgumentException("postHandle id is not valid integer"));
		}

		//verify the postHandle id is positive
		if($newHandle <= 0) {
			throw(new RangeException("postHandle id is not positive"));
		}

		// convert and store the postHandle
		$this->userHandle = intval($newHandle);
	}


	/**
	 * mutator method for post contents
	 *
	 * @param string $newPostContents new value of comment contents
	 * @throws InvalidArgumentException if $newPostContents is not a string or insecure
	 * @throws RangeException if $newPostComment is > 140 characters
	 */

		Public function setContents($newPostContents){
			//verify the comment content is secure
			$newPostContents = trim($newPostContents);
			$newPostContents = filter_var($newPostContents, FILTER_SANITIZE_STRING);
			if(empty($newPostContents)=== true){
						throw(new InvalidArgumentException ("comment content is empty or insecure"));
			}

			//verify the comment content will fit in the database
			if(strlen ($newPostContents) > 140){
					throw(new RangeException("comment content to large"));
			}

			//store the comment content
			$this->contents = $newPostContents;

		}

/**
 * insert this Tweet into mySQL
 *
 * @param PDO $pdo pointer to PDO connection, by reference
 * @throws PDOException when mysql related errors occur
 */

	public function insert(PDO &$pdo) {
			//enforce the postId is null (i.e., don't insert a tweet that already exists)
			if($this->postId !== null) {
					throw(new PDOException("not a new post"));
			}

			// create query template

				$query = "INSERT INTO post(handle, contents) VALUES(:handle, :contents)";
				$statement = $pdo->prepare($query);

				//blind the member variables to the place holders in the template
				$parameters = array("postId" => $this->postId, "newPostContents" => $this->contents);
				$statement->execute($parameters);

				//update the null postId with what mySQL just gave us
				$this->postId = intval($pdo->lastInsertId());

}

}//end Post class