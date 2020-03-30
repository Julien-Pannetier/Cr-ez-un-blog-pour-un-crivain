<?php
try
{
    $db = new PDO('mysql:host=localhost;dbname=forteroche;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Insertion du commentaire à l'aide d'une requête préparée
$comments = $db->prepare('INSERT INTO comments(post_id, author, author_email, comment, comment_date) VALUES(:post_id, :author, :author_email, :comment, NOW())');
$comments->execute(array(
        ':post_id' => $_GET['id'],
        ':author' => $_POST['name'],
        ':author_email' => $_POST['email'],
        ':comment' => $_POST['message'],
        ));

// Redirection du visiteur vers la page du billet de blog
header('Location: postpage.php?id=' . $_GET['id']);
?>