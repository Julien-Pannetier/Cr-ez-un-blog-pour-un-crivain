<?php
require_once ('./model/Post.php');

class PostManager extends Database {

    public function getAllPosts() {
        $query = 'SELECT id, title, content, DATE_FORMAT(creation_date, "%d/%m/%Y") AS date FROM posts ORDER BY creation_date DESC';
        
        return $this->query($query);
    }

    public function getPosts() {
        $posts = [];
        $query = 'SELECT id, title, content, DATE_FORMAT(creation_date, "%d/%m/%Y") AS date FROM posts ORDER BY creation_date DESC LIMIT 0, 5';
        $req = $this->query($query);

        while ($data = $req->fetch()) {
            $posts[] = new Post($data);
        }              
        return $posts;
    }

    public function getPost($postId) {
        $query = 'SELECT id, title, content, DATE_FORMAT(creation_date, "%d/%m/%Y") AS date FROM posts WHERE id = ?';
        
        return $this->query($query, [$postId])->fetch();
    }

    public function addPost($title, $content) {
        $query = 'INSERT INTO posts(title, content, creation_date) VALUES(?, ?, NOW())';
        $affectedLines = $this->query($query, [$title, $content]);

        return $affectedLines;
    }

    public function editPost($postId, $title, $content) {
        $query = 'UPDATE posts SET title = ?, content = ?  WHERE id = ?';

        return $this->query($query, [$title, $content, $postId]);
    }

    public function deletePost($postId) {
        $query = 'DELETE FROM posts WHERE id = ?';
        
        return $this->query($query, [$postId]);
    }
}