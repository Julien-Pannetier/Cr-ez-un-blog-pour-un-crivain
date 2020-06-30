<?php
require_once ('./model/Database.php');
require_once ('./model/CommentManager.php');

class CommentController {
    // Constructor
    public function __construct() {
        $this->commentManager = new CommentManager();
    }

    public function addComment($postId, $author, $authorEmail, $comment) {
        $affectedLines = $this->commentManager->addComment($postId, $author, $authorEmail, $comment);

        if ($affectedLines === false) {
            Functions::flash('Impossible d\'ajouter le commentaire !', 'error');
            header('Location: index.php');
        } else {
            Functions::flash('Le commentaire a bien été ajouté !', 'success');
            header('Location: index.php?action=post&id=' . $postId);
        }
    }

    public function reportComment($commentId, $postId) {
        $reportComment = $this->commentManager->reportComment($commentId);

        if ($reportComment === false) {
            Functions::flash('Impossible de signaler le commentaire !', 'error');
            header('Location: index.php');
        }
        else {
            Functions::flash('Le commentaire a bien été signalé !', 'success');
            header('Location: index.php?action=post&id=' . $postId);
        }
    }

    public function getComments() {
        $comments = $this->commentManager->getComments();

        require_once('./view/backend/comments.php');
    }

    public function getReportComments() {
        $reportComments = $this->commentManager->getReportComments();

        require_once('./view/backend/dashbord.php');
    }

    public function approveComment($commentId) {
        $approveComment = $this->commentManager->approveComment($commentId);

        if ($approveComment === false) {
            Functions::flash('Impossible d\'approuver le commentaire !', 'error');
            require_once('./view/backend/dashbord.php');
        } else {
            Functions::flash('Le commentaire a bien été approuvé !', 'success');
            header('Location: index.php?action=dashbord');
        }
    }

    public function displayUpdateComment($commentId) {
        $comment = $this->commentManager->getComment($commentId);

        require_once('./view/backend/updatecomment.php');
    }

    public function updateComment($commentId, $comment) {
        $updateComment = $this->commentManager->updateComment($commentId, $comment);
        $approveComment = $this->commentManager->approveComment($commentId);

        if ($updateComment === false) {
            Functions::flash('Impossible de modifier le commentaire !', 'error');
            require_once('./view/backend/dashbord.php');
        } else {
            Functions::flash('Le commentaire a bien été modifié !', 'success');
            header('Location: index.php?action=comments');
        }
    }

    public function deleteComment($commentId) {
        $deleteComment = $this->commentManager->deleteComment($commentId);

        if ($deleteComment === false) {
            Functions::flash('Impossible de supprimer le commentaire !', 'error');
            require_once('./view/backend/dashbord.php');
        } else {
            Functions::flash('Le commentaire a bien été supprimé !', 'success');
            header('Location: index.php?action=dashbord');
        }
    }
}