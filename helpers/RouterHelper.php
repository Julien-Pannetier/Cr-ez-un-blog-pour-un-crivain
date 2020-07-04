<?php

class RouterHelper {

    public static function getId($getArray) {
        $id = null;
        if (array_key_exists('id', $getArray) && !empty($getArray['id']) && is_numeric($getArray['id']) && $getArray['id'] > 0) {
            $id = intval($getArray['id']);
        }
        return $id;
    }

    public static function getPage($getArray) {
        $page = null;
        if (array_key_exists('page', $getArray) && !empty($getArray['page']) && is_numeric($getArray['page']) && $getArray['page'] > 0) {
            $page = intval($getArray['page']);
        } else {
            $page = 1;
        }
        return $page;
    }

    public static function getCommentId($getArray) {
        $commentId = null;
        if (array_key_exists('commentId', $getArray) && !empty($getArray['commentId']) && is_numeric($getArray['commentId']) && $getArray['commentId'] > 0) {
            $commentId = intval($getArray['commentId']);
        }
        return $commentId;
    }

    public static function getPostId($getArray) {
        $postId = null;
        if (array_key_exists('postId', $getArray) && !empty($getArray['postId']) && is_numeric($getArray['postId']) && $getArray['postId'] > 0) {
            $postId = intval($getArray['postId']);
        }
        return $postId;
    }

    public static function checkAuthentication($session) {
        if (!array_key_exists('admin', $session) || !$session['admin']) {
            header('Location: index.php?action=login');
        }
    }

    public static function getTitleInPost($post) {
        $title = null;
        if (isset($post) && array_key_exists('title', $post) && isset($post['title'])) {
            $title = $post['title'];
        }
        return $title;
    }

    public static function getContentInPost($post) {
        $content = null;
        if (isset($post) && array_key_exists('content', $post) && !empty($post['content'])) {
            $content = $post['content'];
        }
        return $content;
    }

    public static function getCommentInPost($post) {
        $comment = null;
        if (isset($post) && array_key_exists('comment', $post) && !empty($post['comment'])) {
            $comment = $post['comment'];
        }
        return $comment;
    }

    public static function getNameInPost($post) {
        $name = null;
        if (isset($post) && array_key_exists('name', $post) && isset($post['name'])) {
            $name = $post['name'];
        }
        return $name;
    }

    public static function getEmailInPost($post) {
        $email = null;
        if (isset($post) && array_key_exists('email', $post) && isset($post['email'])) {
            $email = $post['email'];
        }
        return $email;
    }

    public static function getMessageInPost($post) {
        $message = null;
        if (isset($post) && array_key_exists('message', $post) && isset($post['message'])) {
            $message = $post['message'];
        }
        return $message;
    }

    public static function getPasswordInPost($post) {
        $password = null;
        if (isset($post) && array_key_exists('password', $post) && isset($post['password'])) {
            $password = $post['password'];
        }
        return $password;
    }
}