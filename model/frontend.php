<?php

function dbConnection()
{
	try
	{
	    $db = new PDO('mysql:host=localhost;dbname=forteroche;charset=utf8', 'root', '');
	    return $db;
	}
	catch(Exception $e)
	{
	        die('Erreur : '.$e->getMessage());
	}
}

function getPosts()
{
	$db = dbConnection();
	$req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, "%d/%m/%Y") AS date FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

	return $req;
}

function getPost($postId)
{
    $db = dbConnection();
    $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, "%d/%m/%Y") AS date FROM posts WHERE id = ?');
    $req-> execute(array($postId));
    $post = $req->fetch();

    return $post;
}

function getComments($postId)
{
	$db = dbConnection();
	$comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh%imin%ss") AS date FROM comments WHERE post_id = ? ORDER BY comment_date');
	$comments->execute(array($postId));

	return $comments;
}

function postComment($postId, $author, $authorEmail, $comment)
{
	$db = dbConnection();
	$comments = $db->prepare('INSERT INTO comments(post_id, author, author_email, comment, comment_date) VALUES(?, ?, ?, ?, NOW())');
	$affectedLines = $comments->execute(array($postId, $author, $authorEmail, $comment));

	return $affectedLines;
}