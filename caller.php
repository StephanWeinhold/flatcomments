<?php
require_once 'Comment.php';
require_once 'Comments.php';
require_once 'JsonHandler.php';
require_once 'FileHandler.php';

$articleId = Comments::getParam('articleId');

$oComment = Comment::buildCommentFromPost(
    $articleId,
    Comments::getParam('userName'),
    Comments::getParam('userEmailAddress'),
    Comments::getParam('comment')
);
$existingComments = Comments::checkForComments($articleId);
array_push($existingComments, $oComment);
$jsonComment = JsonHandler::writeJson($existingComments);

$filePath = __DIR__ . '/' . $articleId . '.json';
FileHandler::writeFile($filePath, $jsonComment);
