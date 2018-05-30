<?php
class Comment implements JsonSerializable {
	
	protected $id;
	protected $articleId;
	protected $userName;
	protected $userEmailAddress;
	protected $comment;
	protected $timestampWritten;
	protected $timestampUnlocked;
	protected $unlocked;
	protected $likesCount;
	protected $answerToCommentId;
	protected $answerToCount;

	public static function buildCommentFromPost($articleId, $userName, $userEmailAddress, $comment) {
		/* if ($_POST['address'] && $_POST['address'] !== '') {
			throw new Exception('No bots allowed.', 310);
		}

		$articleId = trim($_POST['articleId']);
		$userName = trim($_POST['name']);
		$userEmailAddress = trim($_POST['email']);
		$comment = trim($_POST['comment']); */

		$timestampWritten = time();
		$id = Comment::buildId($userName, $articleId, $timestampWritten);

		return new Comment($id, $articleId, $userName, $userEmailAddress, $comment, $timestampWritten);
	}

	function __construct($id, $articleId, $userName, $userEmailAddress, $comment, $timestampWritten, $unlocked = false) {
		$this->id = $id;
		$this->articleId = $articleId;
		$this->userName = $userName;
		$this->userEmailAddress = $userEmailAddress;
		$this->comment = $comment;
		$this->timestampWritten = $timestampWritten;
		$this->unlocked = $unlocked === true;
	}

	private function buildId($userName, $articleId, $timestampWritten) {
		return $articleId . '_' . strtolower(substr($userName, 0, 5)) . '_' . $timestampWritten;
	}

	public function getId() { return $this->id; }	
	public function getArticleId() { return $this->articleId; }
	
	public function getUserName() {
		if ($this->userName === null) {
			return '';
		}

		return htmlentities($this->userName);
	}

	public function getUserEmailAddress() {
		if ($this->userEmailAddress === null) {
			return '';
		}

		return htmlentities($this->userEmailAddress);
	}

	public function getComment() {
		$comment = $this->comment;		
		$comment = htmlentities($comment);		
		//$comment = markdown($comment);		
		return strip_tags($comment, '<a><p><br>');
	}

	public function getTimestampWritten() { return $this->timestampWritten; }	
	public function getUnlocked() { return $this->unlocked; }

	public function jsonSerialize() {
		return [
			'id' => $this->getId(),
			'articleId' => $this->getArticleId(),
			'userName' => $this->getUserName(),
			'userEmailAddress' => $this->getUserEmailAddress(),
			'comment' => $this->getComment(),
			'timestampWritten' => $this->getTimestampWritten(),
			'unlocked' => $this->getUnlocked()
		];
	}
}
