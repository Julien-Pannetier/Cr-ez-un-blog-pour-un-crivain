<?php
require_once ('./model/Database.php');
require_once ('./model/CommentManager.php');

class CommentController {
    // Constructor
    public function __construct() {
        $this->commentManager = new CommentManager();
    }

    public function addComment($postId, $author, $authorEmail, $comment) {
        $affectedLines = $this->commentManager->postComment($postId, $author, $authorEmail, $comment);

        if ($affectedLines === false) {
            $errorMessage = 'Impossible d\'ajouter le commentaire !';
        } else {
            header('Location: index.php?action=post&id=' . $postId);
        }
    }

    public function reportComment($commentId, $postId) {
        $reportComment = $this->commentManager->reportComment($commentId);

        if ($reportComment === false) {
            $errorMessage = 'Impossible de signaler le commentaire !';
        }
        else {            
            header('Location: index.php?action=post&id=' . $postId);
        }
    }

    public function getComments() {
        $comments = $this->commentManager->getComments();

        require('./view/backend/comments.php');
    }

    public function getReportComments() {
        $reportComments = $this->commentManager->getReportComments();

        require('./view/backend/dashbord.php');
    }

    public function approveComment($commentId) {
        $approveComment = $this->commentManager->approveComment($commentId);

        if ($approveComment === false) {
            $errorMessage = 'Impossible d\'approuver le commentaire !';
        } else {
            header('Location: index.php?action=dashbord');
        }
    }

    public function displayUpdateComment($commentId) {
        $comment = $this->commentManager->getComment($commentId);

        require('./view/backend/updatecomment.php');
    }

    public function updateComment($commentId, $comment) {
        $updateComment = $this->commentManager->updateComment($commentId, $comment);
        $approveComment = $this->commentManager->approveComment($commentId);

        if ($updateComment === false) {
            $errorMessage = 'Impossible de modifier le commentaire !';
        } else {
            header('Location: index.php?action=dashbord');
        }
    }

    public function deleteComment($commentId) {
        $deleteComment = $this->commentManager->deleteComment($commentId);

        if ($deleteComment === false) {
            $errorMessage = 'Impossible de supprimer le commentaire !';
        } else {
            header('Location: index.php?action=dashbord');
        }
    }
}