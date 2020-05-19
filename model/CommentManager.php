<?php
require_once ('./model/Comment.php');

class CommentManager extends Database {

    public function getComment($commentId) {
        $query = 'SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh%imin%ss") AS date FROM comments WHERE id = ?';
        $data = $this->query($query, [$commentId])->fetch();

        return new Comment($data);
    }

    public function getComments() {
        $comments = [];
        $query = 'SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh%imin%ss") AS date, moderated FROM comments ORDER BY comment_date DESC';
        $req = $this->query($query);

        while ($data = $req->fetch()) {
            $comments[] = new Comment($data);
        }
        return $comments;
    }

    public function getCommentsByPostId($postId) {
        $comments = [];
        $query = 'SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh%imin%ss") AS date, moderated FROM comments WHERE post_id = ? ORDER BY comment_date';
        $req = $this->query($query, [$postId]);

        while ($data = $req->fetch()) {
            $comments[] = new Comment($data);
        }
        return $comments;
    }

    public function postComment($postId, $author, $authorEmail, $comment) {
        $query = 'INSERT INTO comments(post_id, author, author_email, comment, comment_date, reported) VALUES(?, ?, ?, ?, NOW(), 0)';
        $affectedLines = $this->query($query, [$postId, $author, $authorEmail, $comment]);

        return $affectedLines;
    }

    public function reportComment($commentId) {
        $query = 'UPDATE comments SET reported = reported + 1 WHERE id = ?';
        
        return $this->query($query, [$commentId]);
    }

    public function getReportComments() {
        $comments = [];
        $query = 'SELECT id, author, comment, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh%imin%ss") AS date, reported, moderated FROM comments WHERE reported > 0 AND moderated IS NULL ORDER BY reported DESC';
        $req = $this->query($query);

        while ($data = $req->fetch()) {
            $comments[] = new Comment($data);
        }
        return $comments;
    }

    public function approveComment($commentId) {
        $query = 'UPDATE comments SET moderated = NOW() WHERE id = ?';

        return $this->query($query, [$commentId]);
    }

    public function editComment($commentId, $comment) {
        $query = 'UPDATE comments SET comment = ? WHERE id = ?';
        $affectedLines = $this->query($query, [$comment, $commentId]);

        return $affectedLines;
    }

    public function deleteComment($commentId) {
        $query = 'DELETE FROM comments WHERE id = ?';
        
        return $this->query($query, [$commentId]);
    }

    public function deleteComments($postId) {
        $query = 'DELETE FROM comments WHERE post_id = ?';
        
        return $this->query($query, [$postId]);
    }
}