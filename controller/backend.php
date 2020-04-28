<?php
require_once ('./model/Database.php');
require_once ('./model/PostManager.php');
require_once ('./model/CommentManager.php');
require_once ('./model/LoginManager.php');


function login($email, $password) {
	$loginManager = new LoginManager();
	$user = $loginManager->login($email, $password);

	if ($user === false) {
		throw new Exception('L\'identifiant ou le mot de passe est incorrect');
	} else {
		header('Location: index.php?action=dashbord');
	}
}


function displayDashbord() {
	require('./view/backend/dashbord.php');
}


function logout() {
    //setcookie('remember', NULL, -1);
    unset($_SESSION['admin']);
    header('location:index.php');
}


function getAllPosts() {
    $postManager = new PostManager();
    $posts = $postManager->getAllPosts();

    require('./view/backend/posts.php');
}


function displayAddPost() {
    require('./view/backend/addpost.php');
}


function addPost($title, $content) {
    $postManager = new PostManager();
    $affectedLines = $postManager->addPost($title, $content);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter un nouveau chapitre !');
    } else {
        header('Location: index.php?action=posts');
    }
}


function displayEditPost($postId) {
    $postManager = new PostManager();
    $post = $postManager->getPost($postId);

    require('./view/backend/editpost.php');
}


function editPost($postId, $title, $content) {
    $postManager = new PostManager();
    $affectedLines = $postManager->editPost($postId, $title, $content);

    if ($affectedLines === false) {
        throw new Exception('Impossible de modifier le chapitre !');
    } else {
        header('Location: index.php?action=posts');
    }
}


function deletePost($postId) {
    $postManager = new postManager();
    $commentManager = new commentManager();

    $deletePost = $postManager->deletePost($postId);
    $deleteComments = $commentManager->deleteComments($postId);

    if ($deletePost === false OR $deleteComments === false) {
        throw new Exception('Impossible de supprimer le chapitre !');
    } else {
        header('Location: index.php?action=posts');
    }
}


function getAllComments() {
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
        throw new Exception('Impossible d\'approuver le commentaire !');
    } else {
        header('Location: index.php?action=dashbord');
    }
}


function displayEditComment($commentId) {
    $commentManager = new CommentManager();
    $comment = $commentManager->getComment($commentId);

    require('./view/backend/editcomment.php');
}


function editComment($commentId, $comment) {
    $commentManager = new CommentManager();
    $editComment = $commentManager->editComment($commentId, $comment);
    $approveComment = $commentManager->approveComment($commentId);

    if ($editComment === false) {
        throw new Exception('Impossible d\'éditer le commentaire !');
    } else {
        header('Location: index.php?action=dashbord');
    }
}


function deleteComment($commentId) {
    $commentManager = new CommentManager();
    $deleteComment = $commentManager->deleteComment($commentId);

    if ($deleteComment === false) {
        throw new Exception('Impossible de supprimer le commentaire !');
    } else {
        header('Location: index.php?action=dashbord');
    }
}