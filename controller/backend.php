<?php
require_once ('./model/Database.php');
require_once ('./model/PostManager.php');
require_once ('./model/CommentManager.php');
require_once ('./model/LoginManager.php');


function login($email, $password)
{
	$loginManager = new LoginManager();
	$user = $loginManager->login($email, $password);

	if ($user === false) {
		die("L'identifiant ou le mot de passe est incorrect");
	} else {
		header('Location: index.php?action=dashbord');
	}
}

function displayDashbord()
{
	require('./view/backend/dashbord.php');
}

function logout() 
{
    //setcookie('remember', NULL, -1);
    unset($_SESSION['admin']);
    header('location:index.php');
}

function getAllPosts()
{
    $postManager = new PostManager();
    $posts = $postManager->getAllPosts();

    require('./view/backend/posts.php');
}

function getAllComments()
{
    $commentManager = new CommentManager();
    $comments = $commentManager->getAllComments();

    require('./view/backend/comments.php');
}

function getReportComments() {
    $commentManager = new CommentManager();
    $reportComments = $commentManager->getReportComments();

    require('./view/backend/dashbord.php');
}

function approveComment($commentId) {
    $commentManager = new CommentManager();
    $approveComment = $commentManager->approveComment($commentId);

    if ($approveComment === false) {
        die("Impossible d'approuver le commentaire !");
    } else {
        header('Location: index.php?action=dashbord');
    }
}


function modifyComment($commentId) {

}


function editComment($commentId, $comment) {
    $commentManager = new CommentManager();
    $editComment = $commentManager->editComment($commentId, $comment);

    if ($editComment === false) {
        die("Impossible d'éditer le commentaire !");
    } else {
        header('Location: index.php?action=dashbord');
    }
}


function deleteComment($commentId) {
    $commentManager = new CommentManager();
    $deleteComment = $commentManager->deleteComment($commentId);

    if ($deleteComment === false) {
        die("Impossible de supprimer le commentaire !");
    } else {
        header('Location: index.php?action=dashbord');
    }
}