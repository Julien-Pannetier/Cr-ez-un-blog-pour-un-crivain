<?php
require_once ('./model/Database.php');
require_once ('./model/CommentManager.php');

class CommentController {
    // Constructor
    public function __construct() {
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();
    }

    public function addComment($postId, $author, $authorEmail, $comment) {
        $affectedLines = $this->commentManager->postComment($postId, $author, $authorEmail, $comment);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?action=post&id=' . $postId);
        }
    }

    public function reportComment($commentId, $postId) {
        $reportComment = $this->commentManager->reportComment($commentId);

        if ($reportComment === false) {
            throw new Exception('Impossible de signaler le commentaire !');
        }
        else {
            header('Location: index.php?action=post&id=' . $postId);
        }
    }

    public function getAllComments() {
        $comments = $this->commentManager->getAllComments();

        require('./view/backend/comments.php');
    }

    public function getReportComments() {
        $reportComments = $this->commentManager->getReportComments();

        require('./view/backend/dashbord.php');
    }

    public function approveComment($commentId) {
        $approveComment = $this->commentManager->approveComment($commentId);

        if ($approveComment === false) {
            throw new Exception('Impossible d\'approuver le commentaire !');
        } else {
            header('Location: index.php?action=dashbord');
        }
    }

    public function displayEditComment($commentId) {
        $comment = $this->commentManager->getComment($commentId);

        require('./view/backend/editcomment.php');
    }

    public function editComment($commentId, $comment) {
        $editComment = $this->commentManager->editComment($commentId, $comment);
        $approveComment = $this->commentManager->approveComment($commentId);

        if ($editComment === false) {
            throw new Exception('Impossible d\'éditer le commentaire !');
        } else {
            header('Location: index.php?action=dashbord');
        }
    }

    public function deleteComment($commentId) {
        $deleteComment = $this->commentManager->deleteComment($commentId);

        if ($deleteComment === false) {
            throw new Exception('Impossible de supprimer le commentaire !');
        } else {
            header('Location: index.php?action=dashbord');
        }
    }
}