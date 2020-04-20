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

function post()
{
	$postManager = new PostManager();
	$commentManager = new CommentManager();
	
	$post = $postManager->getPost($_GET['id']);
	$comments = $commentManager->getComments($_GET['id']);

	require('./view/frontend/postpage.php');
}

function addComment($postId, $author, $authorEmail, $comment)
{
	$commentManager = new CommentManager();
	$affectedLines = $commentManager->postComment($postId, $author, $authorEmail, $comment);

	if ($affectedLines === false) {
		die("Impossible d'ajouter le commentaire !");
	} else {
		header('Location: index.php?action=post&id=' . $postId);
	}
}

function displayLogin()
{
	require('./view/backend/login.php');
}