<?php
require_once ('./model/Model.php');

class Post extends Model {

    protected $id;
    protected $title;
    protected $content;
    protected $date;

    // Constructor
    public function __construct(array $post) {
        $this->hydrate($post);
    }

    // Getters
    public function id() {
        return $this->id;
    }

    public function title() {
        return $this->title;
    }

    public function content() {
        return $this->content;
    }

    public function date() {
        return $this->date;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function setDate($date) {
        $this->date = $date;
    }
}