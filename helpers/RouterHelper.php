<?php

class RouterHelper {

    public static function getId($getArray) {
        $id = null;
        if (array_key_exists("id", $getArray) && !empty($getArray["id"]) && is_numeric($getArray["id"]) && $getArray["id"] > 0) {
            $id = intval($getArray["id"]);
        }
        return $id;
    }

    public static function getPageId($getArray) {
        $pageId = null;
        if (array_key_exists("pageId", $getArray) && !empty($getArray["pageId"]) && is_numeric($getArray["pageId"]) && $getArray["pageId"] > 0) {
            $pageId = intval($getArray["pageId"]);
        } else {
            $pageId = 1;
        }
        return $pageId;
    }
}