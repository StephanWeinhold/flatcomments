<?php
class Comment {
	
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
    
	public static function buildCommentFromPost() {
		if ($_POST['address'] !== '') {
			throw new Exception('No bots allowed.', 310);
		}
		
		$articleId = trim($_POST['articleId']);
        $userName = trim($_POST['name']);
		$userEmailAddress = trim($_POST['email']);
		$comment = trim($_POST['comment']);
        
        $timestampWritten = time();
        $id = $this->buildId($userName, $articleId, $timestampWritten);
		
		return new Comment($id, $articleId, $userName, $userEmailAddress, $comment);
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
    
	public function id() { 
        return $this->id;
    }
	
	public function articleId() {
		return $this->articleId;
	}
	
	public function userName()
	{
		if ($this->userName === null) {
			return '';
		}
        
		return htmlentities($this->userName);
	}
	
	public function userNameRaw() { 
        return $this->userName; 
    }
	
	public function userEmailAddress() {
		if ($this->userEmailAddress === null) {
			return '';
		}
        
		return htmlentities($this->userEmailAddress);
	}
	
	public function userEmailAddressRaw() {
		return $this->userEmailAddress;
	}
	
	public function comment() {
		$comment = $this->comment;
		
		$message = htmlentities($message);		
		$message = markdown($message);
		
		return strip_tags($comment, '<a><p><br>');
	}
	
	public function timestampWritten() {
		return $this->timestampWritten;
	}
	
	public function unlocked() {
		return $this->unlocked === true;
	}
}
