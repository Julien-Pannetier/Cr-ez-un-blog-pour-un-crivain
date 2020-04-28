<?php
require_once ('./model/Database.php');
require_once ('./model/PostManager.php');
require_once ('./model/CommentManager.php');


function listPosts()
{
	$postManager = new PostManager();
	$posts = $postManager->getPosts();

	require('./view/frontend/home.php');
}


function post($postId)
{
	$postManager = new PostManager();
	$commentManager = new CommentManager();
	
	$post = $postManager->getPost($postId);
	$comments = $commentManager->getComments($postId);

	require('./view/frontend/postpage.php');
}

function addComment($postId, $author, $authorEmail, $comment)
{
	$commentManager = new CommentManager();
	$affectedLines = $commentManager->postComment($postId, $author, $authorEmail, $comment);

	if ($affectedLines === false) {
		throw new Exception('Impossible d\'ajouter le commentaire !');
	} else {
		header('Location: index.php?action=post&id=' . $postId);
	}
}

function reportComment($commentId, $postId)
{
	$commentManager = new CommentManager();
	$reportComment = $commentManager->reportComment($commentId);

	if ($reportComment === false) {
        throw new Exception('Impossible de signaler le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function displayLogin()
{
	require('./view/backend/login.php');
}