<?php
require_once ('./model/Post.php');

class PostManager extends Database {

    public function getPost($postId) {
        $query = 'SELECT id, title, content, DATE_FORMAT(creation_date, "%d/%m/%Y") AS date FROM posts WHERE id = ?';
        $data = $this->query($query, [$postId])->fetch();

        return new Post($data);
    }

    public function getPosts($limit = 0, $offset = 1000000) {
        $posts = [];
        $query = 'SELECT id, title, content, DATE_FORMAT(creation_date, "%d/%m/%Y") AS date FROM posts ORDER BY creation_date DESC LIMIT 0, 5';
        $req = $this->query($query, [$limit, $offset]);

        while ($data = $req->fetch()) {
            $posts[] = new Post($data);
        }              
        return $posts;
    }

    public function addPost(Post $post) {
        $query = 'INSERT INTO posts(title, content, creation_date) VALUES(?, ?, NOW())';

        $query->bindParam(1, $post->title(), PDO::PARAM_STR);
        $query->bindParam(2, $post->content(), PDO::PARAM_STR);


        $affectedLines = $this->query($query);

        return $affectedLines;
    }

    public function updatePost(Post $post) {
        $query = 'UPDATE posts SET title = ?, content = ? WHERE id = ?';
        $query->bindValue('1', $post->title(), PDO::PARAM_STR);
        $query->bindValue('2', $post->content(), PDO::PARAM_STR);
        $query->bindValue('3', $post->id(), PDO::PARAM_INT);

        return $this->query($query);
    }

    public function deletePost($postId) {
        $query = 'DELETE FROM posts WHERE id = ?';
        
        return $this->query($query, [$postId]);
    }
}