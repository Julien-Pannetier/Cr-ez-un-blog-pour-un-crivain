<?php
require ('./model/frontend.php');

function listPosts()
{
	$posts = getPosts();

	require('./view/frontend/home.php');
}

function post()
{
	$post = getPost($_GET['id']);
	$comments = getComments($_GET['id']);

	require('./view/frontend/postpage.php');
}

function addComment($postId, $author, $authorEmail, $comment)
{
	$affectedLines = postComment($postId, $author, $authorEmail, $comment);

	if ($affectedLines === false) {
		die('Impossible d\ajouter le commentaire !');
	} else {
		header('Location: index.php?action=post&id=' . $postId);
	}
}