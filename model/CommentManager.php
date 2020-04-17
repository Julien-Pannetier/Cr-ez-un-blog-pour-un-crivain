<?php
class CommentManager extends Database {

    public function getComments($postId) {
        $query = 'SELECT id, author, comment, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh%imin%ss") AS date FROM comments WHERE post_id = ? ORDER BY comment_date';
        
        return $this->query($query, [$postId]);
    }


    public function postComment($postId, $author, $authorEmail, $comment) {
        $query = 'INSERT INTO comments(post_id, author, author_email, comment, comment_date) VALUES(?, ?, ?, ?, NOW())';
        $affectedLines = $this->query($query, [$postId, $author, $authorEmail, $comment]);

        return $affectedLines;

    }
}