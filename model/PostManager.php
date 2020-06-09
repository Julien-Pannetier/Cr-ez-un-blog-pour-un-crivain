<?php
require_once ('./model/Post.php');

class PostManager extends Database {

    public function getPost($postId) {
        $query = 'SELECT id, title, content, DATE_FORMAT(creation_date, "%d/%m/%Y") AS date FROM posts WHERE id = ?';
        $data = $this->query($query, [$postId])->fetch();
        $post = !$data ? null : new Post($data);

        return $post;
    }

    public function getPosts($limit, $offset) {
        $posts = [];
        $query = 'SELECT id, title, content, DATE_FORMAT(creation_date, "%d/%m/%Y") AS date FROM posts ORDER BY creation_date DESC LIMIT 5 OFFSET 0';
        $req = $this->query($query, [$limit, $offset]);

        while ($data = $req->fetch()) {
            $posts[] = new Post($data);
        }              
        return $posts;
    }

    public function countPosts() {
        $query = 'SELECT id FROM posts';
        $req = $this->query($query);
        $numberOfPosts = $req->rowCount();
        return $numberOfPosts;
    }

    public function addPost($title, $content) {
        $query = 'INSERT INTO posts(title, content, creation_date) VALUES(?, ?, NOW())';
        $affectedLines = $this->query($query, [$title, $content]);

        return $affectedLines;
    }

    public function updatePost($postId, $title, $content) {
        $query = 'UPDATE posts SET title = ?, content = ? WHERE id = ?';
        $affectedLines = $this->query($query, [$title, $content, $postId]);

        return $affectedLines;
    }

    public function deletePost($postId) {
        $query = 'DELETE FROM posts WHERE id = ?';
        
        return $this->query($query, [$postId]);
    }
}