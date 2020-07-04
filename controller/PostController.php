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
        if (!isset($post)) {
            header('Location: index.php');
        } else {
            $comments = $this->commentManager->getCommentsByPostId($postId);
        }
        require_once('./view/frontend/postpage.php');
    }

    public function getPosts($page) {
        $postsPerPage = 5;
        $numberOfPosts = $this->postManager->countPosts();
        $numberOfPage = ceil($numberOfPosts/$postsPerPage);
        $offset = ($page - 1) * $postsPerPage;
        $posts = $this->postManager->getPosts($offset, $postsPerPage);
        if (empty($posts)) {
            header('Location: index.php');
        } else {
            require_once('./view/frontend/home.php');
        }
    }

    public function getAllPosts() {
        $posts = $this->postManager->getPosts(0, 1000000);
        require_once('./view/backend/posts.php');
    }

    public function displayAddPost() {
        require_once('./view/backend/addpost.php');
    }

    public function addPost($title, $content) {
        $affectedLines = $this->postManager->addPost($title, $content);
        if ($affectedLines === false) {
            Functions::flash('Impossible d\'ajouter le chapitre !', 'error');
            require_once('./view/backend/dashbord.php');
        } else {
            Functions::flash('Le chapitre a bien été ajouté !', 'success');
            header('Location: index.php?action=posts');
        }
    }

    public function displayUpdatePost($postId) {
        $post = $this->postManager->getPost($postId);
        require_once('./view/backend/updatepost.php');
    }

    public function updatePost($postId, $title, $content) {
        $affectedLines = $this->postManager->updatePost($postId, $title, $content);
        if ($affectedLines === false) {
            Functions::flash('Impossible de modifier le chapitre !', 'error');
            require_once('./view/backend/dashbord.php');
        } else {
            Functions::flash('Le chapitre a bien été modifié !', 'success');
            header('Location: index.php?action=posts');
        }
    }

    public function deletePost($postId) {
        $deletePost = $this->postManager->deletePost($postId);
        $deleteComments = $this->commentManager->deleteComments($postId);
        if ($deletePost === false OR $deleteComments === false) {
            Functions::flash('Impossible de supprimer le chapitre !', 'error');
            require_once('./view/backend/dashbord.php');
        } else {
            Functions::flash('Le chapitre a bien été supprimé !', 'success');
            header('Location: index.php?action=posts');
        }
    }
}