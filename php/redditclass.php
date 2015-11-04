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
	 * mutator method for Post Handle
	 *
	 * @param int $newPostHandle new value of handle
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
		$this->handle = intval($newHandle);
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
				$parameters = array("handle" => $this->handle, "contents" => $this->contents);
				$statement->execute($parameters);

				//update the null postId with what mySQL just gave us
				$this->postId = intval($pdo->lastInsertId());

	}


	/**
	 * delete this post from mySQL
	 *
	 * @param PDO $pdo pointer to pdo connection, by reference
	 * @throws PDOException when mySQL related errors occur
	 */

	Public function delete(PDO &$pdo) {
			// enforce the post Id is nor null (i.e., don not delete a post that has not been inserted)
			if($this->postId === null){
					throw(new PDOException("usable to delete a post that does not exist"));
			}

			//create query template
			$query  = "DELETE FROM post WHERE postId = :postId";
			$statement  = $pdo->prepare($query);

		 //blind the member variables to the place holder in the template
		$parameters = array("postId" => $this->postId);
		$statement->execute($parameters);
	}

	/**
	 * update this Post in mySQL
	 *
	 * @param PDO $pdo pointer to PDO connection, by reference
	 * @throws PDOException when mySQL related errors occur
	 */

	public function update(PDO &$pdo) {
				//enfroce the tweet is is not null (i.e., do not update a post that has not been inserted)
				if($this->postId === null) {
							throw(new PDOException("unable to update a post that does not exist"));
				}

				// create query template
				$query = "UPDATE post SET handle = :handle, contents = :content, WHERE postId = :postId";
				$statement = $pdo->prepare($query);

				//blind the member variable to the place holders in the template
				$parameters = array("handle" => $this->handle, "contents" => $this->contents, "postId" => $this-> postId);
				$statement ->execute($parameters);
		}

		/**
		 * get the post by content
		 *
		 * @param PDO $pdo pointer to PDO connection, by reference
		 * @param string $contents post content to search for
		 * @return SplFixedArray Array all posts found for this content
		 * @throw PDOException when mySQL related errors occur
		 */
		public static function getPostByContents(PDO &$pdo, $contents){
				// sanitize the description before searching
				$contents = trim($contents);
				$contents = filter_var($contents, FILTER_SANITIZE_STRING);
				if(empty ($contents) === true) {
							throw(new PDOException ("post content is invalid"));
				}

			// create query template
				$query ="SELECT postId, handle, contents FROM post WHERE contents LIKE :contents";
				$statement = $pdo->Prepare($query);

				// bind the post content to the place holder in the template
				$contents = "%$contents%";
				$parameters = array("contents" => $contents);
				$statement->execute($parameters);

				// build a array of posts
				$posts = new SplFixedArray($statement->rowCount());
				$statement->setFetchMode(PDO::FETCH_ASSOC);
				while(($row = $statement->fetch()) !==false) {
							try {
										$post = new Post($row["postId"], $row["contents"]);
										$posts[$posts->key()] = $post;
										$posts->next();
							}  catch(exception $exception){
										// if the row could not be converted, rethrow it
										Throw(new PDOException($exception->getMessage(), 0, $exception));
							}
				}
				return($posts);
		}

	/**
	 * gets the post by postId
	 *
	 * @param PDO $pdo pointer to PDO connection, by reference
	 * @param int $postId post id to search for
	 * @return mixed Post found or null if not found
	 * @throws PDOException when mySQL related errors occur
	 */
	public static function getPostbyPostId(PDO &$pdo, $postId) {
		//sanitize the postId before searching
		$postId = filter_var($postId, FILTER_VALIDATE_INT);
		if($postId === false) {
			throw(new PDOException("post id is not an integer"));
		}
		if($postId <= 0) {
			throw(new PDOException ("post id is not positive"));
		}

		// create query template
		$query = "SELECT postId, handle, contents FROM post WHERE postId = :postId";
		$statement = $pdo->prepare($query);

		// bind the post id to the place holder in the tamplate
		$parameters = array("postId" => $postId);
		$statement->execute($parameters);

		// grab the post from mySQL
		TRY {
			$post = null;
			$statement->setFetchMode(PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$post = new Post($row ["postId"], $row["handle"], $row["contents"]);
			}
		} catch(Exception $exception) {
			// if the row could not be converted, rethow it
			throw(new PDOException($exception->getMessage(), 0, $exception));
		}
		return ($post);
	}

	/**
	 * gets all Posts
	 *
	 * @param PDO $pdo pointer to PDO connection, by reference
	 * @return SplFixedArray all Posts found
	 * @throws PDO Exception When mySQL related errors occur
	 */
	public static function getAllPosts(pdo &$pdo) {
				// create query template
				$query = "SELECT postId, handle, contents FROM post";
				$statement = $pdo->prepare($query);
				$statement->execute();

				// build an array of posts
				$posts = new SplFixedArray($statement->rowCount());
				$statement->setFetchMode(PDO::FETCH_ASSOC);
				while(($row = $statement->fetch()) !== false) {
						try{
								$post = new Post($row["postId"], $row["handle"], $row["contents"]);
								$posts[$posts->key()] = $post;
								$posts->next();
						} catch(exception $exception) {
								// if the row cound not be converted, rethrow it
								throw(new PDOException($exception->getMessage(), 0, $exception));
						}
				}
				return($posts);
	}

}//end Post class