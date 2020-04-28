<?php
class CommentManager extends Database {

    public function getAllComments() {
        $query = 'SELECT id, post_id, author, comment, moderated, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh%imin%ss") AS date FROM comments ORDER BY comment_date DESC';
        
        return $this->query($query);
    }


    public function getComments($postId) {
        $query = 'SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh%imin%ss") AS date FROM comments WHERE post_id = ? ORDER BY comment_date';
        
        return $this->query($query, [$postId]);
    }


    public function getComment($commentId) {
        $query = 'SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh%imin%ss") AS date FROM comments WHERE id = ?';
        
        return $this->query($query, [$commentId])->fetch();
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
        $query = 'SELECT id, author, comment, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh%imin%ss") AS date, reported, moderated FROM comments WHERE reported > 0 AND moderated IS NULL ORDER BY reported DESC';
        
        return $this->query($query);
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