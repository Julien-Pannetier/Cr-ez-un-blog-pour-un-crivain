<?php
class PostManager extends Database {

    public function getAllPosts() {
        $query = 'SELECT id, title, content, DATE_FORMAT(creation_date, "%d/%m/%Y") AS date FROM posts ORDER BY creation_date DESC';
        
        return $this->query($query);
    }


    public function getPosts() {       
        $query = 'SELECT id, title, content, DATE_FORMAT(creation_date, "%d/%m/%Y") AS date FROM posts ORDER BY creation_date DESC LIMIT 0, 5';
        
        return $this->query($query);
    }


    public function getPost($postId) {
        $query = 'SELECT id, title, content, DATE_FORMAT(creation_date, "%d/%m/%Y") AS date FROM posts WHERE id = ?';
        
        return $this->query($query, [$postId])->fetch();
    }
}