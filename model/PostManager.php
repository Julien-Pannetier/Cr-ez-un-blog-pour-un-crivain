<?php
require_once ('./model/Post.php');

class PostManager extends Database {

    public function getPost($postId) {
        $query = 'SELECT id, title, content, DATE_FORMAT(creation_date, "%d/%m/%Y") AS date FROM posts WHERE id = :postId';
        $db = $this->checkConnection();
        $req = $db->prepare($query);
        $req->bindParam("postId", $postId, PDO::PARAM_INT);
        $req->execute();

        while ($data = $req->fetch()) {
            $post = new Post($data);
        }

        return $post;
    }

    public function getPosts($offset, $limit) {
        $posts = [];
        $query = 'SELECT id, title, content, DATE_FORMAT(creation_date, "%d/%m/%Y") AS date FROM posts ORDER BY creation_date DESC LIMIT :offset, :limit';
        $db = $this->checkConnection();
        $req = $db->prepare($query);
        $req->bindParam("offset", $offset, PDO::PARAM_INT);
        $req->bindParam("limit", $limit, PDO::PARAM_INT);
        $req->execute();

        while ($data = $req->fetch()) {
            $posts[] = new Post($data);
        }

        return $posts;
    }

    public function countPosts() {
        $query = 'SELECT id FROM posts';
        $db = $this->checkConnection();
        $req = $db->prepare($query);
        $req->execute();
        $numberOfPosts = $req->rowCount();

        return $numberOfPosts;
    }

    public function addPost($title, $content) {
        $query = 'INSERT INTO posts(title, content, creation_date) VALUES (:title, :content, NOW())';
        $db = $this->checkConnection();
        $affectedLines = $db->prepare($query);
        $affectedLines->bindParam("title", $title, PDO::PARAM_STR);
        $affectedLines->bindParam("content", $content, PDO::PARAM_STR);
        $affectedLines->execute();

        return $affectedLines;
    }

    public function updatePost($postId, $title, $content) {
        $query = 'UPDATE posts SET title = :title, content = :content WHERE id = :postId';
        $db = $this->checkConnection();
        $affectedLines = $db->prepare($query);
        $affectedLines->bindParam("title", $title, PDO::PARAM_STR);
        $affectedLines->bindParam("content", $content, PDO::PARAM_STR);
        $affectedLines->bindParam("postId", $postId, PDO::PARAM_INT);
        $affectedLines->execute();

        return $affectedLines;
    }

    public function deletePost($postId) {
        $query = 'DELETE FROM posts WHERE id = :postId';
        $db = $this->checkConnection();
        $affectedLines = $db->prepare($query);
        $affectedLines->bindParam("postId", $postId, PDO::PARAM_INT);
        $affectedLines->execute();

        return $affectedLines;
    }
}