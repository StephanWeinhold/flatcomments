<?php
require_once 'Comment.php';
require_once 'Comments.php';
require_once 'JsonHandler.php';
require_once 'FileHandler.php';

$articleId = 1;
$userName = 'Stephan Weinhold';
$userEmailAddress = 's@b.com';
$comment = 'Dies ist ein Kommentar.';

$oComment = Comment::buildCommentFromPost($articleId, $userName, $userEmailAddress, $comment);
$existingComments = Comments::checkForComments($articleId);
array_push($existingComments, $oComment);
$jsonComment = JsonHandler::writeJson($existingComments);

$filePath = __DIR__ . '/' . $articleId . '.json';
FileHandler::writeFile($filePath, $jsonComment);
