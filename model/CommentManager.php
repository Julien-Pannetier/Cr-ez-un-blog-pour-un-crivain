<?php
require_once ('./model/Comment.php');

class CommentManager extends Database {

    public function getComment($commentId) {
        $query = 'SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh%imin%ss") AS date FROM comments WHERE id = :commentId';
        $db = $this->checkConnection();
        $req = $db->prepare($query);
        $req->bindParam("commentId", $commentId, PDO::PARAM_INT);
        $req->execute();
        while ($data = $req->fetch()) {
            $comment = new Comment($data);
        }
        return $comment;
    }

    public function getComments() {
        $comments = [];
        $query = 'SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh%imin%ss") AS date, moderated FROM comments ORDER BY comment_date DESC';
        $db = $this->checkConnection();
        $req = $db->prepare($query);
        $req->execute();
        while ($data = $req->fetch()) {
            $comments[] = new Comment($data);
        }
        return $comments;
    }

    public function getCommentsByPostId($postId) {
        $comments = [];
        $query = 'SELECT id, post_id, author, author_email, comment, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh%imin%ss") AS date, reported, moderated FROM comments WHERE post_id = :postId ORDER BY comment_date';
        $db = $this->checkConnection();
        $req = $db->prepare($query);
        $req->bindParam("postId", $postId, PDO::PARAM_INT);
        $req->execute();
        while ($data = $req->fetch()) {
            $comments[] = new Comment($data);
        }
        return $comments;
    }

    public function addComment($postId, $author, $authorEmail, $comment) {
        $query = 'INSERT INTO comments(post_id, author, author_email, comment, comment_date, reported) VALUES (:postId, :author, :authorEmail, :comment, NOW(), 0)';
        $db = $this->checkConnection();
        $affectedLines = $db->prepare($query);
        $affectedLines->bindParam("postId", $postId, PDO::PARAM_INT);
        $affectedLines->bindParam("author", $author, PDO::PARAM_STR);
        $affectedLines->bindParam("authorEmail", $authorEmail, PDO::PARAM_STR);
        $affectedLines->bindParam("comment", $comment, PDO::PARAM_STR);
        $affectedLines->execute();
        return $affectedLines;
    }

    public function reportComment($commentId) {
        $query = 'UPDATE comments SET reported = reported + 1 WHERE id = :commentId';
        $db = $this->checkConnection();
        $reportComment = $db->prepare($query);
        $reportComment->bindParam("commentId", $commentId, PDO::PARAM_INT);
        $reportComment->execute();
        return $reportComment;
    }

    public function getReportComments() {
        $reportComments = [];
        $query = 'SELECT id, author, comment, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh%imin%ss") AS date, reported, moderated FROM comments WHERE reported > 0 AND moderated IS NULL ORDER BY reported DESC';
        $db = $this->checkConnection();
        $req = $db->prepare($query);
        $req->execute();
        while ($data = $req->fetch()) {
            $reportComments[] = new Comment($data);
        }
        return $reportComments;
    }

    public function approveComment($commentId) {
        $query = 'UPDATE comments SET moderated = NOW() WHERE id = :commentId';
        $db = $this->checkConnection();
        $approveComment = $db->prepare($query);
        $approveComment->bindParam("commentId", $commentId, PDO::PARAM_INT);
        $approveComment->execute();
        return $approveComment;
    }

    public function updateComment($commentId, $comment) {
        $query = 'UPDATE comments SET comment = :comment WHERE id = :commentId';
        $db = $this->checkConnection();
        $affectedLines = $db->prepare($query);
        $affectedLines->bindParam("comment", $comment, PDO::PARAM_STR);
        $affectedLines->bindParam("commentId", $commentId, PDO::PARAM_INT);
        $affectedLines->execute();
        return $affectedLines;
    }

    public function deleteComment($commentId) {
        $query = 'DELETE FROM comments WHERE id = :commentId';
        $db = $this->checkConnection();
        $affectedLines = $db->prepare($query);
        $affectedLines->bindParam("commentId", $commentId, PDO::PARAM_INT);
        $affectedLines->execute();
        return $affectedLines;
    }

    public function deleteComments($postId) {
        $query = 'DELETE FROM comments WHERE post_id = :postId';
        $db = $this->checkConnection();
        $affectedLines = $db->prepare($query);
        $affectedLines->bindParam("postId", $postId, PDO::PARAM_INT);
        $affectedLines->execute();
        return $affectedLines;
    }
}