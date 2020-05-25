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
        $id = (int) $id;
        if ($id > 0) {
            $this->id = $id;
        }
    }

    public function setTitle($title) {
        if (is_string($title)) {
            $this->title = $title;
        }
    }

    public function setContent($content) {
        if (is_string($content)) {
            $this->content = $content;
        }
    }

    public function setDate($date) {
        $this->date = $date;
    }
}