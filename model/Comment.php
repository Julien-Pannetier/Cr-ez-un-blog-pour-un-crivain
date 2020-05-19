<?php
require_once ('./model/Model.php');

class Comment extends Model {

    protected $id;
    protected $postId;
    protected $author;
    protected $authorEmail;
    protected $comment;
    protected $reported;
    protected $moderated;
    protected $date;

    // Constructor
    public function __construct(array $comment) {
        $this->hydrate($comment);
    }

    // Getters
    public function Id() {
        return $this->id;
    }

    public function PostId() {
        return $this->postId;
    }

    public function Author() {
        return $this->author;
    }

    public function AuthorEmail() {
        return $this->authorEmail;
    }

    public function Comment() {
        return $this->comment;
    }

    public function Reported() {
        return $this->reported;
    }

    public function Moderated() {
        return $this->moderated;
    }

    public function Date() {
        return $this->date;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setPostId($postId) {
        $this->postId = $postId;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function setAuthorEmail($authorEmail) {
        $this->authorEmail = $authorEmail;
    }

    public function setComment($comment) {
        $this->comment = $comment;
    }

    public function setReported($reported) {
        $this->reported = $reported;
    }

    public function setModerated($moderated) {
        $this->moderated = $moderated;
    }

    public function setDate($date) {
        $this->date = $date;
    }
}