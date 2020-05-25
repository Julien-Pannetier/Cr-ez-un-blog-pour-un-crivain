<?php
require_once ('./model/Database.php');
require_once ('./model/PostManager.php');
require_once ('./model/CommentManager.php');

class PostController {
    // Constructor
    public function __construct() {
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();
    }

    public function getPost($postId) {        
        $post = $this->postManager->getPost($postId);
        $comments = $this->commentManager->getCommentsByPostId($postId);

        require('./view/frontend/postpage.php');
    }

    public function getPosts($limit, $offset) {
        $posts = $this->postManager->getPosts($limit, $offset);

        require('./view/frontend/home.php');
    }

    public function getAllPosts() {
        $posts = $this->postManager->getPosts();

        require('./view/backend/posts.php');
    }

    public function displayAddPost() {
        require('./view/backend/addpost.php');
    }

    public function addPost($title, $content) {
        $affectedLines = $this->postManager->addPost($title, $content);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter un nouveau chapitre !');
        } else {
            header('Location: index.php?action=posts');
        }
    }

    public function displayUpdatePost($postId) {
        $post = $this->postManager->getPost($postId);

        require('./view/backend/updatepost.php');
    }

    public function updatePost($postId, $title, $content) {
        $affectedLines = $this->postManager->updatePost($postId, $title, $content);

        if ($affectedLines === false) {
            throw new Exception('Impossible de modifier le chapitre !');
        } else {
            header('Location: index.php?action=posts');
        }
    }

    public function deletePost($postId) {
        $deletePost = $this->postManager->deletePost($postId);
        $deleteComments = $this->commentManager->deleteComments($postId);

        if ($deletePost === false OR $deleteComments === false) {
            throw new Exception('Impossible de supprimer le chapitre !');
        } else {
            header('Location: index.php?action=posts');
        }
    }
}