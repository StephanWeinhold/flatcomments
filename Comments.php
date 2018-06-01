<?php
require_once 'JsonHandler.php';
require_once 'FileHandler.php';

class Comments {

    public function router() {
        $kirby->set('route', array(
            'pattern' => 'my/awesome/url',
            'action'  => function() {
                // do something here when the URL matches the pattern above
            }
        ));
    }

    public static function checkForComments($articleId) {
        $comments = Comments::getComments($articleId);

        if (count($comments) > 0) {
            return $comments;
        }

        return [];
    }

    public static function getComments($articleId) {
        $file = FileHandler::readFile(__DIR__ . '/' . $articleId . '.json');
        return JsonHandler::readJson($file, false);
    }

}
